<?php

namespace App\Http\Controllers\Super;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;


class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $roles = Role::all();
        return view('super.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        $permissions = Permission::all();
        //dd($permissions);
        return view('super.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //dd($request->permission);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'permission' => ['required'],
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);


        return redirect()->route('roles.index')
            ->with('notification', '¡Nuevo rol ' .'"'. $role->name .'" '. 'guardado correctamente!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('super.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        //dd($request->name);
        //dd($role->name);

        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role->name, 'name')
            ],
            'permission' => ['required'],
        ]);

        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index')->with('notification', '¡Rol ' .' "'. $role->name .'" '. 'actualizado correctamente!');
    }

    public function confirm($id)
    {
        $role = Role::findOrFail($id);

        return view('super.roles.confirm', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('notification', '¡Rol ' .' "'. $role->name .'" '. 'eliminado correctamente!');
    }
}
