<?php

namespace App\Http\Controllers;

use App\JobPosition;
use App\Organization;
use App\Section;
use Illuminate\Http\Request;
use App\Department;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departamentos = Department::whereIn('organization_id', $organizations)->get();

        return view('crudSeccion.crearSeccion', compact ('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $fields =request()->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        Section::create($fields);

        return redirect()->route('seccion.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Section $section)
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations)->pluck('id');


        $datos['sections']=Section::whereIn('department_id', $departments)->get();
        return view('crudSeccion.mostrarSeccion', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Section $section)
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departamentos = Department::whereIn('organization_id', $organizations)->get();

        return view('crudSeccion.editarSeccion', compact('section', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $fields=request()->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        $section->update($fields);

        return redirect()->route('seccion.show', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $section = Section::findOrFail($id);

        return view('crudSeccion.confirmSeccion', compact('section'));
    }

    public function destroy($id)
    {

        $section = Section::findOrFail($id);
        $section->delete();
        return redirect()->route('seccion.show');
    }
}
