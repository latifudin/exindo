@extends('layouts.app2')

@section('content')

<div class="pagetitle">
  <h1>Dashboard</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6 dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Produk</h5>
          <h2 class="float-end">{{ $produk->count() }} Produk</h2>
        </div>
      </div>
    </div>
    <div class="col-lg-6 dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Kategori</h5>
          <h2 class=" float-end">{{ $kategori->count() }} Produk</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Produk</h5>
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produk as $data)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $data->judul }}</td>
                <td>
                  <ul>
                    @foreach ($data->kategoris as $kat)
                    <li>{{ $kat->name }}</li>
                    @endforeach
                  </ul>
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