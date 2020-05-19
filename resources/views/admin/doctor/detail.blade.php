@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Data Dokter</h3>
                <a class="btn btn-success d-inline float-right" href={{ route('doctor.create') }}><i class="fas fa-plus"></i> Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" width="25">No</th>
                                <th scope="col" width="13%">Nama</th>
                                <th scope="col" width="10%">Email</th>
                                <th scope="col" width="15%">No HP</th>
                                <th scope="col" width="15%">Alamat</th>
                                <th scope="col" width="10%">Poliklinik</th>
                                <th scope="col" width="210">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($data as $value)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->no_hp }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->poliklinik->name }}</td>
                                <td>
                                    <form method="post" action={{ route('doctor.destroy', $value->id) }}>
                                        @csrf
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary btn-sm" href={{ route('doctor.edit', $value->id) }}><i class="fas fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
