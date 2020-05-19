@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Edit Data Dokter</h3>
                </div>
                <div class="card-body">
                    <form method="post" action={{ route('doctor.update', $id) }}>
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Put Name Here" value={{ $data->name }}>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email address</label>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value={{ $data->email }}>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No HP</label>
                            <div class="col-md-10">
                                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Put Number Here" value={{ $data->no_hp }}>
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="txt" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Put Address Here" value={{ $data->alamat }}>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="poliklinik" class="form-group row">
                            <label class="col-md-2 col-form-label">Poliklinik</label>
                            <div class="col-md-10">
                                <select class="form-control" name="poliklinik">
                                    @foreach($dataPoliklinik as $value)
                                    <option @if($data->poliklinik_id == $value->id) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <center><button class="btn btn-success mx-auto" type="submit"><i class="fas fa-save"></i> Input</button></center>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
