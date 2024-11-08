@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Add</div>
                </div>
                @include('layouts.alert')
            </div>


            <div class="section-body">
                <h2 class="section-title">Add User</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12  ">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <form action="{{route('user.store')}}" method="POST"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                        name="name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"
                                        name="email"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number"
                                        name="phone"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label></label>
                                        <input type="text"
                                        name="password"

                                            class="form-control">
                                    </div>

                                    <div class="section-title">Select Your Role</div>
                                    <div class="form-group">
                                        <label class="form-label"></label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="role"
                                                    value="admin"
                                                    class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Admin</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="role"
                                                    value="staff"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Staff</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="role"
                                                    value="user"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">User</span>
                                            </label>

                                        </div>
                                    </div>
                                   <div class="form-group text-right">
                                    <button class="btn btn-primary">Submit</button>
                                   </div>

                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
