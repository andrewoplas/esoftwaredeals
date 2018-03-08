@extends('site.layouts.master')

@section('title')
Esoftwaredeals | Login
@endsection

@section('cssfiles')
    <link href="/css/site/login.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <form id="login_form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
            <div id="account_setup_form">
                <div class="row login-form white-box">
                    <div class="text-center">OR</div>
                    <div class="col-md-6 col-xs-12 first-column">
                        <h1 class="login-heading-text color-gray">Login</h1>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control input-field" name="email" placeholder="Username/Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control input-field" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-info login-button">Login</button>
                        @if (count($errors))
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"> {{ $error }} </p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 col-xs-12 second-column">
                        <h1 class="login-with-text">Login with<br/> Social Network</h1>
                        <div class="social-network-buttons">
                            <a href="/login/facebook">
                                <button type="button" class="btn facebook-button">
                                    Login with Facebook
                                </button>
                            </a>
                            <a href="/login/google">
                                <button type="button" class="btn google-button">
                                    Login with Google
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection