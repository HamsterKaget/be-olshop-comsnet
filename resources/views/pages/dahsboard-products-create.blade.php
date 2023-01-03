@extends('layouts.dashboard')

@section('title')
Dashboard - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Product</h2>
            <p class="dashboard-subtitle">Make your own product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="store_name">Store Name</label>
                                            <input type="text" name="store_name" id="store_name" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" id="price" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="" disabled>Select Category</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" style="width: 100%; min-height: 220px" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnails</label>
                                            <input type="file" name="thumbnail" id="thumbnail" class="form-control" />
                                            <p class="text-muted">Kamu dapat memilih lebih dari satu file</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success px-5 mt-4 w-100">Create New Product</button>
                        <a href="{{ route('dashboard-products')}}" class="btn btn-secondary mt-4 w-100" onclick="return confirm('You sure want to quit this page ?')">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description");
</script>
@endpush
