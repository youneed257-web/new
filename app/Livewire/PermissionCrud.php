<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class PermissionCrud extends Component
{
    public string $name = '';

    public bool $isEditing = false;
    public ?Permission $editingPermission = null;
    public bool $showForm = false;

    public function render()
    {
        return view('livewire.permission-crud', [
            'permissions' => Permission::all(),
        ]);
    }

    public function createNewPermission()
    {
        $this->reset(['name', 'isEditing', 'editingPermission']);
        $this->showForm = true;
    }

    public function editPermission(Permission $permission)
    {
        $this->isEditing = true;
        $this->editingPermission = $permission;
        $this->name = $permission->name;
        $this->showForm = true;
    }

    public function save()
    {
        if ($this->isEditing && $this->editingPermission) {
            // Update validation - exclude current permission from unique check
            $this->validate([
                'name' => 'required|string|unique:permissions,name,' . $this->editingPermission->id,
            ]);

            // Update existing permission
            $this->editingPermission->update([
                'name' => $this->name,
            ]);

            session()->flash('message', 'Permission updated successfully!');
        } else {
            // Create validation
            $validatedData = $this->validate([
                'name' => 'required|string|unique:permissions,name',
            ]);

            Permission::create([
                'name' => $validatedData['name'],
                'guard_name' => 'web',
            ]);

            session()->flash('message', 'Permission created successfully!');
        }

        $this->closeForm();
    }

    public function deletePermission(Permission $permission)
    {
        $permission->delete();
        session()->flash('message', 'Permission deleted successfully!');
    }

    public function closeForm()
    {
        $this->reset(['name', 'isEditing', 'editingPermission', 'showForm']);
        $this->resetValidation();
    }
}
