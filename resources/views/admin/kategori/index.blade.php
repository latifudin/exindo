@extends('layouts.app2')

@section('content')

<div class="pagetitle">
  <h1>Kategori</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item">Data</li>
      <li class="breadcrumb-item active">Kategori</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12 dashboard">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Tambah Data</h5>
          <form class="row g-3" action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-8 mb-2">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name">
                <!-- error message untuk name -->
                @error('name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-sm-2 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-12 dashboard">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Data Kategori</h5>
          <div class="d-flex align-items-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Jml</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $data)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->produks->count() }} Produk</td>
                  <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                      <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditKategori_{{ $data->id }}"><i class="bi bi-pencil-square"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
                <!-- modal edit -->
                <div class="modal fade" id="EditKategori_{{ $data->id }}" tabindex="-1">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Data Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('kategori.update', $data->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label for="name" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" id="name">
                            @error('name')
                            <div class="alert alert-danger mt-2">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                @empty
                <tr>
                  <td colspan="4">
                    <div class="alert alert-danger text-center">
                      Data Kategori belum Tersedia.
                    </div>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection