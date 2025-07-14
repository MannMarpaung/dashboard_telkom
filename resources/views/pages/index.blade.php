@extends('layouts.stisla.parent')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>


        <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Semesta Connectivity</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <i class="ion-email text-primary" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Total Order</div>
                                <div class="text-muted text-small">{{ $orders_count }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-social-usd text-warning" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Kontrak</div>
                                <div class="text-muted text-small">{{ $projects->sum('nilai_kontrak') }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-android-wifi text-danger" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Connectivity</div>
                                <div class="text-muted text-small">{{ $projects->sum('nilai_connectivity') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Big & Mega Project Connectivity</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <i class="ion-email text-primary" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Total Order</div>
                                <div class="text-muted text-small">{{ $orders_big_mega->count() }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-ios-copy text-success" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Total Project</div>
                                <div class="text-muted text-small">{{ $projects_big_mega->count() }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-social-usd text-warning" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Kontrak</div>
                                <div class="text-muted text-small">{{ $projects_big_mega->sum('nilai_kontrak') }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-android-wifi text-danger" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Connectivity</div>
                                <div class="text-muted text-small">{{ $projects_big_mega->sum('nilai_connectivity') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Regular Project Connectivity</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <i class="ion-email text-primary" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Total Order</div>
                                <div class="text-muted text-small">{{ $orders_regular->count() }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-ios-copy text-success" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Total Project</div>
                                <div class="text-muted text-small">{{ $projects_regular->count() }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-social-usd text-warning" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Kontrak</div>
                                <div class="text-muted text-small">{{ $projects_regular->sum('nilai_kontrak') }}</div>
                            </div>
                            <div class="col text-center">
                                <i class="ion-android-wifi text-danger" style="font-size: 40px"></i>
                                <div class="mt-2 font-weight-bold">Nilai Connectivity</div>
                                <div class="text-muted text-small">{{ $projects_regular->sum('nilai_connectivity') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Sebaran Project</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="sebaranProjectChart"></canvas>
                    </div>
                    <script>
                        const ctxSebaranProject = document.getElementById('sebaranProjectChart');

                        new Chart(ctxSebaranProject, {
                            type: 'pie',
                            data: {
                                labels: [
                                    'DPS',
                                    'DSS',
                                    'DGS',
                                    'REG'
                                ],
                                datasets: [{
                                    label: 'Sebaran Project',
                                    data: [
                                        {{ $order_dps }},
                                        {{ $order_dss }},
                                        {{ $order_dgs }},
                                        {{ $order_reg }}
                                    ],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)', // merah muda
                                        'rgb(54, 162, 235)', // biru muda
                                        'rgb(255, 205, 86)', // kuning
                                        'rgb(75, 192, 192)', // hijau toska
                                        'rgb(153, 102, 255)' // ungu
                                    ],
                                    hoverOffset: 4
                                }]
                            },
                        });
                    </script>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Status Project</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="statusProjectChart"></canvas>
                    </div>
                    <script>
                        const ctxStatusProject = document.getElementById('statusProjectChart');

                        new Chart(ctxStatusProject, {
                            type: 'pie',
                            data: {
                                labels: [
                                    'Lead',
                                    'Lag',
                                    'Delay',
                                    'Closed'
                                ],
                                datasets: [{
                                    label: 'Status Project',
                                    data: [
                                        {{ $projects_lead->count() }},
                                        {{ $projects_lag->count() }},
                                        {{ $projects_delay->count() }},
                                        {{ $projects_closed->count() }}
                                    ],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)', // merah muda
                                        'rgb(54, 162, 235)', // biru muda
                                        'rgb(255, 205, 86)', // kuning
                                        'rgb(75, 192, 192)', // hijau toska
                                        'rgb(153, 102, 255)' // ungu
                                    ],
                                    hoverOffset: 4
                                }]
                            },
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
@endsection
