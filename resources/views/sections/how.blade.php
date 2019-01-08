<section class="section section-lg">
  <div class="container">
    <div class="row justify-content-center text-center mb-3">
      <div class="col-lg-8">
        @if(Route::currentRouteName() == 'home')
        <h2 class="display-3">Alur Prosedur Penyewaan</h2>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php $colors = ['bg-gradient-info', 'bg-gradient-warning', 'bg-gradient-default', 'bg-gradient-success']; ?>
        @if($hows->count() > 0)
          <?php $num = 0 ?>
          @foreach($hows as $how)
            <div class="card {{ $colors[$num] }} shadow-lg border-0 mb-3">
              <div class="p-5">
                <div class="row align-items-center">
                  <div class="col-lg-10">
                    <h5 class="text-white">{{ $how->title }}</h5>
                    <p class="text-white mt-2">
                      {{ $how->description }}
                    </p>
                  </div>
                  <div class="col-lg-2 ml-lg-auto text-right">
                    {!! $how->icon !!}
                  </div>
                </div>
              </div>
            </div>
            <?php $num++ ?>
          @endforeach
        @else
        Belum ada data
        @endif
      </div>
    </div>
  </div>
</section>