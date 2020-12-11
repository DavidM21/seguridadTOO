<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\JobPosition;
use App\Organization;
use App\Section;
use Illuminate\Http\Request;
use DB;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations)->pluck('id');
        $sections = Section::whereIn('department_id', $departments)->pluck('id');
        $jobpositions = JobPosition::whereIn('section_id', $sections)->pluck('id');

        $puestos = JobPosition::whereIn('id', $jobpositions)->get();
        //dd('department_id', $sections, 'section_id', $jobpositions, $puestos);
        return view('crudPuestoDeTrabajo.mostrarPuesto',compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations)->pluck('id');
        $secciones = Section::whereIn('department_id', $departments)->get();

        return view('crudPuestoDeTrabajo.crearPuesto',compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //*Validaciones */
        $fields = request()->validate([
            'nombre'=> 'required',
            'salario'=> ['required','min:0']
        ]);

        JobPosition::create([
            'name' => request('nombre'),
            'salary' => request('salario'),
            'section_id' => request('seccion'),
        ]);

        //Para mensajes de error personalizados revisar el video 20 minuto 6

        return redirect()->route('puestos.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function show(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(JobPosition $jobPosition)
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations)->pluck('id');
        $secciones = Section::whereIn('department_id', $departments)->get();

        return view('crudPuestoDeTrabajo.editarPuesto',['jobPosition' => $jobPosition],
            compact('secciones'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function update( JobPosition $jobPosition)
    {

        $fields = request()->validate([
            'nombre'=> 'required',
            'salario'=> ['required','min:0']
        ]);

        $jobPosition->update([
            'name' => request('nombre'),
            'salary' => request('salario'),
            'section_id' => request('seccion'),
        ]);

        return redirect()->route('puestos.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $puesto = JobPosition::findOrFail($id);

        return view('crudPuestoDeTrabajo.confirmPuesto', compact('puesto'));
    }

    public function destroy($id)
    {
        $jobPosition = JobPosition::findOrFail($id);
        $jobPosition->delete();
        return redirect()->route('puestos.show');
    }
}
