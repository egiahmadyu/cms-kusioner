@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">List Kuesioner</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <a href="/kuesioner/tambah"><button type="button" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Kuesioner</button></a>
                  </div>
                  <div class="table-responsive">
                    <table id="zero" class="display datatables-users" style="width:100%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban </th>
                            <th class="no-content">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($question as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->choice }}</td>
                                <td>
                                    <a href="/kuesioner/edit/{{ $item->id }}"><button type="button" class="btn btn-primary"><i class="bi bi-plus"></i> Edit Kuesioner</button></a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
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
@endsection

@push('script')
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{asset('js/master.js')}}"></script>
    {{-- <script src="{{asset('js/user/index.js')}}"></script> --}}
    <script>
        $(document).ready(function(){
            $('#zero').DataTable();
        });
    </script>

    {{-- <script>
      $(function(t){$("#basic-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable").DataTable({language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});var e=$("#file-datatable").DataTable({buttons:["copy","excel","pdf","colvis"],language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});e.buttons().container().appendTo("#file-datatable_wrapper .col-md-6:eq(0)");var e=$("#delete-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}});$("#delete-datatable tbody").on("click","tr",function(){$(this).hasClass("selected")?$(this).removeClass("selected"):(e.$("tr.selected").removeClass("selected"),$(this).addClass("selected"))}),$("#button").click(function(){e.row(".selected").remove().draw(!1)}),$("#example2").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:"",lengthMenu:"_MENU_ items/page"}}),$("#example3").DataTable({responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(l){var a=l.data();return"Details for "+a[0]+" "+a[1]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table"})}}}),$(".select2").select2({placeholder:"Choose one",searchInputPlaceholder:"Search"})});
    </script> --}}
@endpush
