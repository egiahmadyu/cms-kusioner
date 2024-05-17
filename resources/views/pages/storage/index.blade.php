@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Penyimpanan</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <a href="{{ route('penyimpanan.create') }}" type="button" class="btn btn-primary"  data-bs-target="#createModal">Tambah Penyimpanan</a>
                  </div>
                  <div class="table-responsive">
                    <table id="zero-config" class="display datatables-storages" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Laporan</th>
                            <th>Pelanggar</th>
                            <th>Barang Bukti</th>
                            <th>Status</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Approve Draft</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{-- <form class="need-validation forms-approved" novalidate> --}}
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12 col-lg-12 mg-t-20 mg-md-t-0">
                  <label class="form-control-label">Password: <span
                          class="tx-danger">*</span></label> <input
                      class="form-control" id="password" name="password"
                      placeholder="Password" required="" type="password">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="confirmApprove" onclick="approveConfirm()">Approve</button>
          </div>
          
            {{-- </form> --}}
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
            Are you sure to delete this data?
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
    <script src="{{asset('js/penyimpanan/index.js')}}"></script>

    {{-- <script>
      $(function(t){$("#basic-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable").DataTable({language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});var e=$("#file-datatable").DataTable({buttons:["copy","excel","pdf","colvis"],language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});e.buttons().container().appendTo("#file-datatable_wrapper .col-md-6:eq(0)");var e=$("#delete-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}});$("#delete-datatable tbody").on("click","tr",function(){$(this).hasClass("selected")?$(this).removeClass("selected"):(e.$("tr.selected").removeClass("selected"),$(this).addClass("selected"))}),$("#button").click(function(){e.row(".selected").remove().draw(!1)}),$("#example2").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:"",lengthMenu:"_MENU_ items/page"}}),$("#example3").DataTable({responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(l){var a=l.data();return"Details for "+a[0]+" "+a[1]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table"})}}}),$(".select2").select2({placeholder:"Choose one",searchInputPlaceholder:"Search"})});
    </script> --}}
@endpush
