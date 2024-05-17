@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Anggota</h5>
                  <div class="row">
                    {{-- {{ Form::open(array('route' => 'user.edit', 'method' => 'put')) }} --}}
                    <form id="form_edit" class="row">

                        <input id="id" name="id" placeholder="{{$member->id}}" required="" type="text" value="{{$member->id}}" hidden>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Nama: </label> <input
                                class="form-control" id="nama" name="nama"
                                placeholder="{{$member->name}}" required="" type="text" value="{{$member->name}}">
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">NRP: </label> <input
                                class="form-control" id="nrp" name="nrp"
                                placeholder="{{$member->nrp}}" required="" type="text" value="{{$member->nrp}}">
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label" for="pangkat">Pangkat: </label>
                                <select id="pangkat" name="pangkat" class="form-control">
                                    <option value="{{$member->pangkat_id}}" selected>{{$member->pangkat->nama_pangkat}}</option>
                                    @foreach($pangkat as $item)
                                        @if(($item->nama_pangkat) != ($member->pangkat->nama_pangkat))
                                          <option value="{{$item->id}}">{{$item->nama_pangkat}}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Jabatan: </label> <input
                                class="form-control" id="jabatan" name="jabatan"
                                placeholder="{{$member->position}}" required="" type="text" value="{{$member->position}}">
                        </div>

                        <div class="col-md-6 col-lg-6 mb-3">
                          <label class="form-control-label">Departemen: </label> <input
                              class="form-control" id="departemen" name="departemen"
                              placeholder="{{$member->department}}" required="" type="text" value="{{$member->department}}">
                      </div>

                        <div class="col-md-12 col-lg-12 mt-3">
                          <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                    {{-- {{ Form::close() }} --}}
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@push('script')
    <script src="{{asset('js/master.js')}}"></script>
    <script src="{{asset('js/member/edit.js')}}"></script>
@endpush
