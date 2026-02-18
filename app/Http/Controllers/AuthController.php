<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function create()
    {
        return view('permission.form');
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
public function home()
{
    return view('home');
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

public function logout()
{
    Auth::guard('web')->logout();
    return redirect()->route('login');
}
}
