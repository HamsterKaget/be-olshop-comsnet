@extends('layouts.app')

@section('title')
Category - Comsnet Store
@endsection

@section('content')
<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/index">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-striped table-cart">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name &amp; Seller</td>
                                <td>Price</td>
                                <td class="text-center">Menu</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($cart as $item)
                            <tr>
                                <td style="width: 20%">
                                    @if ($item->product->galleries)
                                        <img src="{{ Storage::url($item->product->galleries->first()->photos) }}" alt="product image" class="cart-image" />
                                    @endif
                                </td>
                                <td style="width: 40%">
                                    <div class="product-title">{{ $item->product->name }}</div>
                                    <div class="product-subtitle">by {{ $item->product->user->store_name }}</div>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-title">Rp {{ number_format($item->product->price) }}</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%" class="text-center">
                                    <form action="{{ route('delete-cart', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-remove-cart">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $totalPrice +=  $item->product->price
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data" id='location'>
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_one">Address 1</label>
                        <input type="text" name="address_one" id="address_one" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_two">Address 2</label>
                        <input type="text" name="address_two" id="address_two" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="regencies">City</label>
                        <input type="text" name="regencies" id="regencies" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="zip_code">Postal Code</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option value="none">Choose</option>
                            <option value="ind">India</option>
                            <option value="ina">Indonesia</option>
                            <option value="sg">Singapore</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Payment Information</h2>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-4 col-md-2">
                    <div class="product-title">Rp 0</div>
                    <div class="product-subtitle">Country Tax</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title">Rp 0</div>
                    <div class="product-subtitle">Product Insurance</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title">Rp 0</div>
                    <div class="product-subtitle">Ship to Jakarta</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title text-success mt-4 mt-md-0">Rp {{ number_format($totalPrice) }}</div>
                    <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                    <button type="submit" class="btn btn-success mt-4 my-md-auto px-4 btn-block">Checkout Now</button>
                </div>
            </div>
            </form>
        </div>
    </section>
</div>
@endsection
