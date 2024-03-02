<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:user-management']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.user-management.role.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $permissions = Permission::all();
         return view('admin.user-management.role.add',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required|unique:roles',
        ]);

        $role=Role::create(['guard_name'=>'administrator','name'=>$request->name]);
        
        if($request->has('permission')){
           
          $role->syncPermissions($request->permission);
        }
       return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.user-management.role.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id,
        ]);

        DB::table('role_has_permissions')->where('role_id',$id)->delete();
    
        $role=Role::where('id',$id)->update(['guard_name'=>'administrator','name'=>$request->name]);
        $role = Role::find($id);
        if($request->has('permission')){
           
          $role->syncPermissions($request->permission);
        }
    
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
