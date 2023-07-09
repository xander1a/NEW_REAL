<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rwanda House & land Brokerage</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/script.js') }}"></script>

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.theme.css') }}">
    <script src="{{ asset('assets/owl-carousel/owl.carousel.js') }}"></script>
    <!-- Owl stylesheet -->

    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slitslider/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slitslider/css/custom.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/slitslider/js/jquery.slitslider.js') }}"></script>
    <!-- slitslider -->
</head>


<body>
@foreach($data as $registered)
<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Agents</a></li>         
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
                 <li><a href="#"> {{ $registered->last_name }}t</a></li>
                
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/rogo1.jpg" alt="Realestate"></a>

              <ul class="pull-right">
                <li> <form action="user_home" method="POST">
    @csrf
    <input type="hidden" name="id" value="">
      <button type="submit" class="nav-link btn btn-link" name="home" value="{{ $registered->first_name }} "><strong>Buy</strong></button>
</form></li>
                <li><a href="buysalerent.php">Sale</a></li>         
                <li><a href="buysalerent.php">Rent</a></li>
                  <li><a href="#"> {{ $registered->last_name }}t</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>
@endforeach