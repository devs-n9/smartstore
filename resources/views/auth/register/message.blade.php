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
        <div class="col-md-6 col-md-offset-3">
            <div class="login-register-aside-box">
                <h3>Attention!</h3>
                <p>
                    {{ $message }}
                </p>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>

@endsection
