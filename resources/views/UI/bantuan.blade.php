@extends('UI.layouts.app5')

@section('content')
<section class="mt-4 ">
    <div class="container pt-5">
        <div class="col-lg-12 dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Fitur Bantuan</h5>
                    <div class="accordion" id="accordionExample">
                        @forelse ($kategori as $kat)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{ $kat->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $kat->id }}" aria-expanded="true" aria-controls="collapse_{{ $kat->id }}">
                                    {{$loop->iteration}}. {{ $kat->bantukat }}
                                </button>
                            </h2>
                            <div id="collapse_{{ $kat->id }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $kat->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @forelse ($bantuan->where('bantu_id', $kat->id) as $data)
                                    <div class="accordion" id="sub-accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="sub-heading_{{ $data->id }}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapse_{{ $data->id }}" aria-expanded="true" aria-controls="collapse_{{ $kat->id }}">
                                                    {{ $data->judul }}
                                                </button>
                                            </h2>
                                            <div id="sub-collapse_{{ $data->id }}" class="accordion-collapse collapse" aria-labelledby="sub-heading_{{ $data->id }}" data-bs-parent="#sub-accordionExample">
                                                <div class="accordion-body">
                                                    {!! $data->isi !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="accordion" id="sub-accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="sub-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Accordion Item #1
                                                </button>
                                            </h2>
                                            <div id="sub-collapseOne" class="accordion-collapse collapse" aria-labelledby="sub-headingOne" data-bs-parent="#sub-accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="sub-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapseTwo" aria-expanded="false" aria-controls="sub-collapseTwo">
                                                    Accordion Item #2
                                                </button>
                                            </h2>
                                            <div id="sub-collapseTwo" class="accordion-collapse collapse" aria-labelledby="sub-headingTwo" data-bs-parent="#sub-accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection