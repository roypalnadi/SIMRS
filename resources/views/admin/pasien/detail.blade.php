@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Data Pasien</h3>
                <a class="btn btn-success d-inline float-right" href={{ route('pasien.create') }}><i class="fas fa-plus"></i> Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="25%">Nama</th>
                                <th scope="col" width="15%">Poliklinik</th>
                                <th scope="col" width="15%">Kategori</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($data as $value)
                            <tr>
                                <th class="text-center" scope="row">{{ $no++ }}</th>
                                <td>{{ $value->name }}</td>
                                <td class="text-center">{{ $value->poliklinik->name }}</td>
                                <td class="text-center">{{ $value->kategori_pasien }}</td>
                                <td class="text-center">
                                    <form method="post" action={{ route('pasien.destroy', $value->id) }}>
                                        @csrf
                                        {{ method_field('delete') }}
                                        <a class="btn btn-primary btn-sm" href={{ route('pasien.show', $value->id) }}><i class="fas fa-info-circle"></i> Detail</a>
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
