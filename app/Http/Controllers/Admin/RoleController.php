<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10); 
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all(); 
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'name' => 'required|string|unique:roles,name', 
            'permissions' => 'nullable|array', 
        ]); 
        
        $role = Role::create(['name' => $data['name']]); 
        if(!empty($data['permissions'])){ 
            $role->syncPermissions($data['permissions']); 
        } 
        
        return redirect()->route('admin.roles.index')->with('success','Role created successfully');
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
    public function edit(Role $role)
    {
        $permissions = Permission::all(); 
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([ 
            'name' => 'required|string|unique:roles,name,'.$role->id, 
            'permissions' => 'nullable|array', 
        ]); 
        $role->update(['name'=>$data['name']]); 
        $role->syncPermissions($data['permissions'] ?? []);
        
        return redirect()->route('admin.roles.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete(); 
        return redirect()->route('admin.roles.index')->with('success','Role deleted successfully');
    }
}
