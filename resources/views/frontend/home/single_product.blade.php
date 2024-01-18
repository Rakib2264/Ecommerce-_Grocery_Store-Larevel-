@extends('frontend.master')
@section('frontend_content')
<div class="products-breadcrumb">
<div class="container">
    <ul>
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('frontend')}}">Home</a><span>|</span></li>
        <li>Single Product</li>
    </ul>
</div>
</div>
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
                    <a href="{{route('category_product',$category->id)}}" >{{$category->name}}<span
                            class="caret"></span></a>
                    <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                        <div class="w3ls_vegetables">
                            <ul>
                                @foreach ($category->subcategories as $subcategory)
                                <li><a href="{{route('subcategory_product',$subcategory->id)}}">{{$subcategory->name}}</a></li>
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
    <div class="w3l_banner_nav_right_banner3">
        <h3>Best Deals For New Products<span class="blink_me"></span></h3>
    </div>
    <div class="agileinfo_single">
        <h5>{{$single_product->name}}</h5>
        <div class="col-md-4 agileinfo_single_left">
            <img id="example" src="{{asset('product/'.$single_product->image)}}" height="400" width="300" alt=" " class="img-responsive" />
        </div>
        <div class="col-md-8 agileinfo_single_right">
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked>
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <div class="w3agile_description">
                <h4>Description :</h4>
                <p>{{$single_product->short_des}}.</p>
            </div>
            <div class="snipcart-item block">
                <div class="snipcart-thumb agileinfo_single_right_snipcart">
                    <h4>${{$single_product->sale_price}} <span>${{$single_product->buy_price}}</span></h4>
                </div>
                <div class="snipcart-details agileinfo_single_right_details">

                    <form action="{{route("addtocart")}}" method="post">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                            <input type="hidden" name="price" value="{{ $single_product->sale_price }}">
                            <input type="hidden" name="name" value="{{ $single_product->name }}">
                            <input type="number" name="qty" value="1"  min="1"> <!-- Default quantity to 1, can be adjusted by the user -->
                            <input type="hidden" name="image" value="{{ $single_product->image }}">
                            <input type="submit" name="submit" value="Add to cart" class="button">
                        </fieldset>
                    </form>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection
