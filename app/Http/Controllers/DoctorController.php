<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doktor;
use App\poliklinik;
use App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =doktor::with(['poliklinik'])->get();
        return view('admin/doctor/detail', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = poliklinik::all();
        return view('admin/doctor/add', ['dataPoliklinik' => $poliklinik]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'noHP' => 'required|numeric',
            'alamat' => 'required'
        ]);

        doktor::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->noHP,
            'alamat' => $request->alamat,
            'poliklinik_id' => $request->poliklinik,
        ]);

        return redirect(route('doctor.index'));

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
        $data = doktor::find($id);
        $poliklinik = poliklinik::all();
        return view('admin/doctor/edit', ['data' => $data, 'dataPoliklinik' => $poliklinik, 'id' => $id]);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = doktor::find($id);  

        $data->name = $request->name;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->poliklinik_id = $request->poliklinik;
        $data->save();

        $userDoctor = User::where('doktor_id', $id)->first();
        $userDoctor->name = $request->name;
        $userDoctor->save();
        
        return redirect(route('doctor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = doktor::find($id);
        $dataUser = User::where('doktor_id', $data->id)->first();
        
        $dataUser->delete();
        $data->delete();
        return redirect()->route('doctor.index')->with('alert-success','Data berhasi dihapus!');
    }

    public function profil($id)
    {
        $data = doktor::find($id);
        $poliklinik = poliklinik::all();
        return view('doctor/profil', ['data' => $data, 'id' => $id, 'dataPoliklinik' => $poliklinik]);
    }

    public function profilUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $data = doktor::find($id);  
        $data->name = $request->name;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->poliklinik_id = $request->poliklinik;
        $data->save();

        $userDoctor = User::where('doktor_id', $id)->first();
        $userDoctor->name = $request->name;
        $userDoctor->save();

        return redirect(route('doctor'));
    }
}
