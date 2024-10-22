<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>DELICIOUS EATS</title>
    @include('home.css')
    <!-- Additional CSS Files -->

</head>

<body>
@include('sweetalert::alert')
@include('home.header')
@include('home.slider')
@include('home.product')
<!-- teams section start -->

<!-- about section start -->
@include('home.about')




<!-- contact section start -->
@include('home.contact')

<!-- footer section start -->
@include('home.footer')




@include('home.script')


</body>
</html>

