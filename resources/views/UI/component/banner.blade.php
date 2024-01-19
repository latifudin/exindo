<!-- carousel -->
    <div class="container">
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