<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\OrganizationController;

use App\Department;
use Illuminate\Http\Request;
use App\Organization;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizaciones=Organization::all();
        return view('crudDepartamento.crearDepartamento', compact ('organizaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $fields =request()->validate([
            'name' => 'required',
            'organization_id' => 'required',
        ]);

        Department::create($fields);

        return redirect()->route('departamento.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $datos['departments']=Department::paginate(5);
        return view('crudDepartamento.mostrarDepartamento', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $organizaciones=Organization::all();
        return view('crudDepartamento.editarDepartamento', compact('department', 'organizaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $fields=request()->validate([
            'name' => 'required',
            'organization_id' => 'required',
        ]);

        $department->update($fields);

        return redirect()->route('departamento.show', $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $department = Department::findOrFail($id);

        return view('crudDepartamento.confirmDepartamento', compact('department'));
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departamento.show');
    }
}
