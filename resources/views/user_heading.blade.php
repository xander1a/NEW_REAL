<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rwanda House & land Brokerage</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/script.js') }}"></script>
    
    
    <link rel="icon" href="{{ asset('images/rogo1.jpg') }}" type="image/icon type">

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
    
    
    <style>
    
     link[rel="icon"] {
        border-radius: 50%;
     }
   .dropdown-menu {
  min-width: 150px;
}

.dropdown-menu a {
  color: #333333;
}

.dropdown-menu a:hover {
  background-color: #f5f5f5;
}

.dropdown-divider {
  margin: 5px 0;
  border-top: 1px solid #e9ecef;
}

.btn-danger.dropdown-item {
  color: #ffffff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-danger.dropdown-item:hover {
  background-color: #c82333;
  border-color: #bd2130;
}

</style>
</head>


<body>
@foreach($data as $registered)
<!-- Header Starts -->
<div class="navbar-wrapper bg-dark text-light">
<!-- Nav Starts -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:black">
  <a class="navbar-brand" href="#">Rwanda House&Land</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-start" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     
      
     <form class="form-inline my-2 my-lg-0" action="user_home" method="post">
                  @csrf

               <button class="btn btn-outline-success my-2 my-sm-0 btn-black " type="submit" name="home" value="{{ $registered->first_name}}">
                Home </button>
              </form>
      <!--<a class="nav-item nav-link" href="regst">Post Property</a>-->
      
         <form class="form-inline my-2 my-lg-0" action="data_get" method="post">
                  @csrf

               <button class="btn btn-outline-success my-2 my-sm-0 btn-black " type="submit" name="first_name" value="{{ $registered->first_name}}">
                  Manage Propeerty </button>
              </form>
         <form class="form-inline my-2 my-lg-0" action="post_form" method="post">
                  @csrf

               <button class="btn btn-outline-success my-2 my-sm-0 btn-black " type="submit" name="first_name" value="{{ $registered->first_name}}">
                  Post Property  </button>
              </form>
          
          
    </div>
  </div>
</nav>




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
  <li>
    <form action="user_sale" method="POST">
      @csrf
      <input type="hidden" name="id" value="">
      <button type="submit" class="nav-link btn btn-link" name="user_sale" value="{{ $registered->id }}">
        <strong>ForSale</strong>
      </button>
    </form>
  </li>
  <li>
    <form action="user_rent" method="POST">
      @csrf
      <input type="hidden" name="id" value="">
      <button type="submit" class="nav-link btn btn-link" name="user_rent" value="{{ $registered->id }}">
        <strong>Rent</strong>
      </button>
    </form>
  </li>
  
  <li>

 
          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   {{ $registered->first_name}}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
 <a class="nav-item nav-link " href="/"><button class="btn btn-danger">Logout</button> </a>
    <!--<a class="dropdown-item" href="#">Another action</a>-->
    <!--<a class="dropdown-item" href="#">Something else here</a>-->
  </div>
</div>
  </li>
</ul>

</div>
<!-- #Header Starts -->
</div>
@endforeach