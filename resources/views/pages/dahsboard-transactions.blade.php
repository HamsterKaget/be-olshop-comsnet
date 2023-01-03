@extends('layouts.dashboard')

@section('title')
Dashboard - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
                        <div class="container-fluid">
                            <div class="dashboard-heading">
                                <h2 class="dashboard-title">Transactions</h2>
                                <p class="dashboard-subtitle">Big result start from the small one</p>
                            </div>
                            <div class="dashboard-content">
                                <div class="row mt-3">
                                    <div class="col-12 mt-2">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="sell_product" data-toggle="pill" href="#buyProduct" role="tab" aria-controls="buyProduct" aria-selected="true">Sell Product</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="buy_product" data-toggle="pill" href="#sellProduct" role="tab" aria-controls="sellProduct" aria-selected="false">Buy Product</a>
                                            </li>
                                            <li class="nav-item"></li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="buyProduct" role="tabpanel" aria-labelledby="sell_product">
                                                <a href="{{ '/dashboard/transactions/1' }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1 card-thumbnail">
                                                                <img src="{{ url('/images/product-tatakan-gelas.jpg') }}" alt="icon product" />
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
                                                <a href="{{ '/dashboard/transactions/1' }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1 card-thumbnail">
                                                                <img src="{{ url('/images/product-shoes.jpg') }}" alt="icon product" />
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
                                                <a href="{{ '/dashboard/transactions/1' }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1 card-thumbnail">
                                                                <img src="{{ url('/images/product-apple-watch.jpg') }}" alt="icon product" />
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
                                            <div class="tab-pane fade" id="sellProduct" role="tabpanel" aria-labelledby="buy_product">
                                                <a href="{{ '/dashboard/transactions/1' }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1 card-thumbnail">
                                                                <img src="{{ url('/images/product-tatakan-gelas.jpg') }}" alt="icon product" />
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
                                                <a href="{{ '/dashboard/transactions/1' }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1 card-thumbnail">
                                                                <img src="{{ url('/images/product-apple-watch.jpg') }}" alt="icon product" />
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
