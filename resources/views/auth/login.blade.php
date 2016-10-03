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
                <form role="form" method="post" action="{{ url('login') }}" id="sky-form" class="sky-form">
                    {{ csrf_field() }}

                    <h3 class="text-left"><i class="fa fa-unlock"></i>Log in to your account</h3>

                    {{--Ошибки--}}
                    @if ($errors->has())
                        <div>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div>
                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                    <fieldset>
                        <section>
                            <div class="row">
                                <label class="label col col-4">Your E-mail</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="email" name="email" value="{{ old('email') }}">
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row">
                                <label class="label col col-4">Enter Password</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password">
                                    </label>
                                    <div class="note"><a href="#sky-form2" class="modal-opener">Forgot password?</a></div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row">
                                <div class="col col-4"></div>
                                <div class="col col-8">
                                    <label class="checkbox"><input type="checkbox" name="remember" checked><i></i>Keep me logged in</label>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                    <footer class="text-right">
                        <a href="/register" class="btn btn-link">Register</a>
                        <button type="submit" class="btn btn-lg btn-skin">Log in</button>

                    </footer>
                </form><!--login form-->
                <!--password recovery form start-->
                <form action="sky-form/php_files/demo-login-process.php" id="sky-form2" class="sky-form sky-form-modal">
                    <header>Password recovery</header>

                    <fieldset>
                        <section>
                            <label class="label">E-mail</label>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" id="email">
                            </label>
                        </section>
                    </fieldset>

                    <footer>
                        <button type="submit" name="submit" class="button">Submit</button>
                        <a href="#" class="button button-secondary modal-closer">Close</a>
                    </footer>

                    <div class="message">
                        <i class="fa fa-check"></i>
                        <p>Your request successfully sent!<br><a href="#" class="modal-closer">Close window</a></p>
                    </div>
                </form>

                <!--password-recovery form end-->
            </div>
        </div><!--col end-->
        <div class="col-md-6">
            <div class="login-register-aside-box">
                <h3>Don't have an account yet?</h3>
                <p>
                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimusNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                </p>
                <br>
                <a href='register.html' class="btn btn-light-dark btn-lg">Register Now</a>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>

@endsection