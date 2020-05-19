@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Create Data Dokter</h3>
                </div>
                <div class="card-body">
                    <form method="post" action={{ route('doctor.store') }}>
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Put Name Here" value={{ old('name') }}>
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
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value={{ old('email') }}>
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
                                <input type="text" name="noHP" class="form-control @error('noHP') is-invalid @enderror" placeholder="Put Number Here" value={{ old('noHP') }}>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="txt" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Put Address Here" value={{ old('alamat') }}>
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
                                    <option @if(old('poliklinik') == $value->id) selected @endif value={{ $value->id }}>{{ $value->name }}</option>
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
