@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h6 class="text-center"
                style="font-size: 1.5rem;font-weight: 600;margin-left: 0.75rem;color: rgb(20, 170, 40);"> Change Your
                Information </h6>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#info" role="tab" aria-controls="home"
                        aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#changePassword" role="tab" aria-controls="profile"
                        aria-selected="false">Change password</a>
                </li>
            </ul>
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="tab-content">
                <div class="tab-pane active" id="info" role="tabpanel">
                    <form class="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div style="display: flex; flex-direction: column">
                                    <img src="{{ auth()->user()->avatar_url }}" class="avatar img-thumbnail"
                                        height="200px" width="200px" style="border-radius: 9999px; height: 200px;
                                        " alt="avatar">
                                    <h6 class="text-center mt-2" style="opacity: 0.8"> Upload your photo... </h6>
                                </div>
                                <input type="file" name="avatar" class="text-center center-block file-upload"
                                    style="margin: 0.5rem">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="Your Name">
                                    <h4>Your Name</h4>
                                </label>
                                <input type="text" class="form-control" name="Your_Name" id="Your_Name"
                                    placeholder="Change Your Name" title="enter your new name!"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Example: 519h0129@gmai.com" title="enter your email."
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <label for="email" style="font-weight: 600" class="mb-0">Balance</label>
                                <div class="ml-2">{{ Auth::user()->balance }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                </div>
                <div class="tab-pane" id="changePassword" role="tabpanel">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password"
                                    autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password"
                                    autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                Password</label>

                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control"
                                    name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
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