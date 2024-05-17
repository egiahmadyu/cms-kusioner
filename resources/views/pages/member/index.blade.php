@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">List Anggota</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#createModal">Tambah Anggota</button>
                  </div>
                  <div class="table-responsive">
                  <table id="zero-config" class="display datatables-members" style="width:100%">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>NRP</th>
                          <th>Pangkat</th>
                          <th>Jabatan</th>
                          <th>Departemen</th>
                          <th class="no-content">Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
  
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form_tambah" class="needs-validation" novalidate>
          @csrf
          @method('POST')

          <div class="row mb-3">
              <div class="col-sm-12">
                  <label class="form-control-label">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" required>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-sm-12">
                  <label class="form-control-label">NRP</label>
                  <input type="text" class="form-control" id="nrp" placeholder="NRP" name="nrp" required>
              </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
                <label class="form-control-label">Pangkat</label>
                <select class="form-control" id="pangkat" name="pangkat">
                    @foreach ($pangkat as $value)
                        <option value="{{$value->id}}">{{$value->nama_pangkat}}</option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
                <label class="form-control-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
                <label class="form-control-label">Divisi</label>
                <input type="text" class="form-control" id="departemen" placeholder="Divisi" name="departemen" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this member?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmDelete" onclick="confirmDelete()">Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')
  <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
  <script src="{{asset('js/master.js')}}"></script>
  <script src="{{asset('js/member/index.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('#pangkat').select2({
        theme: 'bootstrap-5',
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      });
    });
  </script>
@endpush