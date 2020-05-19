@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="d-inline">Data Pasien </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="table-primary text-center">
                                <th scope="col">No</th>
                                <th scope="col" width="35%">Nama</th>
                                <th scope="col" width="35%">Poliklinik</th>
                                <th scope="col" width="35%">Kategori</th>
                                <th scope="col" width="35%">Action</th>
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
                                    <a class="btn btn-primary btn-sm" href={{ route('detailPasienDoctor', $value->id) }}><i class="fas fa-info-circle"></i> Detail</a>
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
