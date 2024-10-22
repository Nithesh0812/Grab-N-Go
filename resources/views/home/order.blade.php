<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELICIOUS EATS</title>
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
            margin-top: 30px
        }

    </style>
    @include('home.css')
</head>
<body>
@include('sweetalert::alert')
@include('home.header')

<!-- home section start -->
<section class="about" id="about" style="background-color: black;color: white;">
    <div class="table-container">
        <table class="table">
            <thead>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Section</th>
                <th>Pickup time</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            @foreach($order as $order)
    <tbody>
    <tr>
        <td data-label="Product Title">{{$order->product_title}}</td>
        <td data-label="Quantity">{{$order->quantity}}</td>
        <td data-label="Price">$.{{$order->price}}</td>
        <td data-label="Payment Status">{{$order->payment_status}}</td>
        <td data-label="Created At">
            <?php
                $createdAt = new DateTime($order->created_at);
                $createdAt->add(new DateInterval('PT30M')); // Add 30 minutes
                echo $createdAt->format('H:i'); // Format as HH:mm
            ?>
        </td>
        <td data-label="Delivery Status">{{$order->delivery_status}}</td>
        <td data-label="Image"><img style="width: 100px" src="product/{{$order->image}}"></td>
        <td>
            @if($order->delivery_status == 'delivered')
                <form action="/product_details" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$order->product_id}}">
                    <button style="border: none; color: black;" type="submit">Reorder</button>
                </form>
            @elseif($order->delivery_status == 'processing')
                <a onclick="return confirm('Are you sure you want to cancel this order?')" href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger">Cancel</a>
            @else
                <p style="color: red; text-decoration: line-through">Cancelled</p>
            @endif
        </td>
    </tr>
    </tbody>
@endforeach

        </table>
    </div>
</section>

@include('home.about')

@include('home.footer')
<!-- script-->
@include('home.script')

</body>
</html>
