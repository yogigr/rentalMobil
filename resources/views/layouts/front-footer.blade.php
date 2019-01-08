<footer class="footer has-cards">
  <div class="container">
    <div class="row row-grid align-items-center my-md">
      <div class="col-lg-6">
        <h3 class="text-primary font-weight-light mb-2">{{ $contact->nama_perusahaan }} {{ $contact->deskripsi_pendek }}</h3>
        <h4 class="mb-0 font-weight-light">{{ $contact->deskripsi }}</h4>
      </div>
      <div class="col-lg-6 text-lg-center btn-wrapper">
        <a target="_blank" href="{{ $contact->facebook }}" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
          <i class="fa fa-facebook-square"></i>
        </a>
        <a target="_blank" href="{{ $contact->instagram }}" class="btn btn-neutral btn-icon-only btn-instagram btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow Us">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="mailto:{{ $contact->email }}" class="btn btn-neutral btn-icon-only btn-email btn-round btn-lg" data-toggle="tooltip" data-original-title="Email Us">
          <i class="fa fa-envelope"></i>
        </a>
      </div>
    </div>
    <hr>
    <div class="row align-items-center justify-content-md-between">
      <div class="col">
        <div class="copyright">
          &copy; {{ date('Y') }}
          <a href="{{ url('/') }}">{{ strtoupper($contact->nama_perusahaan) }}</a>
        </div>
      </div>
    </div>
  </div>
</footer>