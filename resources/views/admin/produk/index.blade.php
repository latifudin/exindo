@extends('layouts.app2')

@section('content')

<div class="pagetitle">
  <h1>Produk</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item">Data</li>
      <li class="breadcrumb-item active">Produk</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12 dashboard">
      <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
          <h5 class="card-title">
            Data Produk
            <a href="{{ route('produk.create' )}}" class="btn btn-primary btn-sm float-end">Tambah Data</a>
          </h5>
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produk as $data)
              <tr>
                <th scope="row">
                  <img src="{{ asset('/storage/produk/'.$data->image) }}" alt="">
                </th>
                <td>{{ $data->judul }}</td>
                <td>
                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $data->id) }}" method="POST">
                    <a href="{{ route('produk.show', $data->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-line"></i></a>
                    <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5">
                  <div class="alert alert-danger text-center">
                    Data Produk belum Tersedia.
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
</section>
@endsection