<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCrud extends Component
{
    public string $name = '';
    public array $selectedPermissions = [];
    public bool $isEditing = false;
    public ?int $roleId = null;        // ✅ store ID separately
    public bool $showForm = false;

    public function render()
    {
        return view('livewire.role-crud', [
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all(),
        ]);
    }

    public function createNewRole()
    {
        $this->reset(['name', 'selectedPermissions', 'isEditing', 'roleId']);
        $this->showForm = true;
    }

    public function editRole($id)                // ✅ accept ID not model
    {
        $role = Role::findOrFail($id);
        $this->isEditing = true;
        $this->roleId = $role->id;              // ✅ store the ID
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        $this->showForm = true;
    }

    public function save()
    {
        if ($this->isEditing && $this->roleId) {
            $this->validate([
                'name' => 'required|string|unique:roles,name,' . $this->roleId,  // ✅ ignore self
            ]);

            $role = Role::findOrFail($this->roleId);
            $role->update(['name' => $this->name]);

            $permissionNames = Permission::whereIn('id', $this->selectedPermissions)
                ->pluck('name')
                ->toArray();

            $role->syncPermissions($permissionNames);

            session()->flash('message', 'Role updated successfully!');
        } else {
            $this->validate([
                'name' => 'required|string|unique:roles,name',
            ]);

            $role = Role::create([
                'name' => $this->name,
                'guard_name' => 'web',
            ]);

            $permissionNames = Permission::whereIn('id', $this->selectedPermissions)
                ->pluck('name')
                ->toArray();

            $role->syncPermissions($permissionNames);

            session()->flash('message', 'Role created successfully!');
        }

        $this->closeForm();
    }

    public function deleteRole($id)             // ✅ accept ID not model
    {
        Role::findOrFail($id)->delete();
        session()->flash('message', 'Role deleted successfully!');
    }

    public function closeForm()
    {
        $this->reset(['name', 'selectedPermissions', 'isEditing', 'roleId', 'showForm']);
        $this->resetValidation();
    }

    public function togglePermission($permissionId)
    {
        if (in_array($permissionId, $this->selectedPermissions)) {
            $this->selectedPermissions = array_values(
                array_diff($this->selectedPermissions, [$permissionId])
            );
        } else {
            $this->selectedPermissions[] = $permissionId;
        }
    }
}