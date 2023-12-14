
<div>
<div class="content">
      <div class="row row-xs">
        <div class="col-lg-8 col-xl-9">
          <div class="card">
            <div class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
              <div>
                <h6 class="mg-b-5">Metrica de visitas al sitio web</h6>
                <p class="tx-12 tx-color-03 mg-b-0">Audience to which the users belonged while on the current date range.</p>
              </div>
              <div class="btn-group mg-t-20 mg-sm-t-0">
                <button wire:click="switchView('daily')" class="btn btn-xs btn-white btn-uppercase">Day</button>
                <button wire:click="switchView('weekly')" class="btn btn-xs btn-white btn-uppercase">Week</button>
                <button wire:click="switchView('monthly')" class="btn btn-xs btn-white btn-uppercase">Month</button>
              </div><!-- btn-group -->
            </div><!-- card-header -->
            <div class="card-body pd-lg-25">
              <div class="row align-items-sm-end">
                <div class="col-lg-7 col-xl-8">
                  <div class="chart-six" wire:init="renderChart(1)">
                    <canvas id="chartBar1" wire:ignore></canvas>
                  </div>
                </div>
                <div class="col-lg-5 col-xl-4 mg-t-30 mg-lg-t-0">
                  <div class="row">
                    <div class="col-sm-6 col-lg-12">
                      @foreach ($MostFamous as $name => $famous)
                      <div class="d-flex align-items-center justify-content-between mb-2 mt-2">
                        <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mb-0">{{ $name }}</h6>
                        <span class="tx-10 tx-color-04">{{ $famous['percentage'] }}% goal reached</span>
                    </div>
                      <div class="d-flex align-items-end justify-content-between mg-b-5">
                          <h5 class="tx-normal tx-rubik lh-2 mg-b-0">{{ $famous['monthly_count'] }}</h5>
                          <h6 class="tx-normal tx-rubik tx-color-03 lh-2 mg-b-0">{{ $famous['goal'] }}</h6>
                      </div>
                      <div class="progress ht-4 mg-b-0 op-5 mb-2 mt-2">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" style="width: {{ $famous['percentage'] }}%; background-color: {{ $famous['color'] }}" aria-valuenow="{{ $famous['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      @endforeach
                  </div>
                  </div><!-- row -->

                </div>
              </div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div>
        <div class="col-lg-6 mg-t-10">
          <div class="card">
            <div class="card-header d-flex align-items-start justify-content-between">
              <h6 class="lh-5 mg-b-0">Visitas por página</h6>
              <a href="" class="tx-13 link-03">{{ now()->startOfWeek()->format('M d, Y') }} - {{ now()->endOfWeek()->format('M d, Y') }} <i class="icon ion-ios-arrow-down"></i></a>
            </div><!-- card-header -->
            <div class="card-body pd-y-15 pd-x-10">
              <div class="table-responsive">
                <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                  <thead>
                    <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                      <th class="wd-5p">Link</th>
                      <th>Nombre de la página</th>
                      <th class="text-right">Porcentaje (%)</th>
                      <th class="text-right">Visitas</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($totalVisits as $name => $value)
                    <tr>
                      <td class="align-middle text-center"><a href="/{{ $name }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link wd-12 ht-12 stroke-wd-3"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg></a></td>
                      <td class="align-middle tx-medium">{{ $name }}</td>
                      <td class="align-middle text-right">
                        <div class="wd-150 d-inline-block">
                          <div class="progress ht-4 mg-b-0">
                            <div class="progress-bar" role="progressbar" style="width: {{ $value['percentage'] }}%; background-color: {{ $value['color'] }}" aria-valuenow="{{ $value['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-right"><span class="tx-medium">{{ $value['percentage'] }}%</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->
        <div class="col-lg-6 mg-t-10">
          <div class="card">
            <div class="card-header d-sm-flex align-items-start justify-content-between">
              <h6 class="lh-5 mg-b-0">Navegadores Usados</h6>
            </div><!-- card-header -->
            <div class="card-body pd-y-15 pd-x-10">
              <div class="table-responsive">
                <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                  <thead>
                    <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                      <th class="wd-5p">&nbsp;</th>
                      <th>Navegador</th>
                      <th class="text-right">Total de registros</th>
                      <th class="text-right">Registros mensuales</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($browserData as $browser => $data)
                    <tr>
                      <td><i class="fab fa-{{ strtolower($browser) }} tx-primary op-6"></i></td>
                      <td class="tx-medium">{{ $browser }}</td>
                      <td class="text-right">{{ $data['total_entries'] }}</td>
                      <td class="text-right">{{ $data['monthly_entries'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->
        <div class="col mg-t-10">
          <div class="card card-dashboard-table">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="1">Registros</th>
                  </tr>
                  <tr>
                    <th>Nombre del modelo</th>
                    <th>Total de registros</th>
                    <th>Registros mensuales</th>
                    <th>Registros anuales</th>
                    <th>Registros eliminados</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($counts as $modelName => $modelCounts)
                  <tr>
                    <td><a href="">{{ ucfirst($modelName) }}</a></td>
                    <td><strong>{{ $modelCounts['total'] }}</strong></td>
                    <td><strong>{{ $modelCounts['monthly'] }}</strong></td>
                    <td><strong>{{ $modelCounts['yearly'] }}</strong></td>
                    <td><strong>{{ $modelCounts['deleted'] }}</strong></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-responsive -->
          </div><!-- card -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/assets/js/dashboard-admin.js"></script>



