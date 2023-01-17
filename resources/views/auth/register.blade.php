@extends('layouts.auth')

@section('content')
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>Memulai untuk jual beli dengan cara terbaru</h2>
                    <form class="mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input id="name" v-model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>

                            <input id="email" v-model="email"
                                @change="checkEmail()"
                                type="email" class="form-control @error('email') is-invalid @enderror"
                                :class="{ 'is_invalid' : this.email_unavailable }"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="is_store_open">Store</label>
                            <p>Apakah anda juga ingin membuka toko?</p>
                            {{-- <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                                <label for="openStoreTrue" class="my-auto ml-1">Yes, Ofc</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label for="openStoreFalse" class="my-auto ml-1">No, Thanks !</label>
                            </div> --}}

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
                            <input type="text" name="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" value="{{ old('store_name') }}" required autocomplete="store_name" autofocus />
                            @error('store_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="categories_id">categories</label>
                            <select name="categories_id" id="categories_id" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4" :disabled="this.email_unavailable" >Sign Up Now</button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-4">Back To Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container" hidden>
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
</div> --}}
@endsection

@push('addon-script')
<script src="{{ url('/vendor/vue/vue.js') }}"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);

    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
        },
        methods: {
            checkEmail: function() {
                var self = this;
                axios.get("{{ route('api-register-check') }}", {
                    params: {
                        email: this.email
                    }
                })
                .then(function (response) {

                    if(response.data == 'Available') {
                        self.$toasted.show("Email Anda Tersedia!", {
                            position: "top-center",
                            className: "rounded",
                            duration: 2500,
                        });
                        self.email_unavailable = false;
                    } else {
                        self.$toasted.error("Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                            position: "top-center",
                            className: "rounded",
                            duration: 2500,
                        });
                        self.email_unavailable = true;
                    }
                    // handle success
                    console.log(self.email_unavailable);
                })
            }
        },
        data() {
            return {
                name: "Some Name",
                email: "someemaail@email.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false,
            }
        },
    });
</script>
@endpush
