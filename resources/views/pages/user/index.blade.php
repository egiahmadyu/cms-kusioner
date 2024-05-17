@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">List User</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <a href="/user/create"><button type="button" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah User</button></a>
                  </div>
                  <div class="table-responsive">
                    <table id="zero-config" class="display datatables-users" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Wilayah</th>
                            <th>Divisi</th>
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure to delete this user?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="confirmDelete" onclick="confirmDelete()">Delete</button>
          </div>
        </div>
      </div>
    </div>

    {{-- Offcanvas Create --}}
    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCreate" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCreate">Tambah User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <form action="" id="form_tambah" class="needs-validation" novalidate>
          @csrf
          @method('POST')

          <div class="row mb-4">
              <div class="col-sm-12">
                  <label class="form-control-label">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
              </div>
          </div>

          <div class="row mb-4">
              <div class="col-sm-12">
                  <label class="form-control-label">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" required>
              </div>
          </div>

          <div class="row mb-4">
            <div class="col-sm-12">
                <label class="form-control-label">Role</label>
                <select id="mainRole" name="mainRole" class="form-control">
                  <option value="" selected>...</option>
                  @foreach($roles as $item)
                      <option value="{{$item->name}}">{{$item->name}}</option>
                  @endforeach
              </select>  
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-sm-12">
                <label class="form-control-label">Role</label>
                <select id="poldaWilayah" name="poldaWilayah" class="form-control">
                  <option value="" selected>...</option>
                      @foreach($poldas as $item)
                        @if ($item->nama_polda != 'DIVPROPAM')
                          <option value="{{$item->nama_polda}}">{{$item->nama_polda}}</option>
                        @endif      
                      @endforeach
              </select>  
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-sm-12">
                <select id="mabesRole" name="mabesRole" class="form-control">
                  <option value="" selected>...</option>
                  <option value="Kadiv">Kadiv</option>
                  <option value="Karo Paminal">Karo Paminal</option>
                  <option value="Karo Wabprof">Karo Wabprof</option>
                  <option value="Karo Provos">Karo Provos</option>
                  <option value="PFPBB">PFPBB</option>
                  <option value="Pemegang Kunci Brankas">Pemegang Kunci Brankas</option>
                  <option value="Petugas Jaga">Petugas Jaga</option>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-sm-12">
              <select id="poldaRole" name="poldaRole" class="form-control">
                <option value="" selected>...</option>
                <option value="Kabid Propam">Kabid Propam</option>
                <option value="Kasub bid Paminal">Kasub bid Paminal</option>
                <option value="Kasub bid Wabprof">Kasub bid Wabprof</option>
                <option value="Kasub bid Provos">Kasub bid Provos</option>
                <option value="PFPBB">PFPBB</option>
                <option value="Pemegang Kunci Brankas">Pemegang Kunci Brankas</option>
                <option value="Petugas Jaga">Petugas Jaga</option>
            </select>
            </div>
          </div>
          

          <div class="offcanvas-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div> --}}
@endsection

@push('script')
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{asset('js/master.js')}}"></script>
    <script src="{{asset('js/user/index.js')}}"></script>

    {{-- <script>
      $(function(t){$("#basic-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable").DataTable({language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});var e=$("#file-datatable").DataTable({buttons:["copy","excel","pdf","colvis"],language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});e.buttons().container().appendTo("#file-datatable_wrapper .col-md-6:eq(0)");var e=$("#delete-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}});$("#delete-datatable tbody").on("click","tr",function(){$(this).hasClass("selected")?$(this).removeClass("selected"):(e.$("tr.selected").removeClass("selected"),$(this).addClass("selected"))}),$("#button").click(function(){e.row(".selected").remove().draw(!1)}),$("#example2").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:"",lengthMenu:"_MENU_ items/page"}}),$("#example3").DataTable({responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(l){var a=l.data();return"Details for "+a[0]+" "+a[1]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table"})}}}),$(".select2").select2({placeholder:"Choose one",searchInputPlaceholder:"Search"})});
    </script> --}}
@endpush
