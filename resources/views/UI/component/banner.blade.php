<!-- carousel -->
<div class="container">
  @if(count($carousel ?? []) > 0)
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              @foreach ($carousel as $i => $data)
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" class="{{ $i == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{$i+1}}"></button>
              @endforeach
          </div>
          <div class="carousel-inner">
              @foreach ($carousel as $i => $data)
                  <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                      <img src="{{ asset('/storage/carousel/'.$data->image) }}" class="img-fluid d-md-block w-100 carousel-img" alt="Responsif Image">
                  </div>
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
  @else
      <!-- Display a default carousel item with a message for empty data -->
    <div class="alert alert-warning text-center">
      No banner images available.
    </div>
  @endif
</div>
