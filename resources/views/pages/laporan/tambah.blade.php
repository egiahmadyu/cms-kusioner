@extends('layout.master')
@section('content')
<div class="page-header main-container container-fluid px-5">
    <h4 class="page-title">Laporan</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</div>

<div class="main-container container-fluid">
     <!-- START ROW-4 -->
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="card-title">
                        Tambah Laporan
                    </div>
                </div>
                <div class="card-body">
                    <div id="wizard2">
                        <h3>Informasi Pelapor</h3>
                        <div>
                            <div class="row ">
                                <div class="col-md-5 col-lg-4">
                                    <label class="form-control-label">Nama Pelapor: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="nama_pelapor" name="nama_pelapor"
                                        placeholder="Nama Pelapor" required="" type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
                                    <label class="form-control-label">NIK: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="nik" name="nik"
                                        placeholder="NIK" required="" type="text">
                                </div>

                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
                                    <label class="form-control-label">No. Handphone: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="no_hp" name="no_hp"
                                        placeholder="62xx" required="" type="text">
                                </div>

                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Tempat Lahir: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="tempat_lahir" name="tempat_lahir"
                                         type="text">
                                </div>

                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Tanggal Lahir: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                         type="date">
                                </div>

                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Pekerjaan: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="pekerjaan" name="pekerjaan"
                                         type="text">
                                </div>

                                <div class="col-md-5 col-lg-6 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Jenis Kelamin: <span
                                            class="tx-danger">*</span></label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                </div>
                                <div class="col-md-5 col-lg-6 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Agama: <span
                                            class="tx-danger">*</span></label>
                                            <select id="agama_id" name="agama_id" class="form-control">
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                </div>

                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                                </div>


                            </div>
                        </div>
                        <h3>Detail Laporan</h3>
                        <div>
                            <div class="row">
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Jenis Laporan:</label>
                                    <select id="jenis_lapor_id" name="jenis_lapor_id" class="form-control">
                                       @foreach ($jenis_laporan as $value)
                                       <option value="{{$value->id}}">{{$value->nama_jenis_laporan}}</option>

                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Cara Lapor:</label>
                                    <select id="cara_lapor_id" name="cara_lapor" class="form-control">
                                       @foreach ($cara_lapor as $value)
                                       <option value="{{$value->id}}">{{$value->nama_cara_lapor}}</option>

                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Kategori:</label>
                                    <select id="kategori_id" name="kategori_id" class="form-control">
                                       @foreach ($kategori_laporan as $value)
                                       <option value="{{$value->id}}">{{$value->nama_kategori_lapor}}</option>

                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Sumber Laporan:</label>
                                    <select id="sumber_lapor" name="sumber_lapor" class="form-control">
                                       @foreach ($sumber_lapor as $value)
                                       <option value="{{$value->id}}">{{$value->nama_sumber_laporan}}</option>

                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">No. Surat: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="no_surat" name="no_surat"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">No. Agenda: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="no_agenda" name="no_agenda"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">No. Renmin: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="no_renmin" name="no_renmin"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">No. SPSP2: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="no_spsp2" name="no_spsp2"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label for="exampleFormControlTextarea1">Perihal</label>
                                    <textarea class="form-control" id="perihal" rows="3" name="perihal"></textarea>
                                </div>
                            </div>
                            <h3>Data Terlapor</h3>
                            <div class="row">
                                <div class="col-md-5 col-lg-3 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Nama: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="nama_terlapor" name="nama_terlapor"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-2 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Pangkat:</label>
                                    <select class="form-control select2-show-search form-select" data-placeholder="Pilih Pangkat" name="pangkat_id" id="pangkat_id">
                                        @foreach ($pangkat as $value)
                                        <option value="{{$value->id}}">{{$value->nama_pangkat}}</option>

                                        @endforeach
                                        </select>
                                </div>
                                <div class="col-md-5 col-lg-3 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Polda:</label>
                                    <select class="form-control select2-show-search form-select" data-placeholder="Pilih Pangkat" name="polda_id" id="polda_idss">
                                        @foreach ($polda as $value)
                                        <option value="{{$value->id}}">{{$value->nama_polda}}</option>

                                        @endforeach
                                        </select>
                                </div>
                                <div class="col-md-5 col-lg-3 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Satuan Kerja: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="satuan_kerja" name="satuan_kerja"
                                         type="text">
                                </div>
                            </div>
                            <div id="div_tambah"></div>
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <button class="btn btn-outline-primary w-100">Tambah Terlapor</button>
                                </div>
                            </div>
                            <h3 class="mt-2">Detail Kejadian</h3>
                            <div class="row">
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Harapan Pelapor: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="harapan" name="harapan"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Tempat Kejadian: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="tempat_kejadian" name="tempat_kejadian"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Tanggal Kejadian: <span
                                            class="tx-danger">*</span></label> <input
                                        class="form-control" id="tanggal_kejadian" name="tanggal_kejadian"
                                         type="text">
                                </div>
                                <div class="col-md-5 col-lg-12 mg-t-20 mg-md-t-0 mt-3">
                                    <label class="form-control-label">Kronologi: <span
                                            class="tx-danger">*</span></label>
                                            <textarea class="form-control" id="kronologi" rows="12" name="kronologi"></textarea>
                                </div>
                            </div>

                        </div>
                        <h3>Payment Details</h3>
                        <div>
                            <div class="form-group">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" id="name11"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Card number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-text btn btn-info shadow-none mb-0">
                                        <i class="fa fa-cc-visa"></i> &nbsp; <i
                                            class="fa fa-cc-amex"></i> &nbsp;
                                        <i class="fa fa-cc-mastercard"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group mb-sm-0">
                                        <label class="form-label">Expiration</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="MM"
                                                name="expiremonth">
                                            <input type="number" class="form-control" placeholder="YY"
                                                name="expireyear">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group mb-0">
                                        <label class="form-label">CVV <i
                                                class="fa fa-question-circle"></i></label>
                                        <input type="number" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- END ROW-4 -->
</div>

@endsection

@push('script')
<script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
<script src="{{ asset('assets/plugins/formwizard/fromwizard.js')}}"></script>

<script src="{{ asset('assets/plugins/accordion-Wizard-Form/accordion-Wizard-Form.js')}}"></script>
<script src="{{ asset('assets/js/form-wizard.js')}}"></script>

@endpush
