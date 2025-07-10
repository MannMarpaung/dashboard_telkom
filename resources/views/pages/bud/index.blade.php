@extends('layouts.stisla.parent')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Table</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Full Width</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Divisi</th>
                                        <th>RTP</th>
                                        <th>PROVISION</th>
                                        <th>PS</th>
                                        <th>CANCEL</th>
                                        <th>UNMAPPING</th>
                                        <th>GRANDTOTAL</th>
                                    </tr>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('segment.index', $row->bud) }}">{{ $row->bud }}</a>
                                            </td>
                                            <td>{{ $row->rtp }}</td>
                                            <td>{{ $row->provision }}</td>
                                            <td>{{ $row->ps }}</td>
                                            <td>{{ $row->cancel }}</td>
                                            <td>{{ $row->unmapping }}</td>
                                            <th>{{ $row->rtp + $row->provision + $row->ps + $row->cancel + $row->unmapping }}
                                            </th>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="2">Grand Total</th>
                                        <th>{{ $data->sum('rtp') }}</th>
                                        <th>{{ $data->sum('provision') }}</th>
                                        <th>{{ $data->sum('ps') }}</th>
                                        <th>{{ $data->sum('cancel') }}</th>
                                        <th>{{ $data->sum('unmapping') }}</th>
                                        <th>{{ $data->sum('rtp') + $data->sum('provision') + $data->sum('ps') + $data->sum('cancel') + $data->sum('unmapping') }}
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1
                                            <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($data as $bud)
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $bud->bud }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="{{ $bud->bud }}Chart"></canvas>
                            </div>
                            <script>
                                const ctx{{ $bud->bud }} = document.getElementById('{{ $bud->bud }}Chart');

                                new Chart(ctx{{ $bud->bud }}, {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            'RTP',
                                            'PROVISION',
                                            'PS',
                                            'CANCEL',
                                            'UNMAPPING',
                                        ],
                                        datasets: [{
                                            label: '{{ $bud->bud }}',
                                            data: [
                                                {{ $bud->rtp }},
                                                {{ $bud->provision }},
                                                {{ $bud->ps }},
                                                {{ $bud->cancel }},
                                                {{ $bud->unmapping }},
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
                @endforeach
            </div>
        </div>
    </section>
@endsection
