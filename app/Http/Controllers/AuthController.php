<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('role_or_permission:User access')->only(['create_user']);
        $this->middleware('role_or_permission:User create')->only(['store_user']);

        $this->middleware('role_or_permission:Permission access')->only(['create']);
        $this->middleware('role_or_permission:Permission create')->only(['stores']);
        
        $this->middleware('role_or_permission:Role access')->only(['create_role']);
        $this->middleware('role_or_permission:Role create')->only(['store_role']);

        $this->middleware('role_or_permission:Permission edit')->only(['update_permission']);
        $this->middleware('role_or_permission:Permission delete')->only(['delete_permission']);
        $this->middleware('role_or_permission:User edit')->only(['update_user']);
        $this->middleware('role_or_permission:User delete')->only(['delete_user']);
    }
    // functions for permission, role, user management and authentication
    public function create()
    {
        $permissions = Permission::all();
        return view('permission.form', [
            'permissions' => $permissions,
        ]);
    }
    public function stores(Request $request)
    {
       $permission = new Permission();
       $permission->name = $request->permission;
       $permission->save();
       return back()->with('message', 'Permission created successfully');
    }

    public function create_role(){
        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();
        return view('role.form', [
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }
    
   public function store_role(Request $request)
{
    // Validate input
    $request->validate([
        'role' => 'required|string|unique:roles,name',
        'permission' => 'required|array',
    ]);

    // Create role FIRST
    $role = Role::create([
        'name' => $request->role,
        'guard_name' => 'web',
    ]);

    // Convert permission IDs → permission names
    $permissionNames = Permission::whereIn('id', $request->permission)
        ->pluck('name')
        ->toArray();

    // Assign permissions
    $role->syncPermissions($permissionNames);

    return back()->with('message', 'Role created successfully');
}


public function create_user(){
    $roles = Role::all();
    $users = User::all();
    return view('user.form', [
        'roles' => $roles,
        'users' => $users,
    ]);
}

public function store_user(Request $request)
{
  $role = Role::findById($request->role);
  $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password),
  ]);
  $user->syncRoles($role);
  return back()->with('message', 'User created successfully');
}

public function login (Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];
    if(Auth::guard('web')->attempt($credentials)){
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
}
public function home()
{
    return view('home');
}
public function logout()
{
    Auth::guard('web')->logout();
    return redirect()->route('login');

}
 
public function update_permission(Request $request, $id)
{
    $permission = Permission::findOrFail($id);
    
    $request->validate([
        'permission' => 'required|string|unique:permissions,name,' . $id,
    ]);
    
    $permission->update(['name' => $request->permission]);
    
    return back()->with('message', 'Permission updated successfully');
}

/**
 * Delete permission
 */
public function delete_permission($id)
{
    $permission = Permission::findOrFail($id);
    $permission->delete();
    
    return back()->with('message', 'Permission deleted successfully');
}

/**
 * Update user
 */
public function update_user(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $id,
        'role'     => 'required|exists:roles,id',
        'password' => 'nullable|min:8',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }
    
    $user->save();

    $role = Role::findById($request->role);
    $user->syncRoles([$role]);

    return back()->with('message', 'User updated successfully');
}

/**
 * Delete user
 */
public function delete_user($id)
{
    $user = User::findOrFail($id);
    
    if ($user->id === Auth::id()) {
        return back()->with('error', 'You cannot delete your own account!');
    }

    $user->delete();

    return back()->with('message', 'User deleted successfully');
}

}
