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
                            <tr>
                                <td style="width: 20%">
                                    <img src="./images/cart-item-1.jpg" alt="product image" class="cart-image" />
                                </td>
                                <td style="width: 40%">
                                    <div class="product-title">Apple Watch</div>
                                    <div class="product-subtitle">by someone brand</div>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-title">$123,12</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%" class="text-center">
                                    <a href="#" class="btn btn-remove-cart">Remove</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%">
                                    <img src="./images/cart-item-2.jpg" alt="product image" class="cart-image" />
                                </td>
                                <td style="width: 40%">
                                    <div class="product-title">Some Stuff Who's have long name</div>
                                    <div class="product-subtitle">by someone brand</div>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-title">$15,9</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%" class="text-center">
                                    <a href="#" class="btn btn-remove-cart">Remove</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%">
                                    <img src="./images/cart-item-3.jpg" alt="product image" class="cart-image" />
                                </td>
                                <td style="width: 40%">
                                    <div class="product-title">Sofa Ternyaman</div>
                                    <div class="product-subtitle">by someone brand</div>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-title">$1229,59</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%" class="text-center">
                                    <a href="#" class="btn btn-remove-cart">Remove</a>
                                </td>
                            </tr>
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
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addresOne">Address 1</label>
                        <input type="text" name="addresOne" id="addresOne" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="AddresTwo">Address 2</label>
                        <input type="text" name="AddresTwo" id="AddresTwo" class="form-control" />
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
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" name="postalCode" id="postalCode" class="form-control" />
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
                        <label for="mobile">Mobile</label>
                        <input type="number" name="mobile" id="mobile" class="form-control" />
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
                    <div class="product-title">$10</div>
                    <div class="product-subtitle">Country Tax</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title">$280</div>
                    <div class="product-subtitle">Product Insurance</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title">$49,99</div>
                    <div class="product-subtitle">Ship to Jakarta</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title text-success mt-4 mt-md-0">$299,99</div>
                    <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                    <a href="success.html" class="btn btn-success mt-4 my-md-auto px-4 btn-block">Checkout Now</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
