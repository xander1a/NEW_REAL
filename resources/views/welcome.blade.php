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
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
      <div class="col-lg-6 col-sm-6">
  <form action="{{ route('searchProperties') }}" method="GET">
    <input type="text" name="search" class="form-control" placeholder="Search for Properties">
    <div class="row">
      <div class="col-lg-3 col-sm-3">
        <select name="type" class="form-control">
          <option value="">All</option>
          <option value="buy">Buy</option>
          <option value="rent">Rent</option>
          <option value="sale">Sale</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-4">
        <select name="price" class="form-control">
          <option value="">Price</option>
          <option value="150000-200000">$150,000 - $200,000</option>
          <option value="200000-250000">$200,000 - $250,000</option>
          <option value="250000-300000">$250,000 - $300,000</option>
          <option value="300000-above">$300,000 - above</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-4">
        <select name="property" class="form-control">
          <option value="">Property</option>
          <option value="apartment">Apartment</option>
          <option value="building">Building</option>
          <option value="office">Office Space</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-4">
        <button type="submit" class="btn btn-success">Find Now</button>
      </div>
    </div>
  </form>


          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>      
            <button type="submit" class="btn btn-info"  onclick="window.location.href='regst'">Join Now</button></div>
      </div>
    </div>
  </div>
</div>

<div class="container">
 <!-- banner -->
<!--<div class="inside-banner">-->
<!--  <div class="container"> -->
<!--    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>-->
<!--    <h2>Buy, Sale & Rent</h2>-->
<!--</div>-->
<!--</div>-->
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <!--<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>-->
  <!--  <input type="text" class="form-control" placeholder="Search of Properties">-->
  <!--  <div class="row">-->
  <!--          <div class="col-lg-5">-->
  <!--            <select class="form-control">-->
               
  <!--              <option>For Rent</option>-->
  <!--              <option>For Sale</option>-->
  <!--            </select>-->
  <!--          </div>-->
  <!--          <div class="col-lg-7">-->
  <!--            <select class="form-control">-->
  <!--              <option>Price</option>-->
  <!--              <option>$150,000 - $200,000</option>-->
  <!--              <option>$200,000 - $250,000</option>-->
  <!--              <option>$250,000 - $300,000</option>-->
  <!--              <option>$300,000 - above</option>-->
  <!--            </select>-->
  <!--          </div>-->
  <!--        </div>-->

  <!--        <div class="row">-->
  <!--        <div class="col-lg-12">-->
  <!--            <select class="form-control">-->
  <!--              <option>Property Type</option>-->
  <!--              <option>Apartment</option>-->
  <!--              <option>House</option>-->
  <!--              <option>Plot</option>-->
  <!--              <option>Office Space</option>-->
  <!--            </select>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        <button class="btn btn-primary">Find Now</button>-->

  <!--</div>-->



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>

 @foreach ($hot as $photo)
    @php
        $array = json_decode($photo->photo_names);
    @endphp
    <div class="row">
        <div class="col-lg-4 col-sm-5">
            <img src="{{ asset('photos/' . $array[0]) }}" style="height:50px;width:100%;" class="img-fluid" alt="properties">
        </div>
        <div class="col-lg-8 col-sm-7">
            <h5><a >{{ $photo->name }}</a></h5>
            <p class="price">{{ $photo->currency }}{{ $photo->price }}            
            <form action="detail" method="post">
           @csrf
         <button class="btn btn-primary" type="submit" name="details"value="{{ $photo->id }}">Check</button>
         </form></p>
            <br>

        </div>
 </div>
@endforeach


             
              
              
<div class="row">
                <!--<div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>-->
                <!--<div class="col-lg-8 col-sm-7">-->
                <!--  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>-->
                <!--  <p class="price">$300,000</p> </div>-->
              </div>

<div class="row">
                <!--<div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>-->
                <!--<div class="col-lg-8 col-sm-7">-->
                <!--  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>-->
                <!--  <p class="price">$300,000</p> </div>-->
              </div>

<div class="row">
                <!--<div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>-->
                <!--<div class="col-lg-8 col-sm-7">-->
                <!--  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>-->
                <!--  <p class="price">$300,000</p> </div>-->
              </div>

</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!--<div class="pull-left result">Showing: 12 of 100 </div>-->
<!--  <div class="pull-right">-->
<!--  <select class="form-control">-->
<!--  <option>Sort by</option>-->
<!--  <option>Price: Low to High</option>-->
<!--  <option>Price: High to Low</option>-->
<!--</select></div>-->

</div>
<div class="row">
  @foreach ($photos as $photo)
                 @php
                   $id = $photo->id;
                   $array = json_decode($photo->photo_names);
                 @endphp
     <!-- properties -->
     <div class="col-lg-4 col-md-6 col-sm-12">
  <div class="properties">
    <div class="image-holder">
      <img src="{{ asset('photos/' . $array[0]) }}" style="height:200px;width:100%;" class="img-fluid" alt="properties">
      <div class="status sold">Available</div>
    </div>
    <h4><a >{{ $photo->name }}</a></h4>
    <p class="price">
      <strong>Price:</strong> <strong class="text-success">{{ $photo->currency }}</strong> {{ $photo->price }}
    </p>
    <p>
      <strong>Location:</strong> {{ $photo->address }}
    </p>
    <div class="listing-detail">
      <!-- Add your listing details here -->
    </div>
    <form action="detail" method="post">
         @csrf
    <button class="btn btn-primary" type="submit" name="details"value="{{ $photo->id }}">View Details</button>
    </form>
  </div>
</div>

      
        @endforeach
     
      </div>
      <!-- properties -->
<!--      <div class="center">-->
<!--<ul class="pagination">-->
<!--          <li><a href="#">«</a></li>-->
<!--          <li><a href="#">1</a></li>-->
<!--          <li><a href="#">2</a></li>-->
<!--          <li><a href="#">3</a></li>-->
<!--          <li><a href="#">4</a></li>-->
<!--          <li><a href="#">5</a></li>-->
<!--          <li><a href="#">»</a></li>-->
<!--        </ul>-->
<!--</div>-->

</div>
</div>
</div>
</div>
</div>




@include('footer');