@include('user_heading')
 
 
 <div class="container">
     
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
     
 @foreach($data as $user)
 
 <p class="text-center text-success">Update Your Data</p>
 


     @php
        $array = json_decode($user->photo_names);
    @endphp
    <div class="row">
        <div class="col-lg-4 col-sm-5">
            <img src="{{ asset('photos/' . $array[0]) }}" style="height:250px;width:100%;" class="img-fluid" alt="properties">
        </div>

<form method="post" action="{{ route('property.update', ['propertyId' => $user->id]) }}" enctype="multipart/form-data" class="form border col-12">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Property Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <div class="input-group">
            <input type="number" name="price" value="{{ $user->price }}" class="form-control">
            <select name="currency" class="form-control">
                <option value="USD" {{ $user->currency == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ $user->currency == 'EUR' ? 'selected' : '' }}>EUR</option>
                <option value="GBP" {{ $user->currency == 'GBP' ? 'selected' : '' }}>FRW</option>
                <!-- Add more currency options here -->
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <select class="form-control" name="address" id="address">
            <option value="Kigai-Kicukiro" {{ $user->address == 'Kigai-Kicukiro' ? 'selected' : '' }}>Kigai-Kicukiro</option>
            <option value="Kigali-Nyarugenge" {{ $user->address == 'Kigali-Nyarugenge' ? 'selected' : '' }}>Kigali-Nyarugenge</option>
            <option value="Kigali-Gasabo" {{ $user->address == 'Kigali-Gasabo' ? 'selected' : '' }}>Kigali-Gasabo</option>
        </select>
    </div>

    <div class="form-group">
        <label for="village">Village</label>
        <input type="text" name="village" value="{{ $user->village }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" name="type" id="type">
            <option value="Plot/Land" {{ $user->type == 'Plot/Land' ? 'selected' : '' }}>Plot/Land</option>
            <option value="Accommodation" {{ $user->type == 'Accommodation' ? 'selected' : '' }}>Accommodation</option>
            <option value="Apartment" {{ $user->type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
            <option value="Hotel" {{ $user->type == 'Hotel' ? 'selected' : '' }}>Hotel</option>
            <option value="Car" {{ $user->type == 'Car' ? 'selected' : '' }}>Car</option>
            <option value="House" {{ $user->type == 'House' ? 'selected' : '' }}>House</option>
        </select>
    </div>

    <div class="form-group">
        <label for="advert">Advert</label>
        <select class="form-control" name="advert" id="advert">
            <option value="Sale" {{ $user->advert == 'Sale' ? 'selected' : '' }}>Sale</option>
            <option value="Rent" {{ $user->advert == 'Rent' ? 'selected' : '' }}>Rent</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="5">{{ $user->description }}</textarea>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>

                         @endforeach
                         
                         </div>