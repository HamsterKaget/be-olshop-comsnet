@extends('layouts.dashboard')

@section('title')
Dashboard - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Some Product Name</h2>
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
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 mt-3 w-100">Save Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/product-orange-boggota.jpg" alt="product img" class="w-100" />
                                        <a href="#" class="delete-gallery">
                                            <img src="/images/remove.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="file" name="" id="file" hidden multiple />
                                    <button class="btn btn-secondary btn-block mt-3" onclick="thisFileUploud()">Add Photo</button>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description");
</script>
<script>
    function thisFileUploud() {
        document.getElementById("file").click();
    }
</script>
@endpush
