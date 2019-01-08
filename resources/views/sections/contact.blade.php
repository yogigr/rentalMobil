<section class="section {{ Route::currentRouteName() == 'home' ? 'section-lg bg-gradient-default' : ''}}">
  <div class="container">
    <div class="row text-center justify-content-center">
      <div class="col-lg-10">
        @if(Route::currentRouteName() == 'home')
        <h2 class="display-3 text-white">Kontak Kami</h2>
        @endif
        <p class="lead {{ Route::currentRouteName() == 'home' ? 'text-white' : ''}}">
          Jangan ragu untuk menghubungi kami perihal booking / mengajukan pertanyaan sekitar rental mobil kami 
        </p>
      </div>
    </div>
    <div class="row row-grid mt-5">
      <div class="col-lg-4 text-center text-md-left">
        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
          <i class="fa fa-map-marker text-primary"></i>
        </div>
        <h5 class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">Alamat</h5>
        <p class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">
          <strong>{{ strtoupper($contact->nama_perusahaan) }}</strong><br>
          {{ $contact->alamat }}
        </p>
      </div>
      <div class="col-lg-4 text-center">
        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
          <i class="fa fa-briefcase text-primary"></i>
        </div>
        <h5 class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">Jam Kerja</h5>
        <p class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">
          {{ $contact->hari_kerja }}<br>
          {{ $contact->jam_kerja }}
        </p>
      </div>
      <div class="col-lg-4 text-center text-md-right">
        <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
          <i class="fa fa-whatsapp text-primary"></i>
        </div>
        <h5 class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">WhatsApp/Sms/Telp</h5>
        <p class="{{ Route::currentRouteName() == 'home' ? 'text-white' : ''}} mt-3">
          {{ $contact->telp1 }}<br>
          {{ $contact->telp2 }}<br>
          {{ $contact->telp3 }}<br>
        </p>
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