@extends('layouts.app2')


@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="pagetitle">
    <h1>Tambah Carousel</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item">Carousel</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Carousel
                        <a href="{{ route('carousel.index' )}}" class="btn btn-secondary btn-sm float-end">Kembali</a>
                    </h5>
                    <br>
                    <form class="row g-3" action="{{ route('carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <label for="image" class="col-sm-2 col-form-label">Foto Carousel</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" value="{{ old('image', $carousel->image) }}" id="image">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi', $carousel->deskripsi) }}" id="deskripsi">
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection