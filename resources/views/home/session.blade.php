<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>DELICIOUS EATS</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    @include('home.css')
    <!-- Additional CSS Files -->
    <!-- Bootstrap core CSS -->


</head>

<body>
@include('sweetalert::alert')
@include('home.header')



<div class="more-info reservation-info">
    <div class="container">
        <div style="height: 129px" class="row">
        </div>
    </div>
</div>

<div class="reservation-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form id="reservation-form" name="gs" act method="post" role="search" action="{{url('book')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Book your <em> studio</em> session <em> below</em></h4>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <label for="Name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="Name" placeholder="Artist name" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <label for="Number" class="form-label">Your Phone Number</label>
                                <input style="color: black" type="text" name="Number" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <label for="chooseGuests" class="form-label">Number Of Artists</label>
                                <select style="color: black" name="artists" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                                    <option selected>ex. 3 or 4 or 5</option>
                                    <option style="color: black" type="checkbox" name="option1" value="1">1</option>
                                    <option style="color: black"  value="2">2</option>
                                    <option style="color: black" value="3">3</option>
                                    <option style="color: black" value="4+">4+</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <label for="Number" class="form-label">Check In Date</label>
                                <input type="date" name="date" class="date" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <label for="Number" class="form-label">Check In Time</label>
                                <input type="time" name="time" class="date" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="chooseDestination" class="form-label">Booking price </label>
                               <input disabled style="color: black" type="text" value=" $: 1500  paid on arrival">
                            </fieldset>
                        </div>
                        <label class="form-label">Mpesa Message</label>
                        <textarea tabindex="0" aria-label="Leave message" role="textbox" name="mpesa" style="padding-top: 100px ;  color: black" placeholder="Enter mpesa payment cofirmations of the 1500 booking fee message"></textarea>
                        <div class="col-lg-12">
                            <fieldset>
                                <button class="main-button">Confim booking </button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="more-info reservation-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="info-item">
                    <i class="fa fa-phone"></i>
                    <h4>Make a Phone Call</h4>
                    <a href="#">+254 796805067</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="info-item">
                    <i class="fa fa-envelope"></i>
                    <h4>Contact Us via Email</h4>
                    <a href="#">stopanarchy.co.ke</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="info-item">
                    <i class="fa fa-map-marker"></i>
                    <h4>Visit Our Studio</h4>
                    <a href="#">Rurii Githurai 44</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- footer section start -->
@include('home.footer')




@include('home.script')


</body>
</html>

