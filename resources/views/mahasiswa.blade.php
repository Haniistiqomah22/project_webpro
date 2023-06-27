@extends('layouts.app')
@extends('layouts.alert')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class= "card-header">{{ __('Hani Istiqomah UAS Pemrograman WEB') }}</div>
                <div class="card-header">{{ __('Data Mahasiswa') }}</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Tambah Data
                </button>

                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Aksi</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td><img src="{{asset('/foto/'.$row->foto)}}" width="100%"></td>
                                        <td>{{$row->nim}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->prodi}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal{{$row->id}}">
                                            Edit
                                            </button>
                                            <a href="{{url('/hapus-data-mahasiswa', $row->id)}}">
                                            <button class="btn btn-danger">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <form action="{{url('simpan-data-mahasiswa')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label>NIM</label>
        <input type="number" name="nim" class="form-control" value="{{ old('nim')}}">
        @error('nim')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama')}}">
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" value="{{ old('foto')}}">
        @error('foto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label>Prodi</label>
        <input type="text" name="prodi" class="form-control" value="{{ old('prodi')}}">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

@foreach($data as $row)
<!-- The Modal -->
<div class="modal" id="myModal{{$row->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <form action="{{url('update-data-mahasiswa')}}/{{$row->id}}" method="GET">
        @csrf
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label>NIM</label>
        <input type="number" name="nim" class="form-control" value="{{$row->nim}}">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{$row->nama}}">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" value="{{$row->foto}}">
        <label>Prodi</label>
        <input type="text" name="prodi" class="form-control" value="{{$row->prodi}}">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection
