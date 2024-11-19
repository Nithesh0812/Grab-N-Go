<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRABNGO</title>
    @include('home.css')
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f7f8f8, #b7e7a3); /* Background gradient */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .cart-count {
            background-color: limegreen;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 1.2rem;
            color: white;
        }

        /* Main Content Styling */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 0;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Left Column (Product Image) */
        .column.left img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Right Column (Product Info) */
        .column.right {
            color: #fff;
            background-color: #000; /* Black background */
            flex: 1;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .column.right h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: white;
        }

        .column.right .price,
        .column.right .discount-price,
        .column.right .original-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: limegreen;
        }

        .column.right .original-price {
            color: red;
            text-decoration: line-through;
        }

        .column.right .quantity {
            margin: 15px 0;
            color: #fff;
        }

        .column.right .description {
            font-size: 1rem;
            margin: 15px 0;
            color: #ddd;
        }

        .column.right p {
            color: #bbb;
        }

        /* Form Styles */
        .order-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .order-form input[type="number"],
        .order-form input[type="submit"] {
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .order-form input[type="submit"] {
            background-color: limegreen;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .order-form input[type="submit"]:hover {
            background-color: darkgreen;
        }

        .order-form textarea {
            padding: 12px;
            font-size: 1rem;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            min-height: 120px;
            resize: none;
            background-color: #222;
            color: white;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .table-container {
                flex-direction: column;
                padding: 30px 20px;
            }

            .column.left,
            .column.right {
                max-width: 100%;
                flex: 1;
            }

            .navbar {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<!-- Navbar with Cart Count -->


<!-- Product Details Section -->
<section class="about" id="about">
    <div class="container">
        <h2 style="text-align:center; color: #333;">About Product</h2>
        <div class="about-content">
            <!-- Left Column (Product Image) -->
            <div class="column left">
                <img src="/product/{{$product->image}}" alt="Product Image">
            </div>

            <!-- Right Column (Product Info and Form) -->
            <div class="column right">
                <h2>{{$product->title}}</h2>

                @if($product->discount_price != null)
                    <h6 class="discount-price">Discount Price: $. {{$product->discount_price}}</h6>
                    <h6 class="original-price">Price: $. {{$product->price}}</h6>
                @else
                    <h6 class="price">Price: $. {{$product->price}}</h6>
                @endif

                <h6 class="quantity">Quantity Available: {{$product->quantity}}</h6>

                <p class="description">Description:<br>{{$product->description}}</p>
                <p style="color: limegreen;">Category: {{$product->category}}</p>

                <!-- Order Form -->
                <form action="{{url('add_cart', $product->id)}}" method="POST" class="order-form">
                    @csrf
                    <div>
                    <label for="time">Time:</label>
                        <select name="time" id="time" style="width: 60px;color: black ">
                            @foreach($times as $time)
                                <option style="width: 60px;color: black " value="{{ $time }}">{{ $time }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="quantity">Quantity</label>
                        <input style = "color:black" type="number" name="quantity" id="quantity" value="1" min="1" required>
                    </div>

                    <!-- Textarea for user note -->
                    <div>
                        <label for="note">Special Instructions / Notes (Optional)</label>
                        <textarea name="note" id="note" placeholder="Leave a note for us..."></textarea>
                    </div>

                    <input type="submit" value="Add To Cart">
                </form>
            </div>
        </div>
    </div>
</section>

@include('home.about')
@include('home.script')

</body>
</html>

@include('home.footer')
