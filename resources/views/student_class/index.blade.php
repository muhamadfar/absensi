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
                <h2>Data Kelas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student_class.create') }}"> Create</a>
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
            <th>Kelas</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($class as $kelas)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $kelas->class}}</td>
            <td>
                <form action="{{ route('student_class.destroy',$kelas->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('student_class.edit',$kelas->id) }}">Edit</a>
                    <a class="btn btn-primary" href="{{ route('student_class.show',$kelas->id) }}">Show</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $class->links() !!}
</div>

@endsection
