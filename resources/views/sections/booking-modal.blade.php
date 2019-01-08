{{--Modal--}}
<div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-danger">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Silahkan Kontak Kami</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-3 text-center">
          <i class="fa fa-mobile fa-3x"></i>
          <i class="fa fa-whatsapp fa-3x"></i>
          <h4 class="heading mt-4"></h4>
          <p>{{ $contact->telp1 }}</p>
          <p>{{ $contact->telp2 }}</p>
          <p>{{ $contact->telp3 }}</p>
        </div>
        <div class="py-3 text-center">
          <i class="fa fa-map-marker fa-3x"></i>
          <h4 class="heading mt-4">{{ $contact->nama_perusahaan }}</h4>
          {{ $contact->alamat }}
        </div>
      </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
    </div>
    </div>
  </div>
</div>