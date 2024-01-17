<!DOCTYPE html>
<html>

<head>
    <title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home ::
        w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                 @include('frontend.includes.css')
    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->
 @include('frontend.includes.header')
    <!-- script-for sticky-nav -->

    <!-- //header -->
    <!-- banner -->
                  @yield('frontend_content')
    <!-- //fresh-vegetables -->
    <!-- newsletter -->
  @include('frontend.includes.newsletter')
    <!-- //newsletter -->
    <!-- footer -->
   @include('frontend.includes.footer')
    <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->
   @include('frontend.includes.js')
</body>

</html>
