<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pasien;
use App\poliklinik;
use App\doktor;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pasien::with('poliklinik')->get();

        return view('admin/pasien/detail', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = poliklinik::all();
        $pasien = pasien::all();

        return view('admin/pasien/add', ['dataPoliklinik' => $poliklinik, 'dataPasien' => $pasien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->id)) {
            $data = pasien::find($request->id);
            $data->kategori_pasien = $request->kategori;
            $data->save();
        }else{
            $this->validate($request, [
               'name' => 'required', 
               'email' => 'required|email', 
               'noHP' => 'required|numeric', 
               'alamat' => 'required', 
            ]);
            pasien::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->noHP,
                'alamat' => $request->alamat,
                'poliklinik_id' => $request->poliklinik,
                'kategori_pasien' => $request->kategori,
                'date_create' => date('Y-m-d'),
            ]);
        }
        return redirect(route('pasien.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pasien::find($id);

        return view('admin/pasien/show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pasien::find($id);

        $poliklinik = poliklinik::all();

        return view('admin/pasien/edit', ['data' => $data, 'dataPoliklinik' => $poliklinik, 'id' => $id]);
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
            'noHP' => 'required',
            'alamat' => 'required',
        ]);

        $data = pasien::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->no_hp = $request->noHP;
        $data->alamat = $request->alamat;
        $data->poliklinik_id = $request->poliklinik;
        $data->kategori_pasien = $request->kategori;
        $data->save();

        return redirect(route('pasien.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = pasien::find($id);
        $data->delete();

        return redirect(route('pasien.index'));
    }

    public function viewPasienDoctor($doktor_id)
    {   
        $poliklinikDoctor = doktor::find($doktor_id);
        $data = pasien::with('poliklinik')->where('poliklinik_id', $poliklinikDoctor->poliklinik_id)->get();

        return view('doctor/pasien/detail', ['data' => $data]);

    }

    public function detailPasienDoctor($id)
    {

        $data = pasien::find($id);

        return view('doctor/pasien/show', ['data' => $data]);

    }
}
