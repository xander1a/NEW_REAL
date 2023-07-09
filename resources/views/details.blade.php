<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="{{ asset('images/rogo1.jpg') }}" type="image/icon type">
</head>
<body>

@include('user_heading')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
  </div>
</div>
<!-- banner -->

<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="hot-properties hidden-xs">
          <h4>Hot Properties</h4>
          @foreach ($hot as $photo)
            @php
              $array = json_decode($photo->photo_names);
            @endphp
            <div class="row">
              <div class="col-lg-4 col-sm-5">
                <img src="{{ asset('photos/' . $array[0]) }}" class="img-fluid" alt="properties" style="height: 50px; width: 100%;">
              </div>
              <div class="col-lg-8 col-sm-7">
                <h5><a>{{ $photo->name }}</a></h5>
                <p class="price">{{ $photo->currency }}{{ $photo->price }}</p>
                <form action="detail" method="post">
                  @csrf
                  <button class="btn btn-primary" type="submit" name="details" value="{{ $photo->id }}">Check</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>    
      </div>

      <div class="col-xl-9 col-lg-8 col-md-8 col-sm-6 col-12">
        @foreach($photos as $users)
          <h2>{{ $users->name }}</h2>
        @endforeach
        <div class="row">
          <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach($result[0] as $key => $res)
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
              </ol>
              <div class="carousel-inner">
                @foreach($result[0] as $key => $res)
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('photos/'.$res) }}" alt="" style="height: 300px; width: 450px;">
                  </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          @foreach($photos as $user)
           
            <div class="col-lg-4">
              <div class="col-lg-12 col-sm-6">
                <div class="property-info">
                  <p class="price">{{ $user->currency }} {{ $user->price }}</p>
                  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> {{ $user->address }}</p>
                  <div class="profile">
                    <span class="glyphicon glyphicon-user"></span> Agent Details
                    <p>{{ $user->first_name }}<br></p>
                  </div>
                </div>
                <h6><span class="glyphicon glyphicon-home"></span> Availability</h6>
                <div class="listing-detail">
                  <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> -->
                  <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> -->
                  <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> -->
                  <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> -->
                  {{ $user->description }}
                </div>
              </div>
            </div>
             @endforeach
         
          <div class="col-lg-12 col-sm-6">
            <div class="enquiry">
              <h6><span class="glyphicon glyphicon-envelope"></span> Request property</h6>
              <form role="form">
                <input type="text" class="form-control" placeholder="Full Name">
                <input type="text" class="form-control" placeholder="Enter your email">
                <input type="text" class="form-control" placeholder="Your Number">
                <textarea rows="6" class="form-control" placeholder="What's on your mind?"></textarea>
                <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('footer')

</body>
</html>
