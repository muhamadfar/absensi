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
                <h2>Data Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayon.create') }}"> Create</a>
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
            <th>Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon}}</td>
            <td>
                <form action="{{ route('rayon.destroy',$rayon->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('rayon.edit',$rayon->id) }}">Edit</a>
                    <a class="btn btn-primary" href="{{ route('rayon.show',$rayon->id) }}">Show</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <ul class="pagination">
      <li class="paginate_button page-item previous disabled" id="example1_previous">
        <a href="" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link"><</a>
      </li>
      <li class="paginate_button page-item active">
        <a href="" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
      </li>
      <li class="paginate_button page-item ">
        <a href="" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
      </li>
      <li class="paginate_button page-item next" id="example1_next">
        <a href="" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">></a>
      </li>
    </ul>

    {!! $rayons->links() !!}
</div>

@endsection
