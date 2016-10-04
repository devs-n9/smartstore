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
        <div class="col-md-12 item-more-info">

            <!-- Nav tabs -->
            <ul class="nav nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Profile details</a></li>
                <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Orders history</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="details">
                    <div class="sky-form-login">
                        <form action="{{ url('profile') }}" id="sky-form" class="sky-form" role="form" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <h3 class="text-left"><i class="fa fa-user"></i>Edit your account</h3>

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

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <section>
                                            <div class="profile__avatar">
                                                @if($user->avatar)
                                                    <img class="media-object img-circle" src="{{ asset('/uploads/images/users/' . $user->avatar) }}" alt="">
                                                @else
                                                    <img class="media-object img-circle" src="{{ asset('/assets/images/default-user-image.png' . $user->avatar) }}" alt="">
                                                @endif
                                            </div>
                                            <label class="input">
                                                Avatar
                                                <input type="file" name="avatar">
                                            </label>
                                        </section>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="input">
                                                    First name
                                                    <input type="text" name="first_name" placeholder="First name" value="{{ $user->first_name }}">
                                                    @if ($errors->has('first_name'))
                                                        <b class="tooltip active tooltip-bottom-right">{{ $errors->first('first_name') }}</b>
                                                    @else
                                                        <b class="tooltip tooltip-bottom-right">Your First name</b>
                                                    @endif
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="input">
                                                    Last name
                                                    <input type="text" name="last_name" placeholder="Last name" value="{{ $user->last_name }}">
                                                    @if ($errors->has('last_name'))
                                                        <b class="tooltip active tooltip-bottom-right">{{ $errors->first('last_name') }}</b>
                                                    @else
                                                        <b class="tooltip tooltip-bottom-right">Your Last name</b>
                                                    @endif
                                                </label>
                                            </section>
                                        </div>
                                        <section>
                                            <label class="input">
                                                Edit password
                                                <div style="position: relative;">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="password" placeholder="Password" id="password">
                                                    @if ($errors->has('password'))
                                                        <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password') }}</b>
                                                    @else
                                                        <b class="tooltip tooltip-bottom-right">Edit password password</b>
                                                    @endif
                                                </div>
                                            </label>
                                        </section>
                                        <section>
                                            <label class="input">
                                                Confirm password
                                                <div style="position: relative;">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="password_confirmation" placeholder="Confirm password">
                                                    @if ($errors->has('password'))
                                                        <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password') }}</b>
                                                    @else
                                                        <b class="tooltip tooltip-bottom-right">Please confirm your password</b>
                                                    @endif
                                                </div>
                                            </label>
                                        </section>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="select">
                                                    Select your gender
                                                    <div style="position: relative;">
                                                        <select name="gender">
                                                            <option value="0"
                                                                @if($user->gender == 0)
                                                                selected
                                                                @endif
                                                                >Gender</option>
                                                            <option value="1"
                                                                @if($user->gender == 1)
                                                                selected
                                                                @endif
                                                                >Male</option>
                                                            <option value="2"
                                                                @if($user->gender == 2)
                                                                selected
                                                                @endif
                                                                >Female</option>
                                                        </select>
                                                        <i></i>
                                                    </div>
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="input">
                                                    Age
                                                    <input type="number" name="age" placeholder="Age" value="{{ $user->age }}">
                                                </label>
                                            </section>
                                            <section class="col col-xs-12">
                                                <label class="input">
                                                    Phone
                                                    <input type="tel" name="tel" value="{{ $user->tel }}">
                                                    @if ($errors->has('tel'))
                                                        <b class="tooltip active tooltip-bottom-right">{{ $errors->first('tel') }}</b>
                                                    @else
                                                        <b class="tooltip tooltip-bottom-right">Please enter your Phone</b>
                                                    @endif
                                                </label>
                                            </section>
                                            <section class="col col-xs-12">
                                                <label class="textarea">
                                                    Address
                                                    <textarea name="address" id="" cols="30" rows="10">{{ $user->address }}</textarea>
                                                </label>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <footer>
                                        <button type="submit" class="btn btn-skin btn-lg">Save account</button>
                                    </footer>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="history">
                    <div class="table-responsive table-order-history">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product Name</th>
                                <th>Order No.</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td valign="middle"><img src="images/men/1.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/2.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/3.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/4.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-warning"><i class="fa fa-refresh"></i></span> Return Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/5.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/6.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-danger"><i class="fa fa-times"></i></span> Cancel</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/7.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/8.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/9.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            <tr>
                                <td valign="middle"><img src="images/men/10.jpg" alt="" width="50"></td>
                                <td valign="middle">T-shirt</td>
                                <td valign="middle">45985448</td>
                                <td><span class="label-success"><i class="fa fa-check"></i></span> Success</td>
                                <td>$99.00</td>
                                <td class="total-order">$99.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>

@endsection