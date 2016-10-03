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
                                                    <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <fieldset>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="login" placeholder="Username">
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
                                                <input type="text" name="first_name" placeholder="First name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <input type="text" name="last_name" placeholder="Last name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="select">
                                                <select name="gender">
                                                    <option value="Unknown" selected disabled>Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
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
                                            <label class="textarea">
                                                <textarea name="address" id="" cols="30" rows="10"></textarea>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="checkbox"><input type="checkbox" name="subscription" id="subscription"><i></i>I want to receive news and  special offers</label>
                                        <label class="checkbox"><input type="checkbox" name="terms" id="terms"><i></i>I agree with the Terms and Conditions</label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-skin btn-lg">Create account</button>
                                </footer>
                            </form>


                        </div>
                    </div><!--col end-->
                </div>
                <div role="tabpanel" class="tab-pane" id="history">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <form class="search-form">
                                <input type="text" class="form-control" placeholder="Search Order">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
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
                    <nav>
                        <ul class="pagination pull-right clearfix">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>

@endsection