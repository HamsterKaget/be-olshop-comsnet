@extends('layouts.admin')

@section('title')
Category - Comsnet Store
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Category</h2>
            <p class="dashboard-subtitle">Create A Brand New Category !</p>
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
                            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Category Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="slug">Slug  <span class="text-muted italic" style="font-size: 14px;">( Slug is costum url for this category page )</span></label>
                                            <input type="text" name="slug" id="slug" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="photo">Category Logo <span class="text-muted italic" style="font-size: 14px;">( Recommended Resolution is 64 x 64px )</span>  <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" id="photo" class="form-control" required accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="{{ route('category.index') }}" class="btn btn-secondary px-5 mr-3"> Back </a>
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
