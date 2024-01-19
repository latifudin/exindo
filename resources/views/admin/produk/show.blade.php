@extends('layouts.app2')

@section('content')

<div class="pagetitle">
    <h1>Detail Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-4">
            <img src="{{ asset('/storage/produk/'.$produk->image) }}" class="img-fluid w-100 rounded" alt="...">
        </div>
        <div class="col-lg-8 dashboard">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-4"><b>{{ $produk->judul }}</b></h4>
                    <hr>
                    <nav style="--bs-breadcrumb-divider: '|';">
                        <ol class="breadcrumb">
                            @foreach ($produk->kategoris as $kat)
                            <li class="breadcrumb-item active">{{ $kat->name }}</li>
                            @endforeach
                        </ol>
                    </nav>
                    <table class="table table-sm table-borderless">
                        @if( $produk->diskon == null)
                        <thead>
                            <tr>
                                <th style="font-size:25px;">
                                    @currency($produk->harga)
                                </th>
                            </tr>
                        </thead>
                        @else
                        <thead>
                            <tr>
                                <th style="font-size:12px;">
                                    <strike>@currency($produk->harga)</strike>
                                    <span class="badge bg-danger">Diskon : {{ $produk->diskon }} %</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="font-size:25px;">
                                    @currency($hasil)
                                </th>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                    <a type="button" class="btn btn-success float-end" href="http://Wa.me/6285212567047?text=
                    Halo....%0AApakah produk : %0A{{$produk->judul}}%0Amasih tersedia?" target="_blank">
                        <i class="bi bi-whatsapp me-1"></i> Order
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-4"><b>Detail Produk</b></h5>
                    <hr>
                    <div>
                        {!!$produk->detail!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail');
    </script>
</section>

@endsection