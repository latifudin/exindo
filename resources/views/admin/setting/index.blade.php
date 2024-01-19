@extends('layouts.app2')

@section('content')
<div class="pagetitle">
  <h1>Footer
    @forelse ($data as $cek)
    <a class="btn btn-warning btn-sm float-end" data-bs-toggle="modal" data-bs-target="#EditData">Edit Data</a></h1>
    <!-- modal edit -->
    <div class="modal fade" id="EditData" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('setting.update', $cek->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label for="banner" class="col-sm-3 col-form-label"><b>Banner</b> </label>
                <div class="col-sm-9">
                  <input class="form-control" type="file" name="banner" value="{{ old('banner', $cek->banner) }}" id="banner">
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <p><b>Tentang Perusahaan</b> </p>
                <div class="col-sm-12">
                  <textarea type="text" class="form-control" name="about" rows="5" id="about">{{ $cek->about }}</textarea>
                </div>
              </div>
              <hr>
              <p><b>Link Sosial Media</b> </p>
              <div class="row">
                <div class="col-6">
                  <div class="row mb-2">
                    <label for="fb" class="col-sm-3 col-form-label">Facebook</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="fb" value="{{ old('fb', $cek->fb) }}" id="fb">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="ig" class="col-sm-3 col-form-label">Instagram</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ig" value="{{ old('ig', $cek->ig) }}" id="ig">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $cek->twitter) }}" id="twitter">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row mb-2">
                    <label for="wa" class="col-sm-3 col-form-label">WhatsApp</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="wa" value="{{ old('wa', $cek->wa) }}" id="wa">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" value="{{ old('email', $cek->email) }}" id="email">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $cek->alamat) }}" id="alamat">
                    </div>
                  </div>
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
    @empty
    <a class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#TambahData">Tambah Data</a></h1>
    @endforelse
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item">Setting</li>
      <li class="breadcrumb-item active">UI Toko</li>
    </ol>
  </nav>
</div>
<section class="section">
  <div class="row">
    @forelse($data as $data)
    {{-- <div class="col-lg-12">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Gambar Benner</h5>
          @if(empty($data->banner))
          <img src="{{ asset('template/img/no-banner-image.jpg') }}" class="w-100">
          @else
          <img src="{{ asset('/storage/UI/'.$data->banner) }}" class="w-100">
          @endif
        </div>
      </div>
    </div> --}}
    <div class="col-lg-7">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Tentang Perusahaan</h5>
          <div>
            @if(empty($data->about))
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            @else
            {!! $data->about !!}
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <!-- Revenue Card -->
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Sosial Media</h5>
          <div class="list-group">
            <a class="list-group-item @if(empty($data->fb)) disabled" @else list-group-item-success" href="https://www.facebook.com/{{ $data->fb }}" target="_blank" @endif><i class="bi bi-facebook me-1"></i> Facebbok</a>
            <a class="list-group-item @if(empty($data->ig)) disabled" @else list-group-item-success" href="https://instagram.com/{{ $data->ig }}" target="_blank"  @endif><i class="bi bi-instagram me-1"></i> Instagram</a>
            <a class="list-group-item @if(empty($data->twitter)) disabled" @else list-group-item-success" href="https://twitter.com/{{ $data->twitter }}" target="_blank"  @endif><i class="bi bi-twitter me-1"></i> Twitter</a>
            <a class="list-group-item @if(empty($data->wa)) disabled" @else list-group-item-success" href="http://Wa.me/{{ $data->wa }}" target="_blank" @endif><i class="bi bi-whatsapp me-1"></i> WhatsApp</a>
            <a class="list-group-item @if(empty($data->email)) disabled" @else list-group-item-success" href="mailto:{{ $data->email }}" target="_blank" @endif><i class="bi bi-envelope-fill me-1"></i> Email</a>
            <a class="list-group-item @if(empty($data->alamat)) disabled" @else list-group-item-success" href="{{ url($data->alamat) }}" target="_blank" @endif><i class="bi bi-pin-map-fill me-1 "></i> Alamat</a>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="col-lg-12">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Gambar Benner</h5>
          <img src="{{ asset('template/img/no-banner-image.jpg') }}" class="w-100">
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Tentang Perusahaan</h5>
          <div>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <!-- Revenue Card -->
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Sosial Media</h5>
          <div class="list-group">
            <a class="list-group-item disabled" href=""><i class="bi bi-facebook me-1"></i> Facebook</a>
            <a class="list-group-item disabled" href=""><i class="bi bi-instagram me-1"></i> Instagram</a>
            <a class="list-group-item disabled" href=""><i class="bi bi-twitter me-1"></i> Twitter</a>
            <a class="list-group-item disabled" href=""><i class="bi bi-whatsapp me-1"></i> WhatsApp</a>
            <a class="list-group-item disabled" href=""><i class="bi bi-envelope-fill me-1"></i> Email</a>
            <a class="list-group-item disabled" href=""><i class="bi bi-pin-map-fill me-1 "></i> Alamat</a>
          </div>
        </div>
      </div>
    </div>
    @endforelse
  </div>
</section>

<!-- modal tambah -->
<div class="modal fade" id="TambahData" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('setting.store' )}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="banner" class="col-sm-3 col-form-label"><b>Banner</b> </label>
            <div class="col-sm-9">
              <input class="form-control" type="file" name="banner" value="{{ old('banner') }}" id="banner">
            </div>
          </div>
          <hr>
          <div class="row mb-3">
            <p><b>Tentang Perusahaan</b> </p>
            <div class="col-sm-12">
              <textarea type="text" class="form-control" name="about" rows="5" id="about">{{ old('about') }}</textarea>
            </div>
          </div>
          <hr>
          <p><b>Link Sosial Media</b> </p>
          <div class="row">
            <div class="col-6">
              <div class="row mb-2">
                <label for="fb" class="col-sm-3 col-form-label">Facebook</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="fb" value="{{ old('fb') }}" id="fb">
                </div>
              </div>
              <div class="row mb-2">
                <label for="ig" class="col-sm-3 col-form-label">Instagram</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ig" value="{{ old('ig') }}" id="ig">
                </div>
              </div>
              <div class="row mb-2">
                <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" id="twitter">
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row mb-2">
                <label for="wa" class="col-sm-3 col-form-label">WhatsApp</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="wa" value="{{ old('wa') }}" id="wa">
                </div>
              </div>
              <div class="row mb-2">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email">
                </div>
              </div>
              <div class="row mb-2">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" id="alamat">
                </div>
              </div>
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
  CKEDITOR.replace('about');
</script>
@endsection