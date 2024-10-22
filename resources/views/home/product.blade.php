<!-- product section -->
<section class="product_section layout_padding" style="background-color: black">
    <div class="container">
    <div class="button-container">
    <div class="button-container">
    @if (is_null($universityValue))
        <a href="/product_search?_token={{ csrf_token() }}&search=burger+king" class="button burger-king">BURGER KING</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=chick-fil-a" class="button chick-fil-a">CHICK FIL A</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=starbucks" class="button starbucks">STARBUCKS</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=basic" class="button basic">BASIC</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=fuzzys" class="button fuzzys">FUZZYS</a>

    @elseif ($universityValue === 'Discovery Park Campus')
        <a href="/product_search?_token={{ csrf_token() }}&search=basic" class="button basic">BASIC</a>
    @elseif ($universityValue === 'UNT Main Campus')
        <a href="/product_search?_token={{ csrf_token() }}&search=burger+king" class="button burger-king">BURGER KING</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=chick-fil-a" class="button chick-fil-a">CHICK FIL A</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=starbucks" class="button starbucks">STARBUCKS</a>
        <a href="/product_search?_token={{ csrf_token() }}&search=fuzzys" class="button fuzzys">FUZZYS</a>
    @endif
</div>

</div>


        <div class="heading_container heading_center">
            <h4>
                Available products
            </h4>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
            <div>
            </div>
        </div>
        <div class="search-container">
            <form action="{{url('product_search')}}" method="GET">
                @csrf
                <div class="custom-input-container">
                    <input type="text" name="search" placeholder="Search Products">
                    <button style="background-color: gray;color: whitesmoke; height: 35px;border-radius: 50px" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($product as $products)
            <div style="background-color:black " class="col-sm-6 col-md-4 col-lg-4">
                <div  style="border: none;background-color: #313131" class="box">
                    <div  class="option_container">
                        <div class="options">
                            <form action="/product_details" method="post">
                                @csrf
                                <input style="display: none" name= "product_id" value="{{$products->id}}">
                                <button style="border: none"  type="submit">     <a class="option1" >

                                        Product Detail </a></button>
                            </form>

                            @if($products->play !== null)
{{--                                <audio controls>--}}
{{--                                    <source src="{{ $products->play }}" type="audio/mp3">--}}
{{--                                </audio>--}}
                            @endif
                            <form action="{{url('add_cart',$products->id)}}" method="POST">
                               @csrf
                               <div class="row">
                                   <div class="col col-md-4"> <input type="number" name="quantity" value="1" min="1" style="width: 100px; color: black"></div>
                                   <div class="col col-md-4"><input type="submit" value="Add To Cart"></div>
                               </div>
                           </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5 STYLE="color: white">
                            {{$products->title}}
                        </h5>
                        <br>
                        @if($products ->discount_price!=null)
                        <h6  style="margin: 10px;color: green;display:none">
                            Discount Price
                            ${{$products->discount_price}}
                        </h6>

                            <h6 style="color: white">
                                Price
                                <br>
                                ${{$products->price}}
                            </h6>
                        @else
                        <h6>
                            Price
                            <br>
                            ${{$products->price}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            
    </div>
    <span style="padding-top: 20px">
                {!! $product ->appends(Request::all())->links() !!}
            </span>
    </div>
</section>
<!-- end product section -->
<style>
    .search-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .custom-input-container {
        display: flex;
    }

    input[type="text"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-right: none;
        border-radius: 4px 0 0 4px;
    }

    .custom-search-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 0 4px 4px 0;
        cursor: pointer;
        height: 42px;
    }

    .custom-search-button:hover {
        background-color: #45a049;
    }

    .custom-search-button:focus {
        outline: none;
    }

</style>
