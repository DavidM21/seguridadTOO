<?php

namespace App\Http\Controllers;

use App\ActivityStatistic;
use App\User;
use Illuminate\Http\Request;

class ActivityStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mostrarestadistica()
    {
        $estadisticas = ActivityStatistic::paginate(10);
        return view('estadistica',compact('estadisticas'));
    } 

    public function search(Request $request)
    {
        $search = $request->get('search');
        $estadisticas = ActivityStatistic::where('user_id','like','%'.$search.'%')->paginate(10);
        return view('estadistica',['estadisticas'=>$estadisticas]);
    }

    public function mostrarestado()
    {
        $usuario = User::paginate(10);
        return view('estado',compact('usuario'));
    }

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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivityStatistic  $activityStatistic
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityStatistic $activityStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActivityStatistic  $activityStatistic
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityStatistic $activityStatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActivityStatistic  $activityStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityStatistic $activityStatistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActivityStatistic  $activityStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityStatistic $activityStatistic)
    {
        //
    }
}
