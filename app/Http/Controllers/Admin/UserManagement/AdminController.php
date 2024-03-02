<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminController extends Controller
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
         $users = Administrator::orderBy('id', 'desc')->paginate(15);    
        
         return view('admin.user-management.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admin.user-management.user.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'            => 'required',
            'phone'                => 'required',
            'email'                => 'required|unique:administrators',
            'password'             => 'required',
            'role'                 => 'required',
        ]);

        $input = $request->except('_token');

        $input['password'] = Hash::make(($input['password'] ?? 'password'));

        $user = Administrator::create($input);

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
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
        $user = Administrator::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name')->first();

        return view('admin.user-management.user.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'firstname'            => 'required',
            'phone'                => 'required',
            'email'                => "unique:administrators,email,$id,id",
            'role'                 => 'required',
        ]);

        $input = $request->except('_token');

        $user = Administrator::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('role'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Administrator::find($id)->delete();
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
}
