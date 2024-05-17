@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Buat User</h5>
            <div class="row">
              {{-- {{ Form::open(array('route' => 'user.store', 'method' => 'post')) }} --}}
              <form id="form_tambah" class="row">
              {{-- {{ Form::open(array('id' => 'form_tambah')) }} --}}
                  <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Username: <span
                              class="tx-danger">*</span></label> <input
                          class="form-control" id="username" name="username"
                          placeholder="Nama Pelapor" required="" type="text">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label">Nama: <span
                              class="tx-danger">*</span></label> <input
                          class="form-control" id="name" name="name"
                          placeholder="Nama" required="" type="text">
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3">
                      <label class="form-control-label" for="roleInput">Role: <span
                              class="tx-danger">*</span></label> 
                          <select id="mainRole" name="mainRole" class="form-control">
                              <option value="" selected>...</option>
                              @foreach($roles as $item)
                                  <option value="{{$item->name}}">{{$item->name}}</option>
                              @endforeach
                          </select>                                
                  </div>
                  
                  <div class="col-md-6 col-lg-6 mb-3" id="poldaWilayah" >
                      <label class="form-control-label" for="poldaWilayah">Wilayah: </label> 
                      <select name="poldaWilayah" class="form-control">
                          <option value="" selected>...</option>
                          @foreach($poldas as $item)
                          @if ($item->nama_polda != 'DIVPROPAM')
                              <option value="{{$item->nama_polda}}">{{$item->nama_polda}}</option>
                          @endif      
                          @endforeach
                      </select>
                  </div>
                  <div class="col-md-6 col-lg-6 mb-3" id="mabesRole">
                      <label class="form-control-label" for="mabesRole">Divisi: </label> 
                      <select  name="mabesRole" class="form-control">
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
                  <div class="col-md-6 col-lg-6 mb-3" id="poldaRole">
                      <label class="form-control-label" for="poldaRole">Divisi: </label> 
                      <select  name="poldaRole" class="form-control">
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
                  <div class="col-md-12 col-lg-12 mg-t-20 mg-md-t-0">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{asset('js/user/create.js')}}"></script>
@endpush
