<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Gate;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RolesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * store a new role
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $role = new Role([
            'name' => $request->get('name'),
        ]);
        $role->save();

        $roles = Role::all();

        return redirect(route('admin.roles.index'));
    }

    /*
     * show the create view
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     */
    public function edit(Role $role)
    {
        if(Gate::denies('role-edit')){
            return redirect(route('admin.roles.index'));
        }

        $roles = Role::all();

        return view('admin.roles.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     */
    public function update(Request $request, Role $role )
    {
        $role->name = $request->get('name');
        $user->save();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        if(Gate::denies('role-delete')){
            return redirect(route('admin.roles.index'));
        }
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
