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

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Absensi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('presence.create') }}"> Create</a>
                <a class="btn btn-success" href="{{ route('report.index') }}">Report</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Rayon</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($presences as $presence)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $presence->student->nama }}</td>
            <td>{{ $presence->student->rayon->rayon ?? ''}}</td>
            <td>{{ $presence->student->major->jurusan ?? '' }}</td>
            <td>{{ $presence->student->class->class ?? '' }}</td>
            <td>{{ $presence->jam_masuk }}</td>
            <td>{{ $presence->jam_keluar }}</td>
            <td>{{ $presence->date }}</td>
            <td>{{ $presence->ket}}</td>
            <td>
                <form action="{{ route('presence.destroy',$presence->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('presence.edit',$presence->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $presences->links() !!}

@endsection
