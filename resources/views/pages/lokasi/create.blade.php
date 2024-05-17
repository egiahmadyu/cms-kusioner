@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Lokasi Penyimpanan</h5>
            <form action="" id="form_tambah" class="needs-validation" novalidate>
              @csrf
              @method('POST')
              <div class="row">
                <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Nomor Surat Ketetapan: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="number" name="number"
                        placeholder="S.Tap/.../.../2024" required="" type="text">
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                  <label class="form-control-label">Satker: <span
                    class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="storage_division" id="storage_division" placeholder="Divpropam/Bidpropam Polda/Sipropam Polres" required>
                  </select>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                  <label class="form-control-label">Kategori: <span
                    class="tx-danger">*</span></label>
                  <select class="form-control select2" name="kategori" id="kategori">
                    <option value="1">Bukan Uang</option>
                    <option value="2">Uang</option>
                  </select>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                  <label class="form-control-label">Jenis Tempat Penyimpanan: <span
                    class="tx-danger">*</span></label>
                  <select class="form-control select2" name="tipe" id="tipe">
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                  </select>
                </div>

                <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Lokasi Penetapan: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="specified" name="specified"
                        placeholder="Lokasi Penetapan" required="" type="text">
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Tanggal Penetapan: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="date" name="date"
                        required="" type="date">
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Waktu Penetapan: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="time" name="time"
                        required="" type="time">
                </div>
              </div>

              <div class="row">
                <h5 class="mt-4">Penyimpanan</h5>
              </div>
              <div class="row mt-2" id="storage_row">
                <div class="col-md-6 col-lg-6 mb-3">
                  <label class="form-control-label">Lokasi Penyimpanan: <span
                              class="tx-danger">*</span></label> <textarea
                          class="form-control" id="location" name="location"
                          placeholder="Lokasi Penyimpanan" required="" type="textarea"></textarea>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MAIN-CONTAINER -->

@endsection

@push('script')
<script src="{{asset('js/master.js')}}"></script>
{{-- <script src="{{asset('js/storage/create.js')}}"></script> --}}
<script>
  $(document).ready(function() {
    $('#kategori').select2({
      theme: 'bootstrap-5',
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    });
    
    function formatDate(date) {
      var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

      if (month.length < 2) 
          month = '0' + month;
      if (day.length < 2) 
          day = '0' + day;

      return [year, month, day].join('-');
    }

    function formatTime(date) {
      var d = new Date(date),
          hours = '' + (d.getHours() + 1),
          minutes = '' + d.getMinutes();

      if (hours.length < 2) 
          hours = '0' + hours;
      if (minutes.length < 2) 
          minutes = '0' + minutes;

      return [hours, minutes].join(':');
    }

    let now = new Date();
    $('#date').val(formatDate(now));
    $('#time').val(formatTime(now));

    $('#kategori').on('change', function() {
      if (this.value == 1) {
        $('#tipe').removeAttr('disabled');
        $('#storage_row').empty().html(``);
        let row = `<div class="col-md-6 col-lg-6 mg-t-20 mg-md-t-0">
          <label class="form-control-label">Lokasi Penyimpanan: <span
                      class="tx-danger">*</span></label> <textarea
                  class="form-control" id="location" name="location"
                  placeholder="Lokasi Penyimpanan" required="" type="textarea"></textarea>
        </div>`;
        $('#storage_row').empty().html(``);
        $('#storage_row').append(row);
      } else {
        $('#tipe').val(3);
        // $('#tipe').attr('disabled', true);
        let row = `<div class="col-md-6 col-lg-6 mb-3">
                <label class="form-control-label">Nama Bank: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="bank_name" name="bank_name"
                        placeholder="Nama Bank" required="" type="text">
              </div>
              <div class="col-md-6 col-lg-6 mb-3">
                <label class="form-control-label">Cabang: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="branch" name="branch"
                        placeholder="Cabang" required="" type="text">
              </div>
              <div class="col-md-6 col-lg-6 mb-3">
                <label class="form-control-label">Nama Pemilik Rekening: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="name" name="name"
                        placeholder="Nama Pemilik Rekening" required="" type="text">
              </div>
              <div class="col-md-6 col-lg-6 mb-3">
                <label class="form-control-label">No. Rekening: <span
                            class="tx-danger">*</span></label> <input
                        class="form-control" id="account_number" name="account_number"
                        placeholder="98027899876" required="" type="text">
              </div>`;
        $('#storage_row').empty().html(``);
        $('#storage_row').append(row);
      }
    })
  });
  (function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = $("#form_tambah");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                    var url = "/lokasi";
                    var body = $("#form_tambah").serialize();
                    callAPI("post", url, body, "success_insert");
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

function success_insert(result) {
    if (result.status == 200) {
        add_notification({
            type: "success",
            msg: result.message,
            position: "center",
            width: 320,
            height: 60,
            autohide: true,
        });
        setInterval(function () {
            window.location.href = "/lokasi";
        }, 1000);
    } else {
        add_notification({
            type: "error",
            msg: result.message,
            position: "center",
            width: 320,
            height: 60,
            autohide: true,
        });
    }
}

</script>

@endpush
