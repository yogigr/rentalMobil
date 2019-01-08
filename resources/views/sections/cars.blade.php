<!--cars-->
<section class="section section-lg pt-lg-0 mt--200">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="row row-grid">
          @if($cars->count() > 0)
          @foreach($cars as $car)
          <div class="col-lg-4">
            <div class="card card-lift--hover shadow border-0">
              <img class="card-img-top" src="{{ $car->getImage() }}" alt="{{ config('app.name').'-'.$car->name }}">
              <div class="card-body py-5">
                <h6 class="text-primary text-uppercase">{{ $car->name }}</h6>
                <p class="description mt-3">Harga Rp {{ $car->getPrice() }}</p>
                <a href="#" class="btn btn-primary mt-4" data-toggle="modal" data-target="#booking-modal">Booking</a>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="col-sm-12">
            Belum ada Paket
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>