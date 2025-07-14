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
            <h2 class="section-title">Create Project</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Create</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Nama Project</label>
                                    <input type="text" name="nama_project" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Kontrak</label>
                                    <input type="text" name="nilai_kontrak" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Connectivity</label>
                                    <input type="text" name="nilai_connectivity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tipe Project</label>
                                    <select class="form-control" name="tipe_project">
                                        <option disabled selected>Pilih Tipe Project</option>
                                        <option value="big_mega">Big & Mega</option>
                                        <option value="regular">Regular</option>
                                    </select>
                                </div>
                                <a href="{{ route('profile.index') }}" type="button" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
