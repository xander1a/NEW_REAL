


@include('user_heading')


<!-- .,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, -->

<script src="https://cdn.tiny.cloud/1/3no8fac371enxmz8rgj9k7trcfcmo7o4vsvf5l6sxt8euzpo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@foreach($data as $registered)
<div class="container">
    
      <!--<form class="form-inline my-1 my-lg-0" action="property_search" method="post">-->
      <!--      @csrf-->
      <!--      <input type="text" name="query" placeholder="Search..." class="form-control mr-sm-2"-->
      <!--          id="datatable-search-input">-->
      <!--      <button class="btn btn-outline-success my-2 my-sm-0 btn-dark" type="submit">-->
      <!--          <strong class="text-dark">Search</strong>-->
      <!--      </button>-->
      <!--  </form>-->

  <p class="text-center">
  Your Acount has registered for free in <strong class="badge badge-danger">5 months</strong> </p> 
   
    
    
    
    
    
    

<div class="row justify-content-center">
     <!--<form class="form-inline my-2 my-lg-0" action="" method="post">-->
     <!--    @csrf-->
     <!--    <div class="form-group">-->
     <!--        <button class="btn btn-outline-success my-2 my-sm-0 btn-dark" type="button" name="post">You are not yet pay</button>-->
     <!--    </div>-->
     <!--</form>-->
 <!--     <form class="form-inline my-2 my-lg-0" action="data_get" method="post">-->
 <!--    @csrf-->
 <!--    <div class="form-group">-->
 <!-- <button class="btn btn-success my-2 my-sm-0" type="submit" name="first_name" value="{{ $registered->first_name }}">   Manage Posted Advert-->
 <!-- </button>-->
 <!--    </div>-->
 <!--</form>-->
</div>



<br>


    
    <div class="form-group ">
        
        
        
   <strong>  <p class="text-center">Post your Property</p>  </strong> 
        
       
        
        <form method="post" action="{{ url('property_insert') }}" enctype="multipart/form-data" class="form col-12">
    @csrf
 @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" placeholder="" value="{{$registered->first_name}}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" placeholder="" value="{{ $registered->last_name}}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Property Name</label>
        <input type="text" name="name" placeholder="Enter property name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <div class="input-group">
            <input type="number" name="price" placeholder="Enter price" class="form-control" required>
            <select name="currency" class="form-control" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">FRW</option>
                <!-- Add more currency options here -->
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <select class="form-control" name="address" id="address" required>
            <option value="Kigai-Kicukiro">Kigai-Kicukiro</option>
            <option value="Kigali-Nyarugenge">Kigali-Nyarugenge</option>
            <option value="Kigali-Gasabo">Kigali-Gasabo</option>
        </select>
    </div>

    <div class="form-group">
        <label for="village">Village</label>
        <input type="text" name="village" placeholder="village" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" name="type" id="type" required>
            <option value="Plot/Land">Plot/Land</option>
            <option value="Accommodation">Accommodation</option>
            <option value="Apartment">Apartment</option>
            <option value="Hotel">Hotel</option>
            <option value="Car">Car</option>
            <option value="House">House</option>
        </select>
    </div>

    <div class="form-group">
        <label for="advert">Advert</label>
        <select class="form-control" name="advert" id="advert" required>
            <option value="Sale">Sale</option>
            <option value="Rent">Rent</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="photos">Select photos</label>
        <input type="file" class="form-control input-lg" id="photos" name="file[]" required multiple>
        <div id="photoCount"></div>
        @error('photos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div id="imagePreview"></div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Upload Data</button>
    </div>
</form>


        
        
    </div>
    
</div>




@endforeach 







<script>
    document.getElementById("photos").addEventListener("change", function(event) {
        var imagePreview = document.getElementById("imagePreview");
        imagePreview.innerHTML = ""; // Clear previous previews

        for (var i = 0; i < event.target.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                img.style.maxWidth = "200px";
                img.style.marginRight = "10px";
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(event.target.files[i]);
        }

        document.getElementById("photoCount").textContent = event.target.files.length + " photo(s) selected";
    });
</script>




















