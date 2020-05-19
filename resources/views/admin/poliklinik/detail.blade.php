@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Data Poliklinik</h3>
                <a class="btn btn-success d-inline float-right" href={{ route('poliklinik.create') }}><i class="fas fa-plus"></i> Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" width="25">No</th>
                                <th scope="col" width="80%">Nama</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no = 1 @endphp
                            @foreach($data as $value)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form method="post" action={{ route('poliklinik.destroy', $value->id) }}>
                                        @csrf
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary btn-sm" href={{ route('poliklinik.edit', $value->id) }}><i class="fas fa-edit"></i> Edit</a>
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
