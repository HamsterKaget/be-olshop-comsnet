@extends('layouts.admin')

@section('title')
User - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit User</h2>
            <p class="dashboard-subtitle"> Edit Existing User !</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">User Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">User Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">New Password <span class="text-muted italic" style="font-size: 14px;">( Leave it empty if you dont want to change the password )</span></label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="password" name="password" id="password" class="form-control" disabled required>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-danger text-white w-100 mt-3 mt-md-0" onclick="toggleDisabled()">Change Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            <select name="roles" id="roles" class="form-control" required>
                                                <option value="ADMIN" {{ $item->roles == 'ADMIN'? 'selected' : '' }}>Admin</option>
                                                <option value="USER" {{ $item->roles == 'USER'? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="{{ route('user.index') }}" class="btn btn-secondary px-5 mr-3"> Back </a>
                                        <button type="submit" class="btn btn-success px-5">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        function toggleDisabled() {
            if(confirm()) {
                var el = document.getElementById('password');
                el.disabled = false;
            }
            return
        }
    </script>
@endpush
