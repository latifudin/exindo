@extends('layouts.app2')

@section('content')

<div class="pagetitle">
    <h1>Kategori</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Search : Kategori {{$Kate->name}}</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        @foreach ($Kate->katego as $katePro)
        @php
        $Prod = $Produk->where('id', $katePro->produk_id)->first();
        @endphp
        <div class="col-lg-2">
            <div class="card">
                <img src="{{ asset('/storage/produk/'.$Prod->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">{{ $Prod->judul }}</h6>
                    
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Card link</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection


@section('js')

@endsection