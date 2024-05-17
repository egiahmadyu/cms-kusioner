@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">QR Code</h5>
            <div class="container text-center">
              <div class="row">
                  <div class="col-md-4">
                      <p class="mb-0">Simple</p>
                      <a href="" id="container" >{!! $simple !!}</a><br/>
                      <button id="download" class="mt-2 btn btn-info" onclick="downloadSVG()">Download SVG</button>
                  </div>
                  <div class="col-md-4">
                      <p class="mb-0">Color Change</p>
                      {!! $changeColor !!}
                  </div>
                  <div class="col-md-4">
                      <p class="mb-0">Background Color Change </p>
                      {!! $changeBgColor !!}
                  </div>


                  <div class="col-md-4">
                      <p class="mb-0">Style Square</p>
                      {!! $styleSquare !!}
                  </div>
                  <div class="col-md-4">
                      <p class="mb-0">Style Dot</p>
                      {!! $styleDot !!}
                  </div>
                  <div class="col-md-4">
                      <p class="mb-0">Style Round</p>
                      {!! $styleRound !!}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  function downloadSVG() {
    const svg = document.getElementById('container').innerHTML;
    const blob = new Blob([svg.toString()]);
    const element = document.createElement("a");
    element.download = "w3c.svg";
    element.href = window.URL.createObjectURL(blob);
    element.click();
    element.remove();
  }
  </script>
@endsection

@push('script')

@endpush
