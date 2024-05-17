@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Buat Pengajuan Baru</h5>
              <form id="form_tambah" class="needs-validation" novalidate>
                @csrf
                @method('POST')
                <div class="row">
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Nomor Nota Dinas: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="number" name="number" placeholder="R/ND-" type="text" value="{{ $storage->number }}">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Tanggal Nota Dinas: <span class="tx-danger">*</span></label> 
                    <input class="form-control" id="nd_date" name="nd_date" required="" type="date" value="{{ $storage->date }}">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">SPRIN: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="sprin" name="sprin" placeholder="Sprin/" required="" type="text" value="{{ $storage->sprin->number }}">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <label class="form-control-label">Tanggal SPRIN: <span class="tx-danger">*</span></label>
                        <input class="form-control" id="sprin_date" name="sprin_date" placeholder="Sprin/" required="" type="date" value="{{ $storage->sprin->date }}">
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <label class="form-control-label">Dokumen SPRIN: <span class="tx-danger">*</span></label>
                        <input class="form-control" id="sprin_file" name="sprin_file" type="file">
                      </div>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-md-3 col-lg-3">
                    <label class="form-control-label">Sumber Laporan: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" id="report_source" name="report_source" required>
                      <option selected disabled>Pilih Sumber</option>
                      @foreach ($source as $item)
                          <option value="{{ $item->id }}" {{ $storage->sprin->number == $item->id ? 'selected' : '' }}>{{ $item->source }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Nomor Laporan: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="report_number" name="report_number" placeholder="R/LI-" required="" type="text" value="{{ $storage->report_number }}">
                  </div>
                  <div class="col-md-3 col-lg-3 mb-2">
                    <label class="form-control-label">Tanggal Laporan: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="report_date" name="report_date" placeholder="R/LI-" required="" type="date" value="{{ $storage->report_date }}">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Nama Pelanggar: <span
                      class="tx-danger">*</span></label> <input
                      class="form-control" id="violator_name" name="violator_name"
                      placeholder="Nama Pelanggar" required="" type="text" value="{{ $storage->violator->name }}">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">NRP Pelanggar: <span
                      class="tx-danger">*</span></label> <input
                      class="form-control" id="violator_nrp" name="violator_nrp"
                      placeholder="NRP" required="" type="text" value="{{ $storage->violator->nrp }}">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Pangkat: <span
                      class="tx-danger">*</span></label>
                      <div class="form-group">
                        <select class="form-control select2" name="violator_rank" id="violator_rank">
                          @foreach ($rank as $item)
                          <option value="{{ $item->id }}" {{ $storage->violator->pangkat_id == $item->id ? 'selected' : '' }}>{{ $item->nama_pangkat }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Jabatan: <span
                      class="tx-danger">*</span></label> <input
                      class="form-control" id="violator_position" name="violator_position"
                      placeholder="Jabatan" required="" type="text" value="{{ $storage->violator->position }}">
                  </div>
                  <div class="col-md-12 col-lg-12 mb-3">
                    <label class="form-control-label">Tipe Pelanggaran: <span
                      class="tx-danger">*</span></label>
                    <div class="invalid-feedback">
                        MOHON PILIH TIPE PELANGGARAN !
                    </div>
                    <center>
                      <div class="col">
                        <div class="form-group d-inline-flex align-items-center gap-4">
                          <label class="custom-control custom-checkbox mb-0 d-inline-flex align-items-center gap-2">
                              <input type="radio" class="custom-control-input" id="disiplin" name="jenis_wp" value="1" onchange="disiplinChange(this)" autocomplete="off" required {{ $storage->violator->act == 1 ? 'checked' : '' }}>
                              <span class="custom-control-label">DISIPLIN</span>
                          </label>
                          <label class="custom-control custom-checkbox mb-0 d-inline-flex align-items-center gap-2">
                              <input type="radio" class="custom-control-input" id="kode_etik" name="jenis_wp" value="2" onchange="kodeEtikChange(this)" autocomplete="off" required {{ $storage->violator->act == 2 ? 'checked' : '' }}>
                              <span class="custom-control-label">KODE ETIK</span>
                          </label>
                        </div>
                      </div>
                    </center>
                  </div>
                  <div class="col-md-12 col-lg-12 mb-3">
                    <label class="form-control-label">Wujud Perbuatan: <span
                      class="tx-danger">*</span></label> 
                    <select class="form-select select2" data-live-search="true" aria-label="Default select example" name="violation" id="wujud_perbuatan" autocomplete="off" required>
                        <option value="{{ $storage->violator->violation }}">{{ $storage->violator->violation }}</option>
                    </select>
                    <div class="invalid-feedback">
                        MOHON PILIH WUJUD PERBUATAN !
                    </div>
                  </div>
                  {{-- <div class="col-md-6 col-lg-6 mb-3">
                    <label class="form-control-label">Jenis Pelanggaran: <span
                      class="tx-danger">*</span></label> <input
                      class="form-control" id="violation" name="violation"
                      placeholder="Jenis Pelanggaran" required="" type="text">
                  </div> --}}
                </div>

                <div class="row mt-2">
                  <h5>Barang Bukti</h5>
                </div>
                {{-- <input type="hidden" value="1" id="jumlahbb"> --}}
                {{-- <div id="barangbukti" class="">
                  <div class="row mt-2">
                    <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Kategori: <span
                        class="tx-danger">*</span></label>
                          <select class="form-control select2" id="kategori" name="kategori[1]">
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Jenis Barang Bukti: <span
                        class="tx-danger">*</span></label>
                          <select class="form-control select2" id="tipe" name="tipe[1]">
                            @foreach ($subkategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Barang Bukti: <span
                        class="tx-danger">*</span></label> 
                        <input
                          class="form-control" id="name" name="name[1]"
                          placeholder="Barang Bukti" required="" type="text">
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Jumlah: <span
                        class="tx-danger">*</span></label> 
                        <input
                          class="form-control" id="total" name="total[1]"
                          placeholder="" required="" type="text">
                    </div>
                  </div>
                </div> --}}
            
                {{-- <div class="row mt-2">
                  <div class="col-lg-4">
                      <a href="javascript:void(0);" class="btn btn-outline-primary w-100" id="tambah">Tambah Barang Bukti</a>
                  </div>
                </div> --}}
                
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
    <script src="{{asset('js/master.js')}}"></script>
    <script src="{{asset('js/penyimpanan/create.js')}}"></script>
    <script>
      $(document).ready(function () {

        if ($('#disiplin').is(':checked')) {
            // $().
            // document.getElementById("wujud_perbuatan").removeAttribute("disabled");
            // document.getElementById("kode_etik").setAttribute("disabled", "disabled");
            getValDisiplin()
        } else if ($('#kode_etik').is(':checked')) {
            // document.getElementById("wujud_perbuatan").removeAttribute("disabled");
            // document.getElementById("disiplin").setAttribute("disabled", "disabled");
            getValKodeEtik()
        }

        $('#violator_rank').select2({
          theme: 'bootstrap-5',
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        });
        $('#report_source').select2({
          theme: 'bootstrap-5',
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        });
        $('#wujud_perbuatan').select2({
          theme: 'bootstrap-5',
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        })
        $('#kategori').select2({
          theme: 'bootstrap-5',
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        })
        $('#tipe').select2({
          theme: 'bootstrap-5',
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        })
      });

      var no = $('#jumlahbb').val() != 0 ? $('#jumlahbb').val() : 1;
      $(document).on('click', '#tambah', function () {
      no++;
      var inputGroup = $(
        `
        <div class="row mt-2 bb-add">
          <div class="col-md-12 d-flex flex-row justify-content-between align-items-center"><div><span>Barang Bukti #${no}</span></div><button type="button" class="btn btn-danger remove_attach" title='Hapus'><span class="fa fa-trash"></span></button></div>

          <div class="col-md-6 col-lg-6 mb-3">
            <label class="form-control-label">Kategori: <span
              class="tx-danger">*</span></label> 
              {{-- <input
                class="form-control" id="role" name="role"
                placeholder="Role" required="" type="text"> --}}
                <select class="form-control select2" id="kategori" name="kategori[]">
                  @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <label class="form-control-label">Jenis Barang Bukti: <span
              class="tx-danger">*</span></label> 
              {{-- <input
                class="form-control" id="role" name="role"
                placeholder="Role" required="" type="text"> --}}
                <select class="form-control select2" id="tipe" name="tipe[]">
                  @foreach ($subkategori as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
          </div>

          <div class="col-md-6 col-lg-6 mb-3">
            <label class="form-control-label">Barang Bukti: <span
              class="tx-danger">*</span></label> 
              <input
                class="form-control" id="name" name="name[]"
                placeholder="Barang Bukti" required="" type="text">
          </div>
          <div class="col-md-6 col-lg-6 mb-3">
            <label class="form-control-label">Jumlah: <span
              class="tx-danger">*</span></label> 
              <input
                class="form-control" id="total" name="total[]"
                placeholder="" required="" type="text">
          </div>
        </div>`
      );

      $('#barangbukti').append(inputGroup);
    });

    $(document).on('click', '.remove_attach', function (e) {
      if (e.type == 'click') {
        if (no > 1) {
          $(this).parents('.bb-add').fadeOut();
          $(this).parents('.bb-add').remove();
          no--;
        }
      }
    });

    function disiplinChange(checkbox) {
        if(checkbox.checked == true){
            document.getElementById("wujud_perbuatan").removeAttribute("disabled");
            document.getElementById("kode_etik").removeAttribute("checked", false);
            document.getElementById("kode_etik").removeAttribute("required");
            // document.getElementById("kode_etik").setAttribute("disabled", "disabled");
            console.log(checkbox);
            getValDisiplin()
          }else{
            // document.getElementById("wujud_perbuatan").setAttribute("disabled", "disabled");
            document.getElementById("kode_etik").setAttribute("checked", true);
            document.getElementById("kode_etik").setAttribute("required", "required");
            console.log(checkbox);
            getValKodeEtik()
        }
    }

    function kodeEtikChange(checkbox) {
        if(checkbox.checked == true){
            document.getElementById("wujud_perbuatan").removeAttribute("disabled");
            document.getElementById("disiplin").removeAttribute("checked", false);
            document.getElementById("disiplin").removeAttribute("required");
            // document.getElementById("disiplin").setAttribute("disabled", "disabled");
            getValKodeEtik()
        }else{
            // document.getElementById("wujud_perbuatan").setAttribute("disabled", "disabled");
            document.getElementById("disiplin").setAttribute("checked", true);
            document.getElementById("disiplin").setAttribute("required", "required");
            // document.getElementById("disiplin").removeAttribute("disabled");
            getValDisiplin()
        }
    }

    function getValDisiplin() {
            let kasus_wp = `{{ $storage->violator->violation }}`;
            let list_ketdis = new Array();
            list_ketdis = `Arogansi|Asusila|Balapan liar|Bekerjasama dengan orang lain untuk keuntungan pribadi atau golongan|Berpihak pada perkara yang sedang ditangani|Bertindak sebagai pelindung ditempat perjudian, prostitusi dan tempat hiburan|Bertindak selaku perantara pengusaha untuk mendapat pesanan kantor/ instansi Polri.|Bertindak sewenang wenang terhadap bawahan.|Cerai tanpa ijin pimpinan|Disersi|Hutang|Ingkar janji|Istri lebih dari satu|Judi|KDRT|Kekerasan terhadap masyarakat|Lahgun barang, uang atau surat berharga milik dinas.|Lahgun wewenang.|Laka lantas menimbulkan korban|Lalai dalam tugas|Mabuk|Manipulasi perkara.|Melakukan kegiatan politik praktis.|Melakukan pungutan tidak sah dalam bentuk apapun untuk kepentingan atau golongan.|Melakukan tindakan yang dapat mengakibatkan, menghalangi, atau mempersulitsalah satu pihak yang dilayani.|Melakukan upaya paksa penyidikan yang bukan kewenangannya.|Melanggar prokes|Memakai perhiasan secara berlebihan pada saat berpakaian dinas kepolisian negara RI.|Memasuki tempat yang dapat mencemarkan kehormatan martabat kepolisian.|Membocorkan rahasia kepolisian.|Membuat opini negatif rekan sekerja, pimpinan dan kesatuan.|Memiliki saham/modal dalam perusahaan yang kegiatan usahanaya berada dalam lingkup kekuasaannya.|Memiliki, menjual, membeli, menggadaikan dan menghilangkan dokumen, barang milik dinas.|Mempengaruhi proses penyidikan untuk kepentingan pribadi.|Menelantarkan keluarga.|Mengalihkan rumah dinas kepada yang tidak berhak.|Mengambil paksa|Mengeluarkan tahanan tidak sesuai prosedur|Menggunakan barang bukti untuk kepentingan pribadi.|Menggunakan fasilitas negara untuk kepentingan pribadi.|Menghambat kelancaran tugas dinas Kepolisian|Menghindar tanggungjawab dinas|Mengikuti aliran yang dapat menimbulkan perpecahan atau mengancam persatuan dan kesatuan bangsa|Mengontrakan atau menyewakan rumah dinas|Menguasai barang milik dinas yang bukan peruntukan baginya|Menguasai rumah dinas lebih dari satu|Mengurusi, mensponsori dan mempengaruhi dalam penerimaan anggota Polri|Meninggalkan tugas tanpa ijin pimpinan|Menjadi penagih piutang atau pelindung bagi yang mempunyai hutang|Menjadi perantara/ makelar perkara|Narkoba|Nikah siri|Pelecehan seksual|Pencurian|Pengadaan|Pengancaman|Penganiayaan|Pengelapan|Penimbunan|Penipuan|Penyalahgunaan media sosial|Perbuatan tidak menyenangkan|Perselingkuhan|Pungli|Senpi|Tahanan bunuh diri|Tahanan melarikan diri|Tidak profesional dalam penanganan perkara|Lain-lain`;
            list_ketdis = list_ketdis.split('|');

            let list_id_dis = new Array();
            list_id_dis = `1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|49|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69`;
            list_id_dis = list_id_dis.split('|');

            // let html_wp = `<option value="">PILIH WUJUD PERBUATAN</option>`;
            let html_wp = ``;

            $('#wujud_perbuatan').append(html_wp);
            for (let index = 0; index < list_ketdis.length; index++) {
              is_selected = '';
              const el_ketdis = list_ketdis[index];
              const el_id_dis = list_id_dis[index];
                if (kasus_wp != '' && kasus_wp == el_id_dis) {
                  is_selected = 'selected';
                }
                html_wp += `<option value="`+el_id_dis+`" `+is_selected+`>`+el_ketdis+`</option>`;
              }
              $('#wujud_perbuatan').empty().html(``);
              $('#wujud_perbuatan').append(html_wp);
        }

        function getValKodeEtik() {
            let kasus_wp = `{{ $storage->violator->violation }}`;
            let list_ketke = new Array();
            list_ketke = `Melakukan Pemeriksaan Terhadap Seseorang Dengan Cara Memaksa, Intimidasi Dan Atau Kekerasan Untuk Mendapatkan Pengakuan|Melakukan Penyidikan Yang Bertentangan Dengan Ketentuan Peraturan Perundang-Undangan Karena Adanya Campur Tangan Pihak Lain|Menghambat Kepentingan Pelapor, Terlapor, Dan Pihak Terkait Lainnya Yang Sedang Berperkara Untuk Memperoleh Haknya Dan/Atau Melaksanakan Kewajibannya|Mengurangi, Menambahkan, Merusak, Menghilangan Dan/Atau Merekayasa Barang Bukti|Menghambat Dan Menunda Waktu Penyerahan Barang Bukti Yang Disita Kepada Pihak Yang Berhak/Berwenang Sesuai Dengan Ketentuan Peraturan Perundang-Undangan|Menghambat Dan Menunda Waktu Penyerahan Tersangka Dan Barang Bukti Kepada Jaksa Penuntut Umum|Melakukan Penghentian Atau Membuka Kembali Penyidikan Tindak Pidana Yang Tidak Sesuai Dengan Ketentuan Peraturan Perundang-Undangan|Melakukan Hubungan Atau Pertemuan Secara Langsung Atau Tidak Langsung Di Luar Kepentingan Dinas Dengan Pihak-Pihak Terkait Dengan Perkara Yang Sedang Ditangani Dengan Landasan Itikad Buruk|Melakukan Pemeriksaan Di Luar Kantor Penyidik Kecuali Ditentukan Lain Sesuai Dengan Ketentuan Peraturan Perundang-Undangan|Melakukan Keberpihakan Dalam Menangani Perkara|Memberikan Fakta, Data Dan Informasi Yang Tidak Benar Dan/Atau Segala Sesuatu Yang Belum Pasti Atau Diputuskan|Melakukan Pembahasan Proses Pengadaan Barang/Jasa Dengan Calon Penyedia Barang/Jasa, Kuasa Atau Wakil, Dan/Atau Perusahaan Yang Mempunyai Afiliasi Dengan Calon Penyedia Barang/Jasa Di Luar Kewenangannya Baik Langsung Maupun Tidak Langsung|Menghambat Proses Pemilihan Penyedia Dalam Pengadaan Barang/Jasa|Saling Mempengaruhi Antar Personel Unit Kerja Pengadaan Barang Dan Jasa Dan Pihak Yang Berkepentingan Lainnya, Baik Langsung Maupun Tidak Langsung Yang Mengakibatkan Persaingan Usaha Tidak Sehat|Menerima, Menawarkan Atau Menjanjikan Untuk Memberi Atau Menerima Hadiah, Imbalan, Komisi, Rabat, Atau Berupa Apa Saja Dari Atau Kepada Siapa Pun Yang Diketahui Atau Patut Diduga Berkaitan Dengan Pengadaan Barang/Jasa|Membocorkan Dan Menyebarluaskan Materi Yang Diujikan|Merekayasa Hasil Tes Yang Diujikan|Memberikan Prioritas Atau Fasilitas Khusus Kepada Calon Peserta Didik Tertentu|Meluluskan Calon Pegawai Negeri Pada Polri Atau Calon Peserta Seleksi Pendidikan Pengembangan Tidak Melalui Prosedur|Menyelenggarakan Kursus Atau Pelatihan Materi Yang Diujikan Dalam Seleksi Penerimaan Anggota Polri|Menerima Imbalan Dalam Proses Seleksi Penerimaan Anggota Polri Maupun Pendidikan Pengembangan|Menawarkan Dan/Atau Menjanjikan Kelulusan Kepada Peserta Seleksi Penerimaan Anggota Polri Maupun Pendidikan Pengembangan|Menerbitkan Tanpa Melalui Prosedur Yang Berlaku|Menentukan Biaya Tidak Sesuai Ketentuan|Mempersulit Masyarakat Untuk Memperoleh Surat Yang Dimohonkan|Merekayasa Keterangan Ke Dalam Surat Yang Diterbitkan|Menggunakan Bahan Baku Dan/Atau Material Tidak Sesuai Standar Yang Telah Ditetapkan|Menjual, Memberikan, Menghibahkan, Meminjamkan, Dan/Atau Menyewakan Senjata Api, Amunisi, Bahan Peledak, Barang Bergerak Dan/Atau Barang Tidak Bergerak Milik Polri Atau Yang Diperoleh Secara Tidak Sah Kepada Pihak Lain Secara Ilegal|Menerima Dan Menguasai Secara Tidak Sah Senjata Api, Amunisi, Bahan Peledak, Barang Bergerak Dan/Atau Barang Tidak Bergerak Dari Pihak Lain|Memberi Perintah Yang Bertentangan Dengan Norma Hukum, Norma Agama, Dan Norma Kesusilaan|Menggunakan Kewenangannya Secara Tidak Bertanggung Jawab|Menghalangi Dan/Atau Menghambat Proses Penegakan Hukum Terhadap Bawahannya Yang Dilaksanakan Oleh Fungsi Penegakan Hukum|Melawan Atau Menentang Atasan|Menyampaikan Laporan Yang Tidak Benar Kepada Atasan|Menolak Atau Mengabaikan Permintaan Pertolongan, Bantuan, Atau Laporan Dan Pengaduan Masyarakat Yang Menjadi Lingkup Tugas, Fungsi Dan Kewenangannya|Mencari-Cari Kesalahan Masyarakat|Menyebarluaskan Berita Bohong Dan/Atau Menyampaikan Ketidakpatutan Berita Yang Dapat Meresahkan Masyarakat|Mengeluarkan Ucapan, Isyarat, Dan/Atau Tindakan Dengan Maksud Untuk Mendapatkan Imbalan Atau Keuntungan Pribadi Dalam Memberikan Pelayanan Masyarakat|Bersikap, Berucap, Dan Bertindak Sewenang-Wenang|Mempersulit Masyarakat Yang Membutuhkan Perlindungan, Pengayoman, Dan Pelayanan|Melakukan Perbuatan Yang Dapat Merendahkan Kehormatan Perempuan Pada Saat Melakukan Tindakan Kepolisian|Membebankan Biaya Dalam Memberikan Pelayanan Di Luar Ketentuan Peraturan Perundang-Undangan|Bersikap Diskriminatif Dalam Melayani Masyarakat|Bersikap Tidak Perduli Dan Tidak Sopan Dalam Melayani Pemohon|Menganut Paham Radikal Dan/Atau Eksklusivisme Terhadap Kemajemukan Budaya, Suku, Bahasa, Ras Dan Agama|Mempengaruhi Atau Memaksa Sesama Anggota Polri Untuk Mengikuti Cara Beribadah Di Luar Keyakinannya|Menampilkan Sikap Dan Perilaku Menghujat, Serta Menista Kesatuan, Atasan Dan/Atau Sesama Anggota Polri|Melakukan Perilaku Penyimpangan Seksual Atau Disorientasi Seksual|Melakukan Penyalahgunaan Narkotika, Psikotropika Dan Obat Terlarang Meliputi Menyimpan, Menggunakan, Mengedarkan Dan/Atau Memproduksi Narkotika, Psikotropika Dan Obat Terlarang|Melakukan Perzinaan Dan/Atau Perselingkuhan|Mengunakan Sarana Media Sosial Dan Media Lainnya Untuk Aktivitas Atau Kegiatan Mengunggah, Memposting Dan Menyebarluaskan|Kdrt|Mengikuti Aliran Atau Ajaran Yang Tidak Sah Dan/Atau Tidak Dibenarkan Oleh Peraturan Perundang-Undangan|Menyimpan, Memiliki, Menggunakan, Dan/Atau Memperjualbelikan Barang Bergerak Atau Tidak Bergerak Secara Tidak Sah|Menista Dan/Atau Menghina|Melakukan Tindakan Yang Diskriminatif|Melakukan Tindakan Kekerasan, Berperilaku Kasar Dan Tidak Patut|Lain-lain|Terlibat Dalam Kegiatan Yang Bertujuan Untuk Mengubah, Mengganti Atau Menentang Pancasila Dan Undang- Undang Dasar Negara Republik Indonesia Tahun 1945 Secara Tidak Sah;|Terlibat Dalam Kegiatan Menentang Kebijakan Pemerintah;|Menjadi Anggota Atau Pengurus Organisasi Atau Kelompok Yang Dilarang Pemerintah;|Menjadi Anggota Atau Pengurus Partai Politik;|Menggunakan Hak Memilih Dan Dipilih;|Melibatkan Diri Pada Kegiatan Politik Praktis;|Mendukung, Mengikuti, Atau Menjadi Simpatisan Paham/Aliran Terorisme, Atau Ekstrimisme Berbasis Kekerasan Yang Dapat Mengarah Pada Terorisme|Mendukung, Mengikuti, Atau Menjadi Simpatisan Eksklusivisme Terhadap Kemajemukan Budaya, Suku, Bahasa, Ras Dan Agama.|Melakukan Perbuatan Yang Tidak Sesuai Dengan Ketentuan Peraturan Perundang-Undangan, Dan/Atau Standar Operasional Prosedur|Menyampaikan Dan Menyebarluaskan Informasi Yang Tidak Dapat Dipertangungjawabkan Kebenarannya Tentang Polri Dan/Atau Pribadi Pegawai Negeri Pada Polri|Menghindar Dan/Atau Menolak Perintah Kedinasan Dalam Rangka Pemeriksaan Internal Yang Dilakukan Oleh Fungsi Pengawasan Terkait Dengan Laporan Atau Pengaduan Masyarakat|Menyalahgunakan Kewenangan Dalam Melaksanakan Tugas Kedinasan|Melaksanakan Tugas Tanpa Perintah Kedinasan Dari Pejabat Yang Berwenang, Kecuali Ditentukan Lain Dalam Ketentuan Peraturan Perundang-Undangan|Melakukan Permufakatan Pelanggaran Kepp Atau Disiplin Atau Tindak Pidana|Mengabaikan Kepentingan Pelapor, Terlapor, Atau Pihak Lain Yang Terkait Dalam Perkara Yang Bertentangan Dengan Ketentuan Peraturan Perundang-Undangan|Menempatkan Tersangka Di Tempat Bukan Rumah Tahanan Negara/Polri Dan Tidak Memberitahukan Kepada Keluarga Atau Kuasa Hukum Tersangka|Merekayasa Dan Memanipulasi Perkara Yang Menjadi Tanggung Jawabnya Dalam Rangka Penegakan Hukum|Mengeluarkan Tahanan Tanpa Perintah Tertulis Dari Penyidik, Atasan Penyidik Atau Penuntut Umum, Atau Hakim Yang Berwenang`;
            list_ketke = list_ketke.split('|');

            let list_id_ke = new Array();
            list_id_ke = `88|89|90|91|92|93|94|95|96|97|98|99|100|101|102|103|104|105|106|107|108|109|110|111|112|113|114|115|116|117|118|119|120|121|122|123|124|125|126|127|128|129|130|131|132|133|134|135|136|137|138|139|140|141|142|143|144|145|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|86|87`;
            list_id_ke = list_id_ke.split('|');

            let html_wp = ``;
            for (let index = 0; index < list_ketke.length; index++) {
                let is_selected = '';
                const el_ketke = list_ketke[index];
                const el_id_ke = list_id_ke[index];
                if (kasus_wp != '' && kasus_wp == el_id_ke) {
                    is_selected = 'selected';
                }
                html_wp += `<option value="`+el_id_ke+`" `+is_selected+`>`+el_ketke+`</option>`;
            }

            $('#wujud_perbuatan').empty().html(``);
            $('#wujud_perbuatan').append(html_wp);
        }
    </script>
@endpush
