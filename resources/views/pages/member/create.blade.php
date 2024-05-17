@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Anggota</h5>
                    <form id="form_tambah" class="row">
                        <div class="col-md-6 col-lg-6">
                            <label class="form-control-label">Nama: <span
                                    class="tx-danger">*</span></label> <input
                                class="form-control" id="nama" name="nama"
                                placeholder="Nama Anggota" required="" type="text">
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">NRP: <span
                                    class="tx-danger">*</span></label> <input
                                class="form-control" id="nrp" name="nrp"
                                placeholder="NRP" required="" type="text">
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Pangkat: <span class="tx-danger">*</span></label> 
                            <select class="form-control" id="pangkat" name="pangkat">
                                <option value="" selected>...</option>
                                @foreach ($pangkat as $item)
                                    <option value="{{$item->id}}">{{$item->nama_pangkat}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Jabatan: <span
                                    class="tx-danger">*</span></label> <input
                                class="form-control" id="jabatan" name="jabatan"
                                placeholder="Jabatan" required="" type="text">
                        </div>
                        
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Departemen: <span
                                    class="tx-danger">*</span></label> <input
                                class="form-control" id="departemen" name="departemen"
                                placeholder="Departemen" required="" type="text">
                        </div>

                        <div class="col-md-12 col-lg-12 mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{asset('js/member/create.js')}}"></script>
@endpush
