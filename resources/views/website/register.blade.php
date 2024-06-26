@extends("website.layouts.app")
@section("content")

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Login</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Login</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
 <!-- login area start -->
 <div class="login-register-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4>register</h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4>login</h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{route('register')}}" method="post">
                                            @csrf
                                            @include('website.partials._errors')
                                            <input type="text" name="username" placeholder="Username" />
                                            <input  type="email"  name="email" placeholder="Email" />

                                            <input type="text" name="first_name" placeholder="First Name" />
                                            <input type="text" name="last_name" placeholder="Last Name" />

                                            <input type="text" name="phone" placeholder="Phone" />
                                            <input type="text" name="address" placeholder="Address" />
                                            <select name="type" class="form-select mb-4">
                                                <option selected> select user type</option>

                                                <option value="user">User</option>
                                                <option value="artist">Artist</option>
                                            </select>                                                <input type="password" name="password" placeholder="Password" />
                                                <input type="password" name="password_confirmation" placeholder="Password Confirmation" />

                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{route('login')}}" method="post">
                                            @csrf
                                            @include('website.partials._errors')
                                            <input  type="email"  name="email" placeholder="Email" />
                                                <input type="password" name="password" placeholder="Password" />
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" />
                                                        <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit"><span>Login</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->

@endsection
