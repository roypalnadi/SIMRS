@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">User</h3>
                <a class="btn btn-success d-inline float-right" href={{ route('user.create') }}><i class="fas fa-plus"></i> Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" width="25">No</th>
                                <th scope="col" width="30%">Nama</th>
                                <th scope="col" width="35%">Email</th>
                                <th scope="col" width="15%">Role</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($data as $value)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>@if($value->role == 1)
                                        Admin
                                    @else
                                        Dokter
                                    @endif
                                </td>
                                <td>
                                    <form method="post" action={{ route('user.destroy', $value->id) }}>
                                        @csrf
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary btn-sm" href={{ route('user.edit', $value->id) }}><i class="fas fa-edit"></i> Edit</a>
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
