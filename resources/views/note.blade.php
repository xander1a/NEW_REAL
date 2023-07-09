@include('head')

<div class="">
    

           <div id="slider" class="sl-slider-wrapper">
  <div class="sl-slider">
    @foreach ($photos as $photo)
    @php
    $id = $photo->id;
    $array = json_decode($photo->photo_names);
    @endphp
    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
      <div class="sl-slide-inner">
        <div class="bg-img bg-img-1"></div>
        <h2><a href="#">{{ $photo->name }}</a></h2>
        <blockquote>
          <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{ $photo->address }}</p>
          <p></p>
          <cite>{{ $photo->currency }} {{ $photo->price }}</cite>
        </blockquote>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
     banner 
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Property</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Find Now</button>
              </div>
          </div>
          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>        </div>
      </div>
    </div>
  </div>
</div>
 banner 
<div class="container">
  <div class="properties-listing spacer"> <a href="listed" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
         @foreach ($photos as $photo)
                 @php
                   $id = $photo->id;
                   $array = json_decode($photo->photo_names);
                 @endphp
      <div class="properties">
  <div class="image-holder">
    <img src="{{ asset('photos/' . $array[0]) }}"  style=" height: 200px;width: 100%;
  object-fit: cover;" class="img-responsive property-image" alt="properties" />
    <div class="status sold">Sold</div>
  </div>
  <h4><a href="property-detail.php">{{ $photo->name }}</a></h4>
  <p class="price">Price: {{ $photo->price }} {{ $photo->currency }}</p>
  <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span>
  </div>
  <a class="btn btn-primary" href="property-detail.php">View Details</a>
</div>

      
      @endforeach
     
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Learn More</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
  <h3>Recommended Properties</h3>
  <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
      @foreach ($photos as $key => $photo)
      <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
      @endforeach
    </ol>
     Carousel items 
    <div class="carousel-inner">
      @foreach ($photos as $key => $photo)
      @php
      $id = $photo->id;
      $array = json_decode($photo->photo_names);
      @endphp
      <div class="item{{ $key === 0 ? ' active' : '' }}">
        <div class="row">
          <div class="col-lg-4"><img src="{{ asset('photos/' . $array[0]) }}" class="img-responsive" alt="properties" /></div>
          <div class="col-lg-8">
            <h5><a href="property-detail.php">{{ $photo->name }}</a></h5>
            <p class="price">{{ $photo->price }} {{ $photo->currency }}</p>
            <a href="property-detail.php" class="more">More Detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
</div>
     
</div>


@include('footer');