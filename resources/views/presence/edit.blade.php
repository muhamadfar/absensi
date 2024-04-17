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
            <h2>Edit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('presence.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('presence.update',$presence->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$presence->nama}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jam Masuk:</strong>
                <input type="time" name="jam_masuk" class="form-control" placeholder="Jam Masuk" value="{{$presence->jam_masuk}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jam Keluar:</strong>
                <input type="time" name="jam_keluar" class="form-control" placeholder="Jam Keluar" value="{{$presence->jam_keluar}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal:</strong>
                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{$presence->date}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="radio" name="ket" value="Hadir" {{$presence->ket == 'Hadir'? 'checked' : ''}}> Hadir
                <input type="radio" name="ket" value="Sakit" {{$presence->ket == 'Sakit'? 'checked' : ''}}> Sakit
                <input type="radio" name="ket" value="Ijin" {{$presence->ket == 'Ijin'? 'checked' : ''}}> Ijin
                <input type="radio" name="ket" value="Alfa" {{$presence->ket == 'Alfa'? 'checked' : ''}}> Alfa
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
