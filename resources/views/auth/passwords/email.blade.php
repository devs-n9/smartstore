@extends('layouts.index')

@section('content')

<!--breadcrumb start-->
<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>Password recovery</h1>
    </div>
</div>
<!--end breadcrumb-->

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="sky-form-login">
                <!--password recovery form start-->
                <form action="{{ url('/password/email') }}" id="sky-form2" class="sky-form" method="post">

                    {{ csrf_field() }}

                    <h3 class="text-left"><i class="fa fa-unlock"></i>Password recovery</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <fieldset>
                        <section>
                            <label class="label">E-mail</label>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" id="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </label>
                        </section>
                    </fieldset>

                    <footer>
                        <button type="submit" name="submit" class="button">Submit</button>
                        <a href="{{ url('login') }}" class="button button-secondary modal-closer">Close</a>
                    </footer>

                    <div class="message">
                        <i class="fa fa-check"></i>
                        <p>Your request successfully sent!<br><a href="#" class="modal-closer">Close window</a></p>
                    </div>
                </form>

                <!--password-recovery form end-->
            </div>
        </div><!--col end-->
    </div>
</div>
<div class="space-60"></div>

@endsection
