@extends('UI.layouts.app4')

@section('content')
<section class="mt-4">
    <div class="container px-4 px-lg-5 pt-5">
        <div class="row justify-content-center">
            <p class="text-center ">
                <div class="d-flex flex-wrap justify-content-center" id="BtnFilter">
                    <button type="button" class="btn active m-2 text-dark" onclick="filterSelection('all')">All</button>
                    @foreach ($kategori as $kate)
                        <button type="button" class="btn m-2 text-dark" onclick="filterSelection('{{ $kate->id }}')">{{ $kate->name }}</button>
                    @endforeach
                </div>
            </p>
        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-2">
            @forelse ($produk as $data)
                <div class="col mb-4 filterDiv @foreach ($data->kategoris as $kat) {{ $kat->id }} @endforeach">
                    <div class="card h-100">
                        <a href="{{ url('produk', $data->id) }}" class="text-decoration-none text-black d-block">
                            <!-- Product image-->
                            <div class="ratio-container">
                                <div class="ratio-content">
                                    <img class="card-img-top img-fluid" src="{{ asset('/storage/produk/'.$data->image) }}" alt="" />
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-start">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder">{{ $data->judul }}</h6>
                                    <!-- Product price-->
                                    @php
                                    $diskon = (($data->harga*$data->diskon)/100);
                                    $hasil = (($data->harga)-$diskon);
                                    @endphp
                                    @if( $data->diskon == null)
                                    <p class="fw-bold">@currency($data->harga)</p>
                                    @else
                                    <b>@currency($hasil)</b><br>
                                    <p style="font-size:12px; color:red"><del>@currency($data->harga)</del> <b> {{$data->diskon}}%</b></p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
            <div class="col mb-1">
                <div class="alert alert-danger text-center">
                    Data Produk belum Tersedia.
                </div>
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset('template/img/no-image-produk.jpg') }}" alt="" />
                    <!-- Product details-->
                    <div class="card-body p-2">
                        <div class="text-start">
                            <!-- Product name-->
                            <h5 class="fw-bolder text-start">Nama Produk</h5>
                            <!-- Product price-->
                            <b>Harga</b>
                            <p style="font-size:12px; color:red"><del>Harga Asli</del> <b> Diskon%</b></p>
                        </div>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="row justify-content-center">
            {{ $produk->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@include('UI.layouts.tambahan')
@endsection