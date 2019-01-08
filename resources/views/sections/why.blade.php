<!-- why us -->
<section class="section pb-0 bg-gradient-warning">
  <div class="container">
    <div class="row row justify-content-center text-center">
      <div class="col-lg-8">
        <h2 class="text-white">Kenapa Harus Memilih Kami</h2>
        <p class="text-white">
          Kami mengedepankan Pelayanan yang baik dan ramah, Kualitas kendaraan yang selalu dalam kondisi baik, serta dukungan tim kami yang responsive melayani pelanggan.
        </p>
      </div>
    </div>
    <div class="row row-grid align-items-center">
      <div class="col-md-6 order-lg-2 ml-lg-auto">
        <div class="position-relative pl-md-5">
          <img src="{{ asset('images/web/ill-2.svg') }}" class="img-center img-fluid">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">

        <?php  
          $colors = [
            ['bg-gradient-primary', 'text-primary'],
            ['bg-gradient-warning', 'text-warning'],
            ['bg-gradient-success', 'text-success']
          ];
        ?>

        @if($whies->count() > 0)
          <?php $num = 0 ?>
          @foreach($whies as $why)
            <div class="card shadow shadow-lg--hover mt-5">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-lg icon-shape {{ $colors[$num][0] }} shadow rounded-circle text-white">
                      {!! $why->icon !!}
                    </div>
                  </div>
                  <div class="pl-4">
                    <h4 class="display-3 {{ $colors[$num][1] }}">{{ $why->title }}</h4>
                    <p>
                      {{ $why->description }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php $num++ ?>
          @endforeach
        @else
          Tidak ada data
        @endif
      
      </div>
    </div>
  </div>
  <!-- SVG separator -->
  <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div>
</section>