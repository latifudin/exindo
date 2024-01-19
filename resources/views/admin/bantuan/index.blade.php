@extends('layouts.app2')

@section('content')
<div class="pagetitle">
    <div class="float-end">
        Tambah Data :
        <a class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#Kategori">Kategori</a>
        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#SubKategori">bantuan</a>
    </div>
    <h1>Fitur Bantuan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active">Bantuan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12 dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bantuan</h5>

                    @forelse ($kategori as $kat)
                    <div class="bg-light p-2 border-top border-bottom mb-2 d-flex justify-content-between align-items-center"">
                        <h6 class=" fw-bold">{{$loop->iteration}}. {{ $kat->bantukat }}</h6>
                        <div class="float-end">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('admin/bantuan/kategori', $kat->id) }}" method="POST">
                                <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditKategori_{{ $kat->id }}"><i class="bi bi-pencil-square"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>

                            <!-- Modal Edit Kategori-->
                            <div class="modal fade" id="EditKategori_{{ $kat->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('admin/bantuan/kategori/update', $kat->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label for="bantukat" class="col-sm-3 col-form-label"><b>Kategori</b> </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="bantukat" value="{{ $kat->bantukat }}" id="bantukat">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <ul class="list-group list-group-light mb-4 ms-4">
                        @forelse ($bantuan->where('bantu_id', $kat->id) as $data)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="col-lg-12">
                                <div class="float-end mt-1">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('admin/bantuan/bantu', $data->id) }}" method="POST">
                                        <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditSubKategori_{{ $data->id }}"><i class="bi bi-pencil-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                                <p class="fw-bold mt-2">{{ $data->judul }}</p>
                                <hr>
                                <div class="ms-3">
                                    <div class="text-muted mb-0">{!! $data->isi !!}</div>
                                </div>
                            </div>
                        </li>

                        <!-- Modal Edit Bantuan-->
                        <div class="modal fade" id="EditSubKategori_{{ $data->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Bantuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('admin/bantuan/bantu/update', $data->id) }}') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-2">
                                                <label for="kat_id" class="col-sm-2 col-form-label">Kategori </label>
                                                <div class="col-sm-3">
                                                    <select name="bantu_id" class="form-control @error('kategori') is-invalid @enderror">
                                                        <option selected disabled value="">Pilih Kategori</option>
                                                        @foreach ($kategori as $data2)
                                                        <option value="{{ $data2->id }}" {{ $data2->id ==  $kat->id  ? 'selected' : '' }}>{{ $data2->bantukat }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bantu_id')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <label for="judul" class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="judul" value="{{ $data->judul }}" id="judul">
                                                    @error('judul')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="isi" class="mb-2">Penjelasan_{{ $data->id }}</label>
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" name="isi" rows="5" id="isi_{{ $data->id }}">{!! $data->isi !!}</textarea>
                                                </div>
                                            </div>
                                            <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                                            <script>
                                                CKEDITOR.replace('isi_{{ $data->id }}');
                                            </script>
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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            -- > Belum Ada Data
                        </li>
                        @endforelse
                    </ul>
                    @empty
                    --
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Kategori-->
<div class="modal fade" id="Kategori" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/bantuan/kategori/create') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="bantukat" class="col-sm-3 col-form-label"><b>Kategori</b> </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="bantukat" value="{{ old('bantukat') }}" id="bantukat">
                        </div>
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

<!-- Modal Tambah Bantuan-->
<div class="modal fade" id="SubKategori" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Bantuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/bantuan/bantu/create') }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <label for="kat_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-3">
                            <select name="bantu_id" class="form-control @error('kategori') is-invalid @enderror">
                                <option selected disabled value="">Pilih Kategori</option>
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}" {{ old('bantu_id') ==  $data->bantukat  ? 'selected' : '' }}>{{ $data->bantukat }}</option>
                                @endforeach
                            </select>
                            @error('bantu_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label for="judul" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" id="judul">
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="isi" class="mb-2">Penjelasan</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" @error('isi') is-invalid @enderror name="isi" rows="5" id="isi">{{{ Request::old('isi') }}}</textarea>
                            @error('isi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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

@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi');
</script>
@endsection