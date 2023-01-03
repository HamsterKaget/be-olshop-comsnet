@extends('layouts.success')

@section('title')
Success - Comsnet Store
@endsection

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="{{ url('/images/success.svg') }}" alt="succes" class="mb-4" />
                    <h2>Register Success !</h2>
                    <p>Silahkan tunggu konfirmasi email dari kami dan kami akan menginformasikan resi secept mungkin!</p>
                    <div>
                        <a href="/dashboard.html" class="btn btn-success w-50 mt-4"> My Dashboard </a>
                        <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">Go To Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
