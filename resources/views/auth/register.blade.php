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
                    @if ($errors->has())
                    <div>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div>
                                @foreach($errors->all() as $error)
                                <div>{{{ $error }}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif


                    <fieldset>
                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" name="name" placeholder="Username">
                                <b class="tooltip tooltip-bottom-right">Enter Username</b>
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" placeholder="Email address">
                                <b class="tooltip tooltip-bottom-right">Enter valid email address</b>
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password" placeholder="Password" id="password">
                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                            </label>
                        </section>

                        <section>
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirm password">
                                <b class="tooltip tooltip-bottom-right">Please confirm your password</b>
                            </label>
                        </section>
                    </fieldset>

                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <input type="text" name="first_name" placeholder="First name" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <input type="text" name="last_name" placeholder="Last name">
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="select">
                                    <select name="gender" required>
                                        <option value="Unknown" selected disabled>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <input type="text" name="age" placeholder="Age">
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="input">
                                    Avatar
                                    <input type="file" name="tel">
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="input">
                                    <input type="tel" name="tel" placeholder="Phone">
                                </label>
                            </section>
                            <section class="col col-xs-12">
                                <label class="input">
                                    <textarea name="address" id="" cols="30" rows="10"></textarea>
                                </label>
                            </section>
                        </div>
                        <section>
                            <label class="checkbox"><input type="checkbox" name="subscription" id="subscription"><i></i>I want to receive news and  special offers</label>
                            <label class="checkbox"><input type="checkbox" name="terms" id="terms" required><i></i>I agree with the Terms and Conditions</label>
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