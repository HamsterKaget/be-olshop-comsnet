@extends('layouts.dashboard')

@section('title')
Dashboard - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">Make store that profitable !</p>
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
                                            <label for="category">categories</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="" disabled>Select Category</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="store_status">Store Status</label>
                                            <p class="dashboard-subtitle">Apakah saat ini toko Anda buka??</p>
                                            <div class="custom-control custom-radio custom-control-inline" style="padding-left: 0px">
                                                <input type="radio" name="store_status" id="store_open" value="true" />
                                                <label for="store_open" class="my-auto ml-1">Open</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="store_status" id="store_closed" value="false" />
                                                <label for="store_closed" class="my-auto ml-1">Closed !</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
