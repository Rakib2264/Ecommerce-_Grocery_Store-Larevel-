<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .w3l_header_right {
        float: right;
        margin-right: 20px;
    }

    .w3l_header_right button {
        color: #352f2f;
        margin: 0 10px;
        text-decoration: none;
        font-weight: bold;
    }

    .w3l_header_right button:hover {
        color: #0c0b0b;
    }

    .w3l_header_right a {
        color: #dfbebe;
        margin: 0 10px;
        text-decoration: none;
        font-weight: bold;
    }

    .w3l_header_right a:hover {
        color: #f1e7e7;
    }
</style>
<div class="agileits_header">
    <div class="w3l_offers">
        <a href="products.html">Today's special Offers !</a>
    </div>
    <div class="w3l_search">
        <form action="#" method="post">
            <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';"
                onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>
    <div class="product_list_header">
             <fieldset>
                <button  class="button"><a href="{{route('checkout')}}">View your cart : {{count($carts)}} </a></button>
            </fieldset>
     </div>
    <div class="w3l_header_right">

        <div class="header">

            <div class="w3l_header_right">
                @if (Auth::check())
                <form action="{{ route("logout") }}" method="post">
                    @csrf
                    <button>Logout</button>
                </form>


                @elseif (Auth::check()==null)
                <a href="{{route("login")}}">Login</a>
                <a href="{{route("register")}}">Sign Up</a>
                @endif

            </div>
        </div>
        {{-- <a href="login.html">Login</a>
        <a href="login.html">Sign Up</a>
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"
                        aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login.html">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul> --}}
    </div>
    {{-- <div class="w3l_header_right1">
        <h2><a href="mail.html">Contact Us</a></h2>
    </div> --}}
    <div class="clearfix"> </div>
</div>
<script>
    $(document).ready(function() {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function() {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{route('frontend')}}"><span>Grocery</span> Store</a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="events.html">Events</a><i>/</i></li>
                <li><a href="about.html">About Us</a><i>/</i></li>
                <li><a href="products.html">Best Deals</a><i>/</i></li>
                <li><a href="services.html">Services</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a
                        href="mailto:store@grocery.com">store@grocery.com<a/a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>


