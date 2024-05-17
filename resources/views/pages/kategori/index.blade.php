@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">

    <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Kategori</h5>
                  <div class="d-flex flex-row-reverse mb-2 px-0">
                    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#createModal">Tambah Kategori</button>
                  </div>
                  <div class="table-responsive">    
                    <table id="zero-config" class="display datatables-categories" style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
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


  <!-- Create Modal -->
  <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="form_tambah" class="needs-validation" novalidate>
            @csrf
            @method('POST')
  
            <div class="row mb-4">
                <div class="col-sm-12">
                    <label class="form-control-label">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis">
                      @foreach ($kategori as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                  </select>
                </div>
            </div>
  
            <div class="row mb-4">
                <div class="col-sm-12">
                    <label class="form-control-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama Kategori" name="name" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="form_edit" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
  
            <div class="row mb-4">
                <div class="col-sm-12">
                    <label class="form-control-label">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis">
                      @foreach ($kategori as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                  </select>
                </div>
            </div>
  
            <div class="row mb-4">
                <div class="col-sm-12">
                    <label class="form-control-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama Kategori" name="name" required>
                </div>
            </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
              Are you sure to delete this category?
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
  {{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
  <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
  <script src="{{asset('js/master.js')}}"></script>
  <script src="{{asset('js/kategori/index.js')}}"></script>
@endpush