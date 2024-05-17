@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lokasi Penyimpanan</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <a href="{{ route('lokasi.create') }}" type="button" class="btn btn-primary">Tambah Lokasi</a>
                  </div>
                  <div class="table-responsive">
                    <table id="zero-config" class="display datatables-locations" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nomor SK</th>
                          <th>Jenis</th>
                          <th>Lokasi Penyimpanan</th>
                          <th>Tanggal</th>
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
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure to delete this location?
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
  <script src="{{asset('js/lokasi/index.js')}}"></script>
@endpush