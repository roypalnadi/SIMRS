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
                    <form method="post" action={{ route('poliklinik.store') }}>
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name Poliklinik</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Put Name Here" value={{ old('name') }}>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
