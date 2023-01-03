@extends('layouts.auth')

@section('content')
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>Memulai untuk jual beli dengan cara terbaru</h2>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control is-valid" v-model="name" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control is-invalid" v-model="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="is_store_open">Store</label>
                            <p>Apakah anda juga ingin membuka toko?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                                <label for="openStoreTrue" class="my-auto ml-1">Yes, Ofc</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label for="openStoreFalse" class="my-auto ml-1">No, Thanks !</label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="store_name">Nama Toko</label>
                            <input type="text" name="store_name" id="store_name" class="form-control" />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="category">categories</label>
                            <select name="category" id="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                            </select>
                        </div>
                        <a href="/dashboard.html" class="btn btn-success btn-block mt-4">Sign Up Now</a>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-4">Back To Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" hidden>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="{{ url('/vendor/vue/vue.js') }}"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
            this.$toasted.error("Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                position: "top-center",
                className: "rounded",
                duration: 2500,
            });
        },
        data: {
            name: "Some Name",
            email: "someemaail@email.com",
            password: "",
            is_store_open: true,
            store_name: "",
        },
    });
</script>
@endpush
