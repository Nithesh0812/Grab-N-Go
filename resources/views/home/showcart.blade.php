<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELICIOUS EATS</title>
    @include('home.css')
    <style>
        .table-container {
            max-width: 1400px; /* Adjust this value as needed */
            margin: 0 auto; /* Center the container horizontally */
        }
        .table-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100%; /* Make sure the container takes up the full height of the parent */
        }
        .stripe-button {
            display: inline-block;
            background-color: #6772e5;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .stripe-button:hover {
            background-color: #5469d4;
        }

    </style>
</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<section class="about" id="about" style="background-color: black;color: white">
    <div class="content-wrapper">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

            </div>
        @endif
        <div class="center" style="padding-top: 30px">
            <h4 class="h1dg">CHECKOUT PRODUCT INFORMATION</h4>
        </div>
        <!-- home section start -->
        <section class="about" id="about">
            <div class="table-container">
            <table style="width: 100%;text-align: center;align-items: center" class="table">
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php $totalprice=0; ?>
                @foreach($cart as $cart)
                    <tbody>
                    <tr>
                        <td data-label="Product title: ">{{$cart->product_title}}</td>
                        <td data-label="Product Quantity: ">{{$cart->quantity}}</td>
                        <td data-label="Price: ">$.{{$cart->price}}</td>
                        <td data-label="Image: "><img class="img" src="/product/{{$cart->image}}"></td>
                        <td data-label="Action: "><a onclick="return confirm('Are Sure You want to drop your product?')" href="{{url('clear_product',$cart->id)}}"><button  style="height: 37px" class="btn btn-danger">Remove</button></a> </td>
                    </tr>

                        <?php $totalprice =$totalprice+$cart->price ?>
                    @endforeach



                    </tbody>
            </table>
            </div>
            <div>
                <h5 style="text-align: center" >Total price: $.{{$totalprice}}</h5>

            </div>
            <div>
                <h5 style="text-align: center" > <a style="text-align: center" href="{{ url('/stripe/' . $totalprice) }}" class="stripe-button">
                        Pay with Stripe - ${{ number_format($totalprice, 2) }}
                    </a></h5>

            </div>



        </section>
    </div>
</section>
@include('home.about')




            <!-- footer section start -class="table"-->
            <!--script-->
@include('home.script')

</body>
</html>
@include('home.footer')
<style>
    .li_1{
        color: limegreen;
    }
</style>
