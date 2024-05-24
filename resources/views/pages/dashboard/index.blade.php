@extends('layout.master')
@section('content')
<div class="page-content">
  <div class="main-wrapper">
    <div class="row">
      <div class="col-md-6 col-xl-3">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Sangat Puas</h5>
                  <h2>{{ $sangat_puas }}</h2>
                  <p>Tahun {{ date('Y') }}</p>
                  <div class="progress">
                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: {{ $total_kuesioner ? ($sangat_puas / $total_kuesioner) * 100 : 0 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Puas</h5>
                  <h2>{{ $puas }}</h2>
                  <p>Tahun {{ date('Y') }}</p>
                  <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: {{ $total_kuesioner ? ($puas / $total_kuesioner) * 100 : 0 }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Tidak Puas</h5>
                  <h2>{{ $tidak_puas }}</h2>
                  <p>Tahun {{ date('Y') }}</p>
                  <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: {{ $total_kuesioner ? ($tidak_puas / $total_kuesioner) * 100 : 0 }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Total</h5>
                  <h2>{{ $total_kuesioner }}</h2>
                  <p>Tahun {{ date('Y') }}</p>
                  <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: {{ $total_kuesioner ? 100: 0 }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xl-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <div id="apex1"></div>
            </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card stat-widget">
          <div class="card-body">
              <h5 class="card-title">5 Orang Terakhir yang Melakukan Survey</h5>
             
              @foreach ($last_customer as $customer)
              <div class="transactions-list">
                <div class="tr-item">
                  <div class="tr-company-name">
                    <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                      <i data-feather="twitch"></i>
                    </div>
                    <div class="tr-text">
                      <h4>{{ $customer->customer->nama }} ({{ $customer->customer->no_hp }})</h4>
                      <p>{{ $customer->count }}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              
          </div>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-8">
          <div class="card table-widget">
              <div class="card-body">
                  <h5 class="card-title">Recent Orders</h5>
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe</th>
                        <td>Modern</td>
                        <td>#53327</td>
                        <td>$20</td>
                        <td><span class="badge bg-info">Shipped</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe</th>
                        <td>Alpha</td>
                        <td>#13328</td>
                        <td>$25</td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe</th>
                        <td>Lime</td>
                        <td>#35313</td>
                        <td>$20</td>
                        <td><span class="badge bg-danger">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe</th>
                        <td>Circl Admin</td>
                        <td>#73423</td>
                        <td>$23</td>
                        <td><span class="badge bg-primary">Shipped</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Nina Doe</th>
                        <td>Space</td>
                        <td>#54773</td>
                        <td>$20</td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
      
      <div class="col-md-12 col-lg-4">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <div id="apex2"></div>
            </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Tasks Overview</h5>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                        <i data-feather="user"></i>
                      </div>
                      <div class="tr-text">
                        <a href="#"><h4>Project Managment</h4></a>
                        <p>Management</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                        <i data-feather="user"></i>
                      </div>
                      <div class="tr-text">
                        <a href="#"><h4>Design</h4></a>
                        <p>Creative</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-secondary">
                        <i data-feather="user"></i>
                      </div>
                      <div class="tr-text">
                        <a href="#"><h4>Financial Accounting</h4></a>
                        <p>Finance</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                        <i data-feather="user"></i>
                      </div>
                      <div class="tr-text">
                        <a href="#"><h4>Testing</h4></a>
                        <p>Manager</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-secondary text-secondary">
                        <i data-feather="user"></i>
                      </div>
                      <div class="tr-text">
                        <a href="#"><h4>Development</h4></a>
                        <p>Developers</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-4">
        <div class="card">
          <img src="../../assets/images/card-bg.png" class="card-img-top" alt="...">
          <div class="card-body">
            <div class="card-meet-header">
              <div class="card-meet-day">
                <h6>WED</h6>
                <h3>7</h3>
              </div>
              <div class="card-meet-text">
                <h6>Developer AMA</h6>
                <p>Meet project developers</p>
              </div>
            </div>
            <p class="card-text m-b-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <a href="#" class="btn btn-info">Join</a>
            <a href="#" class="btn btn-primary">Invite</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Transactions</h5>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                        <i data-feather="thumbs-up"></i>
                      </div>
                      <div class="tr-text">
                        <h4>Facebook</h4>
                        <p>02 March</p>
                      </div>
                    </div>
                    <div class="tr-rate">
                      <p><span class="text-success">+ $24</span></p>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-success text-success">
                        <i data-feather="credit-card"></i>
                      </div>
                      <div class="tr-text">
                        <h4>Visa</h4>
                        <p>02 March</p>
                      </div>
                    </div>
                    <div class="tr-rate">
                      <p><span class="text-success">+ $300</span></p>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-danger text-danger">
                        <i data-feather="tv"></i>
                      </div>
                      <div class="tr-text">
                        <h4>Netflix</h4>
                        <p>02 March</p>
                      </div>
                    </div>
                    <div class="tr-rate">
                      <p><span class="text-danger">- $17</span></p>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-warning text-warning">
                        <i data-feather="shopping-cart"></i>
                      </div>
                      <div class="tr-text">
                        <h4>Themeforest</h4>
                        <p>02 March</p>
                      </div>
                    </div>
                    <div class="tr-rate">
                      <p><span class="text-danger">- $220</span></p>
                    </div>
                  </div>
                </div>
                <div class="transactions-list">
                  <div class="tr-item">
                    <div class="tr-company-name">
                      <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                        <i data-feather="dollar-sign"></i>
                      </div>
                      <div class="tr-text">
                        <h4>PayPal</h4>
                        <p>02 March</p>
                      </div>
                    </div>
                    <div class="tr-rate">
                      <p><span class="text-success">+20%</span></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection

@push('script')
    {{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
    <script>
      $(document).ready(function () {
        var sangat_puas = {!! json_encode($sangat_puas_chart) !!};
        var puas = {!! json_encode($puas_chart) !!};
        var tidak_puas = {!! json_encode($tidak_puas_chart) !!};
        var month = {!! json_encode($months) !!};
        console.log(Object.values(sangat_puas))
          var options1 = {
              chart: {
                  height: 350,
                  type: 'area',
                  toolbar: {
                      show: false,
                  }
              },
              dataLabels: {
                  enabled: false
              },
              stroke: {
                  curve: 'smooth'
              },
              colors: ['#90e0db','#b3baff','#eb4982'],
              series: [{
                  name: 'Sangat Puas',
                  data: Object.values(sangat_puas)
              },
              {
                  name: 'Puas',
                  data: Object.values(puas)
              },
              {
                  name: 'Tidak Puas',
                  data: Object.values(tidak_puas)
              },
            ],

              xaxis: {
                  categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                  labels: {
                      style: {
                          colors: 'rgba(94, 96, 110, .5)'
                      }
                  }
              },
              grid: {
                  borderColor: 'rgba(94, 96, 110, .5)',
                  strokeDashArray: 4
              }    
          }

          var chart1 = new ApexCharts(
              document.querySelector("#apex1"),
              options1
          );

          chart1.render();

          var options2 = {
              series: [{
                  name: 'Series 1',
                  data: [20, 100, 40, 30, 50, 80, 33]
              }],
              chart: {
                  height: 337,
                  type: 'radar',
                  toolbar: {
                      show: false,
                  }
              },
              dataLabels: {
                  enabled: true
              },
              plotOptions: {
                  radar: {
                      size: 140,
                      polygons: {
                          strokeColors: '#e9e9e9',
                          fill: {
                              colors: ['#f8f8f8', '#fff']
                          }
                      }
                  }
              },
              colors: ['#EE6E83'],
              markers: {
                  size: 4,
                  colors: ['#fff'],
                  strokeColor: '#FF4560',
                  strokeWidth: 2,
              },
              tooltip: {
                  y: {
                      formatter: function (val) {
                          return val
                      }
                  }
              },
              xaxis: {
                  categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
              },
              yaxis: {
                  tickAmount: 7,
                  labels: {
                      formatter: function (val, i) {
                          if (i % 2 === 0) {
                              return val
                          } else {
                              return ''
                          }
                      }
                  }
              }
          };

          var chart2 = new ApexCharts(document.querySelector("#apex2"), options2);
          chart2.render();
      });
    </script>
@endpush