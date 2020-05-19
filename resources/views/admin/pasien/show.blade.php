@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Detail Data Pasien</h3>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <p>: {{$data->name}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email address</label>
                            <div class="col-md-9">
                                <p>: {{$data->email}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">No HP</label>
                            <div class="col-md-9">
                                <p>: {{$data->no_hp}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Alamat</label>
                            <div class="col-md-9">
                                <p>: {{$data->alamat}}</p>
                            </div>
                        </div>

                        <div id="poliklinik" class="form-group row">
                            <label class="col-md-3 col-form-label">Poliklinik</label>
                            <div class="col-md-9">
                                <p>: {{$data->poliklinik->name}}</p>
                            </div>
                        </div>

                        <div id="kategori" class="form-group row">
                            <label class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <p>: {{$data->kategori_pasien}}</p>
                            </div>
                        </div>

                        <div id="date" class="form-group row">
                            <label class="col-md-3 col-form-label">Tanggal Pembuatan</label>
                            <div class="col-md-9">
                                <p>: {{$data->date_create}}</p>
                            </div>
                        </div>

                        <a class="btn btn-primary" href={{ route('pasien.edit', $data->id) }} ><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
