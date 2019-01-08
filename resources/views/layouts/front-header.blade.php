<header class="header-global">
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
        {{ strtoupper($contact->nama_perusahaan) }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ url('/') }}">
                {{ strtoupper($contact->nama_perusahaan) }}
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="{{ url('paket-sewa-mobil') }}">Paket Sewa</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('prosedur-penyewaan') }}">Prosedur</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('kontak-kami') }}">Kontak Kami</a></li>
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ $contact->facebook }}" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ $contact->instagram }}" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="mailto:{{ $contact->email }}" data-toggle="tooltip" title="Email Us">
              <i class="fa fa-envelope"></i>
              <span class="nav-link-inner--text d-lg-none">Email</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>