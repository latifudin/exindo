@extends('layouts.app2')


@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="pagetitle">
    <h1>Tambah Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Produk
                        <a href="{{ route('produk.index' )}}" class="btn btn-secondary btn-sm float-end">Kembali</a>
                    </h5>
                    <br>
                    <form class="row g-3" action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <label for="image" class="col-sm-2 col-form-label">Foto Produk</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" value="{{ old('image', $produk->image) }}" id="image">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $produk->judul) }}" id="judul">
                                @error('judul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="col-sm-10 form-control @error('kategori') is-invalid @enderror" name="kategori[]" id="kategori" multiple data-live-search="true" style="width:100%">
                                    @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}"@foreach ($kato as $kit)@if($data->id == $kit->kategori_id) selected="selected" @endif @endforeach >
                                        {{ $data->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" class="form-control @error('nominal') is-invalid @enderror" name="harga" value="{{ old('harga', $produk->harga) }}" id="harga">
                                    @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon', $produk->diskon) }}" id="diskon">
                                @error('diskon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" rows="5" id="detail">{{ old('detail', $produk->detail) }}</textarea>
                                @error('detail')
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

@section('js')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('detail');
</script>

<script>
    $(document).ready(function() {
        $('#kategori').select2({
            placeholder: 'Pilih Kategori',
            allowClear: true,
            multiple: true,
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection