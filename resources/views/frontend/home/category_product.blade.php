@extends('frontend.master')

@section('frontend_content')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('frontend')}}">Home</a><span>|</span></li>
            <li>Category</li>
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
                    <a href="{{route('category_product',$category->slug)}}" >{{$category->name}}<span
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
</div>
<div class="clearfix"></div>
<div class="agileinfo_single"></div>
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
    <div class="container">
        <h3>Popular Brands</h3>
            <div class="w3ls_w3l_banner_nav_right_grid1">
                @foreach ($categoryproducts as $category)
                @foreach ($category->products as $product)
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                    <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <img src="{{asset('frontend')}}/images/offer.png" alt=" " class="img-responsive">
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="{{route('single_product',$product->slug)}}"><img height="140" width="140" src="{{asset("product/".$product->image)}}" alt=" " class="img-responsive"></a>
                                        <p>{{$product->name}}</p>
                                        <h4>${{$product->sale_price}} <span>${{$product->buy_price}}</span></h4>
                                    </div>
                                    <div class="snipcart-details">
                                        <form action="{{route("addtocart")}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="{{ $product->sale_price }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="qty" value="1"> <!-- Default quantity to 1, can be adjusted by the user -->
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                                <input type="submit" name="submit" value="Add to cart" class="button">
                                            </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            @endforeach



                <div class="clearfix"> </div>
            </div>


    </div>
</div>
@endsection
