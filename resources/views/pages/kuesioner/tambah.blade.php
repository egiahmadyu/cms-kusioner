@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Kuesioner</h5>
                    <form id="form_tambah" class="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-12 mb-3">
                                <label class="form-control-label">Pertanyaan: <span
                                        class="tx-danger">*</span></label> <input
                                    class="form-control" id="question" name="question"
                                    required="" type="text">
                            </div>
                            <div class="col-md-12 col-lg-12 mb-3">
                                <label class="form-control-label">Pertanyaan Sebelumnya: <span class="tx-danger">*</span></label> 
                                <select class="form-control" id="before_question" name="before_question">
                                    <option value="" selected>...</option>
                                    @foreach ($question as $item)
                                        <option value="{{$item->id}}">{{$item->question}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-lg-7">
                                <label class="form-control-label">Jawaban: <span class="tx-danger">*</span></label> 
                               <div class="row">
                                <div class="col-lg-8">
                                    <input
                                    class="form-control" id="choice" name="choice[]"
                                     required="" type="text">
                                </div>
                                {{-- <div class="col-lg-2">
                                    <button type="button" class="btn btn-danger" id="hapus_choice" onclick="hapus_pilihan(${i})">Hapus</button>
                                </div> --}}
                               </div>
                            </div>
                        </div>
                        <div id="row_choice"></div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 mt-4">
                                <button type="button" class="btn btn-primary" id="tambah_choice" onclick="tambah_pilihan()">Tambah Jawaban</button>
                            </div>
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
    <script>
        var i = 1;
        function tambah_pilihan() {
            var html = ` <div class="row row-${i} mb-3">
                            <div class="col-md-6 col-lg-7">
                                <label class="form-control-label">Jawaban: <span class="tx-danger">*</span></label> 
                                <div class="row">
                                    <div class="col-lg-8">
                                    <input
                                    class="form-control" id="choice" name="choice[]"
                                     required="" type="text">
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-danger" id="hapus_choice" onclick="hapus_pilihan(${i})">Hapus</button>
                                </div>
                                </div>
                            </div>
                            
                        </div>`;

        i++;
        $('#row_choice').append(html);
        }

        function hapus_pilihan(i) {
            $(`.row-${i}`).remove();
        }
       
    </script>
    <script src="{{asset('js/kuesioner/tambah.js')}}"></script>
@endpush
