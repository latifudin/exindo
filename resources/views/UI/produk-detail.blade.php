@extends('UI.layouts.app4')

@section('content')
<div class="container py-3 mt-3">
    <section class="section  px-4 px-lg-5 pt-5">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('/storage/produk/'.$produk->image) }}" class="img-thumbnail" alt="...">
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
                        <div id="quantityControls">
                            <button id="decrement" onclick="decrement()">-</button>
                            <input id="demoInput" type="number" min="1" max="1000" value="1" readonly>
                            <button id="increment" onclick="increment()">+</button>
                        </div>
                        <br>
                        <div id="result">Total: <span id="total"></span></div>
                        <br>
                        <a type="button" class="btn btn-success float-start" id="orderButton" target="_blank">
                            <i class="bi bi-whatsapp me-1"></i> Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
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
            var hargaProduk = {{ $produk->harga }};
    var diskon = {{ $produk->diskon ?? 0 }};
    var hasil = {{ $hasil ?? $produk->harga }};

    function updateTotal() {
        var quantity = document.getElementById("demoInput").value;
        hasil = (hargaProduk - (hargaProduk * diskon / 100)) * quantity;
        document.getElementById("total").innerText = formatRupiah(hasil);
    }

    function increment() {
        var input = document.getElementById("demoInput");
        input.value = parseInt(input.value) + 1;
        updateTotal();
    }

    function decrement() {
        var input = document.getElementById("demoInput");
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            updateTotal();
        }
    }

    function formatRupiah(angka) {
        var number_string = angka.toString();
        var sisa = number_string.length % 3;
        var rupiah = number_string.substr(0, sisa);
        var ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return "Rp. " + rupiah;
    }

    var demoInputValue = document.getElementById("demoInput").value;

    function updateWhatsAppLink() {
        var quantity = parseInt(demoInputValue);
        var formattedHargaProduk = hargaProduk.toLocaleString('id-ID');
        var formattedTotal = hasil.toLocaleString('id-ID');
        var diskonInfo = "{{ $produk->diskon ? 'Diskon: *' . $produk->diskon . '%* %0A' : '' }}";

        var whatsappLink = "http://Wa.me/+6285212567047?text=*Halo Exindo Media*%0ASaya mau memesan produk : %0A*{{$produk->judul}}*%0AQty: *"+ quantity +"*%0AHarga: *Rp "+ formattedHargaProduk +"*%0A"+ diskonInfo +"Total: *Rp "+ formattedTotal +"*";

        // Update the href attribute of the order button
        document.getElementById('orderButton').href = whatsappLink;
    }

    // Initial update
    updateWhatsAppLink();
    // Initial update
    updateTotal();

        </script>
    </section>
</div>
@endsection