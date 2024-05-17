@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit User #{{ $user->username }}</h5>
                  <div class="row">
                    {{-- {{ Form::open(array('route' => 'user.edit', 'method' => 'put')) }} --}}
                    <form id="form_edit">
                        <input id="id" name="id" placeholder="{{$user->id}}" required="" type="text" value="{{$user->id}}" hidden>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Username: </label> <input
                                class="form-control" id="nama_pelapor" name="username"
                                placeholder="{{$user->username}}" required="" type="text" value="{{$user->username}}">
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label">Nama: </label> <input
                                class="form-control" id="name" name="name"
                                placeholder="{{$user->name}}" required="" type="text" value="{{$user->name}}">
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label class="form-control-label" for="mainRole">Role: </label>
                                <select id="mainRole" name="mainRole" class="form-control">
                                    <option value="{{$user->roles->first()->name}}" selected>{{$user->roles->first()->name}}</option>
                                    @foreach($roles as $item)
                                        @if(($item->name) != ($user->roles->first()->name))
                                          <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <select id="poldaWilayah" name="poldaWilayah" class="form-control">
                                <option value="{{$user->polda}}" selected>{{$user->polda}}</option>
                                @foreach($poldas as $item)
                                    @if ($item->nama_polda != 'DIVPROPAM')
                                        @if ($item->nama_polda != $user->polda)
                                            <option value="{{$item->nama_polda}}">{{$item->nama_polda}}</option>
                                        @endif                                        
                                    @endif      
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <select id="mabesRole" name="mabesRole" class="form-control">
                                @if ($user->roles->first()->name == 'mabes')
                                    <option value="{{$user->division}}" selected>{{$user->division}}</option>
                                @else
                                    <option value="" selected>...</option>
                                @endif
                                <option value="Kadiv">Kadiv</option>
                                <option value="Karo Paminal">Karo Paminal</option>
                                <option value="Karo Wabprof">Karo Wabprof</option>
                                <option value="Karo Provos">Karo Provos</option>
                                <option value="PFPBB">PFPBB</option>
                                <option value="Pemegang Kunci Brankas">Pemegang Kunci Brankas</option>
                                <option value="Petugas Jaga">Petugas Jaga</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <select id="poldaRole" name="poldaRole" class="form-control">
                                @if ($user->roles->first()->name == 'polda')
                                    <option value="{{$user->division}} selected">{{$user->division}}</option>
                                @else
                                    <option value="" selected>...</option>
                                @endif
                                <option value="Kabid Propam">Kabid Propam</option>
                                <option value="Kasub bid Paminal">Kasub bid Paminal</option>
                                <option value="Kasub bid Wabprof">Kasub bid Wabprof</option>
                                <option value="Kasub bid Provos">Kasub bid Provos</option>
                                <option value="PFPBB">PFPBB</option>
                                <option value="Pemegang Kunci Brankas">Pemegang Kunci Brankas</option>
                                <option value="Petugas Jaga">Petugas Jaga</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-6 mg-t-20 mg-md-t-0 mt-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
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
    <script src="{{asset('js/user/edit.js')}}"></script>
@endpush
