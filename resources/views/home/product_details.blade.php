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

    </style>
</head>
<body>
@include('sweetalert::alert')
@include('home.header')


<!-- home section start -->
<section class="about" id="about" style="background-color: black;">
    <div class="max-width">
        <h2 style = "text-align:center;paddding-top:200px">About Product </h2>
        <div class="about-content">
            <div class="column left">
                <img src="/product/{{$product->image}}" alt="">
            </div>

            <div class="column right">
                <div style="color: white" class="text">{{$product->title}} <span class="typing-2"></span></div>
                <div class="text">
                    @if($product ->discount_price!=null)
                        <h6 style="margin: 10px;color:limegreen">
                            Discount Price  :
                            $. {{$product->discount_price}}
                        </h6>
                        <h6 style="color: red; text-decoration: line-through"><
                            Price
                            <!-- <br> -->
                            $. {{$product->price}}
                        </h6>
                    @else
                        <h6> $. {{$product->price}}</h6>

                </div>
                @endif

                <h6 style="color: limegreen;margin: 20px">
                    QUANTITY:
                    {{$product->quantity}}
                </h6>
                <p style="margin: 20px; font-size: 1.2rem; color: white">
                    DESCRIPTION:<br>
                    {{$product->description}}
                </p>
                <p style="color: limegreen;margin: 20px">
                    CATEGORY:
                    {{$product->catagory}}
                </p>



                <form action="{{url('add_cart',$product->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col col-md-4"> <input type="number" name="quantity" value="1" min="1" style="width: 100px; color: black"></div>
                        <div class="col col-md-4"><input type="submit" value="Add To Cart"></div>
                    </div>
                </form>

            </div>
        </div>
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
