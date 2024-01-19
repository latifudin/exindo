@extends('layouts.app2')

@section('content')

<div class="pagetitle">
  <h1>Carousels</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item">Data</li>
      <li class="breadcrumb-item active">Carousel</li>
    </ol>
  </nav>
</div>

<section class="section">
    <!-- carousel -->
    {{-- <div class="container">
      <div class="card-body">
        <div class="row mb-3">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <!--{{$i=0}}-->
              @foreach ($carousel as $data)
                @if ($i == 0)
                    <!--{{$aktif = "active"}}-->
                @else
                    <!--{{$aktif = ""}}-->
                    
                @endif
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" class="{{$aktif}}" aria-current="true" aria-label="Slide 1"></button>
                <!--{{$i++}}-->
                @endforeach
            </div>
            <div class="carousel-inner">
              <!--{{$i=0}}-->
              @foreach ($carousel as $data)
                @if ($i == 0)
                    <!--{{$aktif = "active"}}-->
                @else
                    <!--{{$aktif = ""}}-->
                    
                @endif
                <div class="carousel-item {{$aktif}}">
                  <img src="{{ asset('/storage/carousel/'.$data->image) }}" class="img-fluid d-md-block w-100 carousel-img" alt="Responsif Image">
                  <!--<div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>-->
                </div>   
                <!--{{$i++}}--> 
              @endforeach
  
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div> --}}
      <div class="row">
        <div class="col-lg-12 dashboard">
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
              <h5 class="card-title">
                Data Carousel
                <a href="{{ route('carousel.create' )}}" class="btn btn-primary btn-sm float-end">Tambah Data</a>
              </h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($carousel as $data)
                  <tr>
                    <th scope="row">
                      <img src="{{ asset('/storage/carousel/'.$data->image) }}" alt="">
                    </th>
                    <td>{{ $data->Deskripsi }}</td>
                    <td>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('carousel.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('carousel.show', $data->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-line"></i></a>
                        <a href="{{ route('carousel.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
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
                        Data Carousel belum Tersedia.
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