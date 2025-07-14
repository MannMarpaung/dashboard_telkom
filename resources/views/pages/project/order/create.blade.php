@extends('layouts.stisla.parent')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Project</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Create Project Orders</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Create</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('orders.store', $project->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <div id="project-orders-rows">
                                    <div class="form-group">
                                        <label>Nama Project</label>
                                        <input type="number" name="project_orders[0][number_order]" class="form-control">
                                    </div>
                                </div>
                                <button type="button" onclick="addRow()" class="btn btn-secondary">Tambah Baris</button>
                                <a href="{{ route('orders.index', $project->id) }}" type="button" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-primary">Add</button>

                                <script>
                                    let index = 1;

                                    function addRow() {
                                        const html = `
                                    <div class="form-group">
                                        <label>Nama Project</label>
                                        <input type="number" name="project_orders[${index}][number_order]" class="form-control">
                                    </div>
                                        `;
                                        document.getElementById('project-orders-rows').insertAdjacentHTML('beforeend', html);
                                        index++;
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
