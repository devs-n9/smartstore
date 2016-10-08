@extends('layouts.index')

@section('content')

<!--breadcrumb start-->
<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>Login or Register</h1>
    </div>
</div>
<!--end breadcrumb-->

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="sky-form-login">
                <form action="{{ url('register') }}" id="sky-form" class="sky-form" role="form" method="post">

                    {{ csrf_field() }}

                    <h3 class="text-left"><i class="fa fa-user"></i>Create new account with assan</h3>

                    {{--Ошибки--}}
                    {{--@if ($errors->has())--}}
                        {{--<div>--}}
                            {{--<br>--}}
                            {{--<div class="alert alert-danger" role="alert">--}}
                                {{--<button class="close" aria-label="Close" data-dismiss="alert" type="button">--}}
                                    {{--<span aria-hidden="true">×</span>--}}
                                {{--</button>--}}
                                {{--<div>--}}
                                    {{--@foreach($errors->all() as $error)--}}
                                        {{--<div>{{ $error }}</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}


                    <fieldset>
                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" name="login" placeholder="Username">
                                @if ($errors->has('login'))
                                    <b class="tooltip active tooltip-bottom-right">{{ $errors->first('login') }}</b>
                                @else
                                    <b class="tooltip tooltip-bottom-right">Enter Username</b>
                                @endif
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" placeholder="Email address">
                                @if ($errors->has('email'))
                                    <b class="tooltip active tooltip-bottom-right">{{ $errors->first('email') }}</b>
                                @else
                                    <b class="tooltip tooltip-bottom-right">Enter valid email address</b>
                                @endif
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" id="password">
                                @if ($errors->has('password'))
                                    <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password') }}</b>
                                @else
                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                @endif
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirm password">
                                @if ($errors->has('password_confirmation'))
                                    <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password_confirmation') }}</b>
                                @else
                                    <b class="tooltip tooltip-bottom-right">Please confirm your password</b>
                                @endif
                            </label>
                        </section>

                        <section>
                            {{--<label class="checkbox"><input type="checkbox" name="subscription" id="subscription"><i></i>I want to receive news and  special offers</label>--}}
                            <label class="checkbox"><input type="checkbox" required checked="checked" name="terms" id="terms"><i></i>I agree with the Terms and Conditions</label>
                        </section>
                    </fieldset>

                    <footer>
                        <button type="submit" class="btn btn-skin btn-lg">Create account</button>
                    </footer>
                </form>


            </div>
        </div><!--col end-->
        <div class="col-md-6">
            <div class="login-register-aside-box">
                <h3>Already have an account!</h3>
                <p>
                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimusNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                </p>
                <br>
                <a href="{{ url('login') }}" class="btn btn-light-dark btn-lg">Login Now</a>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>

@endsection
