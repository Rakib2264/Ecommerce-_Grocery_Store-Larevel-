@extends('frontend.master')
@section('frontend_content')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('frontend') }}">Home</a><span>|</span></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <div class="banner">
        <div class="w3l_banner_nav_left">
            <nav class="navbar nav_bottom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">

                    @foreach ($categories as $category)
                        <ul class="nav navbar-nav nav_1">
                            <li class="dropdown mega-dropdown active">
                                <a href="{{ route('category_product', $category->slug) }}">{{ $category->name }}<span
                                        class="caret"></span></a>
                                <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                    <div class="w3ls_vegetables">
                                        <ul>
                                            @foreach ($category->subcategories as $subcategory)
                                                <li><a
                                                        href="{{ route('subcategory_product', $subcategory->id) }}">{{ $subcategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="w3l_banner_nav_right">
            <!-- about -->
            <div class="privacy about">
                <h3>Chec<span>kout</span></h3>

                <div class="checkout-right">
                    <h4>Your shopping cart contains: <span>3 Products</span></h4>
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>User Name</th>
                                <th>Product Name</th>
                                <th>Product Quality</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                                $totalqty = 0;
                            @endphp
                            @foreach ($products as $product)
                                <tr class="rem1">
                                    <td class="invert">{{ $loop->index + 1 }}</td>
                                    <td class="invert">{{ $product->user_id }}</td>
                                    <td class="invert">{{ $product->products->name }}</td>
                                    <td class="invert">
                                        <form action="{{ route('cardproductqty', $product->id) }}" method="post">
                                            @csrf
                                            <input type="number" name="qty" min="1" value="{{ $qty=$product->qty }}">
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-secondary btn-success ">Update</button>
                                        </form>
                                    </td>
                                    <td class="invert">{{ $total = $product->price * $product->qty }}</td>

                                    <td>
                                        <a href="#">
                                            <img src="{{ asset('product/' . $product->image) }}" alt=""
                                                class="img-responsive img-thumbnail" height="50px" width="50px">
                                        </a>
                                    </td>

                                    <td class="invert">
                                        <div class="rem">
                                            <a class="close1"
                                                href="{{ route('peoduct_delete_form_cart', $product->id) }}"></a>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $sum = $sum + $total;
                                $totalqty = $totalqty + $qty;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="checkout-left">
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            <li>Total <i>-</i> <span>${{$sum}}</span></li>
                          </ul>
                    </div>
                    <div class="col-md-8 address_form_agile">
                        <h4>Add a new Details</h4>
                        <form action="{{route("confirm_order")}}" method="post" class="creditly-card-form agileinfo_form">
                            @csrf
                            <input type="hidden" name="total_price" value="{{$sum}}">
                            <input type="hidden" name="total_qty" value="{{$totalqty}}">
                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Full name: </label>
                                            <input name="name" class="billing-address-name form-control" type="text" name="name"
                                                placeholder="Full name">
                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Mobile number:</label>
                                                    <input name="phone" class="form-control" type="number" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Email: </label>
                                                    <input name="email" class="form-control" type="email" placeholder="Landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address: </label>
                                            <textarea name="address" class="form-control" id="" cols="10" rows="3"></textarea>
                                        </div>

                                    </div>
                                    <button type="submit" class="submit check_out">Confirm</button>
                                </div>
                            </section>
                        </form>

                    </div>

                    <div class="clearfix"> </div>

                </div>

            </div>
            <!-- //about -->
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //banner -->
@endsection
