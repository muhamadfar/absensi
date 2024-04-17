@extends('layout.admin')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Absensi Kehadiran Siswa</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-header">
                    <h3 class="card-title">Data Rayon</h3>

                    <div class="card-tools">
                        <a href="{{ route('rayon.index') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('rayon.show', $rayon->id) }}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="form-group">
                            <label>Id</label>
                            <input type="number" readonly name="id" class="form-control" id="id"
                                value="{{ $rayon->id }}">
                        </div>
                        <div class="form-group">
                            <label>Rayon</label>
                            <input type="text" readonly name="rayon_id" class="form-control" id="name"
                                value="{{ $rayon->rayon }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Data Murid</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($rayon->students as $datas)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $datas->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
