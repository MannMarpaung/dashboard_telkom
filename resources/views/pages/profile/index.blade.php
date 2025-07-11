@extends('layouts.stisla.parent')

@section('content')
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
                                        <th>Nama Project</th>
                                        <th>Nama PM</th>
                                        <th>Tipe Project</th>
                                        <th>Status</th>
                                        <th>Orders</th>
                                    </tr>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->nama_project }}</td>
                                            <td>{{ $project->user->name }}</td>
                                            <td>{{ $project->tipe_project }}</td>
                                            <td>{{ $project->status_project }}</td>
                                            <td><a
                                                    href="{{ route('orders.index', $project->id) }}">{{ $project->project_orders->count() }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
        </div>
    </section>
@endsection

@endsection
