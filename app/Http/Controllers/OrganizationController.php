<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
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
        return view('crudOrganizacion.crearOrganizacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $fields =request()->validate([
            'name' => 'required',
        ]);

        Organization::create($fields);

        return redirect()->route('organizacion.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $datos['organizations']=Organization::paginate(10);
        return view('crudOrganizacion.mostrarOrganizacion',$datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {

        return view('crudOrganizacion.editarOrganizacion', [
            'organization' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $fields=request()->validate([
            'name' => 'required',
        ]);

        $organization->update($fields);

        return redirect()->route('organizacion.show', $organization);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $organization = Organization::findOrFail($id);

        return view('crudOrganizacion.confirmOrganizacion', compact('organization'));
    }
    public function destroy($id)
    {

        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizacion.show');
    }
}
