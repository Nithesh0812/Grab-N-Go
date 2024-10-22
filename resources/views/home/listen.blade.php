<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELICIOUS EATS</title>
    @include('home.css')



</head>
<body>
@include('home.header')

<!-- home section start -->
<section class="about" id="about" style="background-color: black;">
    <div class="max-width">
        <h2 class="title">About Product </h2>
        <div class="about-content">
            <div class="column left">
                <img src="/product/{{$product->image}}" alt="">
            </div>
            <div class="column right">
                <div style="color: white" class="text">{{$product->title}} <span class="typing-2"></span></div>
                <div style="color: white" class="text">{{$product->play}} <span class="typing-2"></span></div>
                <div class="text">
                    @if($product ->discount_price!=null)
                        <h6 style="margin: 10px;color:limegreen">
                            Discount Price  :
                            $. <button class="btn btn-success">{{$product->discount_price}}</button>
                        </h6>
                        <h6 style="color: red; text-decoration: line-through"><
                            Price
                            <br>
                            $. {{$product->price}}
                        </h6>
                    @else
                        <h6> 4. {{$product->price}}</h6>

                </div>
                @endif
                <p style="margin: 20px; font-size: 1.2rem; color: white">
                    DESCRIPTION:<br>
                    {{$product->description}}CA
                </p>

                <p style="color: limegreen;margin: 20px">
                    CATEGORY:
                    {{$product->catagory}}
                </p>
                <h6 style="color: limegreen;margin: 20px">
                    QUANTITY:
                    {{$product->quantity}}
                </h6>



                <form action="{{url('add_cart',$product->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col col-md-4"> <input type="number" name="quantity" value="1" min="1" style="width: 100px"></div>
                        <div class="col col-md-4"><input type="submit" value="Add To Cart"></div>
                    </div>
                </form>
                <div>
                    <h2>Or</h2>
                </div>
                <div>
                    <button class="btn btn-success">CHECK OUT</button>

                </div>
                </div>
        </div>
    </div>
</section>

</div>
</section>

<!-- about section start -->

<!-- services section start -->

<!-- teams section start -->

<!-- contact section start -->

<!-- footer section start -->
@include('home.footer')
<!-- script-->
@include('home.script')

</body>
</html>
