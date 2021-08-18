<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Program;
use App\Models\UserRol;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
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

    
    public function reports()
    {
        $studens = DB::table('studens')
        ->select('programs.name', 'studens.full_name','studens.program_id','studens.created_at')
        ->Join('programs', 'programs.id', '=', 'studens.program_id')
        ->get();

        $programs = Program::all();
        
        foreach ($programs as $pg) {
            $studens_in_programs = array();
            foreach ($studens as $st) {
                if($pg->id == $st->program_id){
                    array_push($studens_in_programs, $st);
                }        
            }
            $pg->studens=$studens_in_programs;
        }
        
        
        return Inertia::render('Users/Reports',
            [
                'studentsInPrograms'=>$programs,
            ]);
        
    }

    
    public function users()
    {   $all_user = User::all();
        $rols = UserRol::all();
        return Inertia::render('Users/ListUsers',
            [   'canRegister' => Route::has('register'),
                'all_user'=>$all_user,
                'rols'=>$rols,
            ]);//compact('all_user')
    }

    
    public function Configuration()
    {
        return Inertia::render('Users/Configuration');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
