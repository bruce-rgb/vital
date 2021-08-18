<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = DB::table('directors')
        ->leftJoin('users', 'users.id_user', '=', 'directors.id_user')
        ->leftJoin('medical_units', 'medical_units.id_unit', '=', 'directors.id_unit')
        ->select('directors.*', DB::raw('medical_units.name as name_unit'), 'medical_units.address', 'users.name', 'users.last_name')
        ->get();

        return view('director.director', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = DB::table('medical_units')
        ->leftJoin('directors', 'medical_units.id_unit', '=', 'directors.id_unit')
        ->select('medical_units.id_unit', 'medical_units.name', 'medical_units.address')
        ->whereNull('directors.id_unit')
        ->get()->toArray();

        return view('director.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate present parameters
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'last_name2' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'id_unit' => 'required',
        ]);

        //Validate director role
        $request->role = 'director';

        //Save user
        $user=request()->except(['id_unit','id_user','_token','_method']);
        $data = new User($user);
        $data->save();

        //Save id_user recenlty inserted
        $id_user=$data->id_user;

        //Save director
        $director = new Director($user);
        $director->id_user=$id_user;
        $director->id_unit=$request->id_unit;
        $director->save();

        return redirect(route('directors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get no assigned units
        $units = DB::table('medical_units')
        ->leftJoin('directors', 'medical_units.id_unit', '=', 'directors.id_unit')
        ->select('medical_units.id_unit', 'medical_units.name', 'medical_units.address')
        ->whereNull('directors.id_unit')
        ->get()->toArray();

        //Get director info
        $director = DB::table('users')
        ->leftJoin('directors','users.id_user','=','directors.id_user')
        ->select('users.id_user','users.name', 'users.last_name', 'directors.id_director')
        ->where('directors.id_director','=',$id)
        ->first();

        return view('director.edit', compact('director','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_director)
    {
        $request->validate([
            'id_director' => 'required',
            'id_user' => 'required',
            'id_unit' => 'required',
        ]);

        $director = Director::findOrFail($id_director);

        /*
        $id_unit=$request->id_unit;
        DB::statement(
            DB::raw(
                "UPDATE directors SET id_unit = ?
                    WHERE id_director=?"
            ),
            array($id_unit, $id_director)
        ); //update `directors` set `id_unit` = NULL where `id_director` = 1 */

         // $date=now();
        // echo $dates="´".$date."´";
        //$director->updated_at=$dates;
        //$director->updated_at=now();
        $director->id_unit=$request->id_unit;
        //$director->timestamps = false;
        //$director->save(['timestamps' => false]);
        $director->save();

        return redirect(route('directors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $director = Director::findOrFail($id);
        $director->delete();

        return back()->with('deleted','Eliminación exitosa');
    }
}
