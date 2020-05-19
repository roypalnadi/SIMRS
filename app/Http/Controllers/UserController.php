<?php

namespace App\Http\Controllers;

use App\User;
use App\poliklinik;
use App\doktor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('admin/user/detail', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = poliklinik::all();
        return view('admin/user/add', ['dataPoliklinik' => $poliklinik]);
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
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $lastId = '';

        if ($request->role == 2) {

            $lastId = doktor::create([
                'name' => $request->name,
                'email' => $request->email,
                'poliklinik_id' => $request->poliklinik,
            ])->id;
        }

        user::create([
            'doktor_id' => $lastId,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect(route('user.index'));
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
        $data = User::find($id);
        $doctor = doktor::where(['email' => $data->email])->first();
        $poliklinik = poliklinik::all();
        return view('admin/user/edit', ['data' => $data, 'dataPoliklinik' => $poliklinik, 'dataDoctor' => $doctor, 'id' => $id]);
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

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if (!$request->password == null) {
            $data->password = Hash::make($request->password);
        }
        $data->role = $request->role;

        $dataDoctor = doktor::find($data->doktor_id);
        $dataDoctor->name = $request->name;
        $dataDoctor->email = $request->email;
        if (isset($request->poliklinik)) {
            $dataDoctor->poliklinik_id = $request->poliklinik;
        }

        $data->save();
        $dataDoctor->save();

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);       
        $dataDoctor = doktor::find($data->doktor_id);

        $data->delete();
        $dataDoctor->delete();


        return redirect(route('user.index'));
    }
}
