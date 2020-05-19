@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Create User</h3>
                </div>
                <div class="card-body">
                    <form method="post" action={{ route('user.store') }}>
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
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Put Password Here" value={{ old('password') }}>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-10">
                                <select id="role" class="form-control" name="role">
                                    <option @if(old('role') == 1) selected @endif value="1">Admin</option>
                                    <option @if(old('role') == 2) selected @endif value="2">Dokter</option>
                                </select>
                            </div>
                        </div>

                        <div id="poliklinik" class="form-group row">
                            
                        </div>

                        <center><button class="btn btn-success mx-auto" type="submit"><i class="fas fa-save"></i> Input</button></center>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
