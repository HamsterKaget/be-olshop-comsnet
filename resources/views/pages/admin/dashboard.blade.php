@extends('layouts.admin')

@section('title')
Dashboard - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">Look what you made today !</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Costumer</div>
                            <div class="dashboard-card-subtitle">{{ $costumer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">{{ 'Rp ' . $revenue }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 card-thumbnail">
                                    <img src="./images/product-tatakan-gelas.jpg" alt="icon product" />
                                </div>
                                <div class="col-md-4">Some Product</div>
                                <div class="col-md-3">Some Name</div>
                                <div class="col-md-3">12 Januari 2022</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 card-thumbnail">
                                    <img src="./images/product-shoes.jpg" alt="icon product" />
                                </div>
                                <div class="col-md-4">Some Product</div>
                                <div class="col-md-3">Some Name</div>
                                <div class="col-md-3">13 Januari 2022</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 card-thumbnail">
                                    <img src="./images/product-apple-watch.jpg" alt="icon product" />
                                </div>
                                <div class="col-md-4">Some Product</div>
                                <div class="col-md-3">Some Name</div>
                                <div class="col-md-3">14 Januari 2022</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/dashboard-arrow.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
