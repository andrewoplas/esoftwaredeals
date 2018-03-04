@extends ('tango.layouts.master')

@section ('cssfiles')
    <link href="/css/tango/login.css" rel="stylesheet">
@endsection

@section ('title')
    Login
@endsection

@section ('content')
    <div class="container-fluid">
        <div class="login-form white-box">
            <h1 class="login-heading-text color-gray">Welcome Back!</h1>
            <div class="login-form-padding">
                <form method="POST" action="/tango" class="floating-labels">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="username" type="text" class="form-control" name="username" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="username" class="color-gray">Username</label>
                        <i class="mdi mdi-email form-control-feedback color-gray"></i>
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="password" class="color-gray">Password</label>
                        <i class="mdi mdi-lock form-control-feedback color-gray"></i>
                    </div>
                    <div class="form-group" style="height: 38px">
                        <div class="checkbox checkbox-success">
                            <input id="remember" type="checkbox" class="remember" name="remember">
                            <label for="remember" class="color-light-gray">Keep me signed in</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Login</button>

                    @if (count($errors))
                        <div class="form-group" style="margin-top: 25px; margin-bottom: 0">
                            @foreach ($errors->all() as $error)
                                <p class="text-danger text-center">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section ('jsfiles')
    <script src="/js/ampleadmin/waves.js"></script>
@endsection