@forelse ($tampilan as $tampilan)
<section class="py-3 bg-dark text-white p-4 mt-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h5 class="text-center "><b>About</b></h5>
                <hr>
                <div align="justify">
                {!! $tampilan->about !!}
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="text-center"><b>Contact Us</b></h5>
                <hr>
                <div class="text-center justify-content-center">
                    <a type="button" class="btn mb-2  @if(empty($tampilan->fb)) disabled" @else btn-light" href="https://www.facebook.com/{{ $tampilan->fb }}" target="_blank" @endif><i class="bi bi-facebook me-1"></i> Facebook</a>
                    <a type="button" class="btn mb-2  @if(empty($tampilan->ig)) disabled" @else btn-light" href="https://instagram.com/{{ $tampilan->ig }}" target="_blank" @endif><i class="bi bi-instagram me-1"></i> Instagram</a>
                    <a type="button" class="btn mb-2  @if(empty($tampilan->twitter)) disabled" @else btn-light" href="https://twitter.com/{{ $tampilan->twitter }}" target="_blank" @endif><i class="bi bi-twitter me-1"></i> Twitter</a>
                    <a type="button" class="btn mb-2  @if(empty($tampilan->wa)) disabled" @else btn-light" href="http://Wa.me/{{ $tampilan->wa }}" target="_blank" @endif><i class="bi bi-whatsapp me-1"></i> WhatsApp</a>
                    <a type="button" class="btn mb-2  @if(empty($tampilan->email)) disabled" @else btn-light" href="mailto:{{ $tampilan->email }}" target="_blank" @endif><i class="bi bi-envelope-fill me-1"></i> Email</a>
                    <a type="button" class="btn mb-2  @if(empty($tampilan->alamat)) disabled" @else btn-light" href="{{ $tampilan->alamat }}" target="_blank" @endif><i class="bi bi-pin-map-fill me-1 "></i> Alamat</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('about');
</script>
@empty
@endforelse