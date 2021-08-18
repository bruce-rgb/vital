<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return view('user.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'role' => 'required',
        ]);

        //Save user
        $user=request()->except(['_token','_method']);
        $data = new User($user);
        $data->save();

        return redirect(route('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'last_name2' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $user=request()->except(['_token','_method']);

        User::findOrFail($id_user)->update($user);

        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('deleted','Eliminación exitosa');
    }
}
