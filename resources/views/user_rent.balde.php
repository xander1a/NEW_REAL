@include('user_heading')

<div style="margin-top: auto%">
    <div class="container ">
        <div class="" style="height: 100%; width:100%">
               {{-- <img src="{{ asset('storage/photos/download.jpg') }}" alt="Image Name" class="rounded"> --}}

               <div id="card-slider-carousel" class="carousel slide" data-ride="carousel" style="width: 100%">
                   <div class="carousel-inner">
                    @foreach ($results as $index => $photo)
                    @php
                      $id=$photo->id;
                      $array = json_decode($photo->photo_names);
                      $active = ($index == 0) ? 'active' : '';
                    @endphp
                       <div class="card carousel-item {{ $active }}">
                         <div class="row bg">
                           <div class="text-center " style="background: radial-gradient(circle, rg(232, 238, 233), rgb(41, 79, 184)); width:100%; height:50%;">
                               <div class="row">
                                   <div class="col">
                                    <img class="card-img-top" src="{{ asset('photos/' . $array[0]) }}" alt="" style="height:200px;whidth:200px">
                                   </div>



                             <div class="col-md-7">
                               <p>
                                 <strong style="color: green">{{ $name = $photo->name }}</strong><br>
                                 <strong class="badge badge-success">{{ $photo->property_type }}</strong>
                                 {{-- <strong>Bedroom:</strong>{{ $photo->bedroom }}<br>
                                 <strong>Bathroom:</strong>{{ $photo->bathroom }} --}}
                                 <strong>Price:</strong><strong style="color: rgb(226, 187, 11)">{{ $photo->price }} <strong>{{ $photo->currency }}</strong></strong><br>
                                 <strong class="">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
         <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
         <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
       </svg>
                                   Location:</strong>{{ $photo->address }}
                               </p>
                               <p>
                                <form method="post" action="{{ url('detail') }}">
                                    @csrf
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-btn-{{ $photo->id }}">Get in Touch</button>
                                    <button type="submit" name="dd" value="{{ $data = $photo->name }}" class="btn btn-primary">More Details</button>
                                  </form>
                               </p>
                           </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     @endforeach
                   </div>
                   <a class="carousel-control-prev" href="#card-slider-carousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#card-slider-carousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                   </a>
                </div>
            </div>
           </div>
          </div>
         </div>
        </div>

       <br><br>
       <div class="container">
         <div class="row">
           @foreach ($results as $photo)
             @php
               $id = $photo->id;
               $array = json_decode($photo->photo_names);
             @endphp

             <div class="col-12 col-md-6 col-lg-4 mb-4">
               <div class="card">
                <img class="card-img-top" src="{{ asset('photos/' . $array[0]) }}" alt="">
                 <div class="card-body">
                   <h5 class="card-title text-success">{{ $photo->name }}</h5>
                   <p class="card-text">
                     <strong>Property Type:</strong><strong class=" badge badge-danger"> {{ $photo->type }}</strong><br>
                     {{-- <strong>Bedroom:</strong> {{ $photo->bedroom }}<br>
                     <strong>Bathroom:</strong> {{ $photo->bathroom }}<br> --}}
                     <strong>Price:</strong> <span style="color: rgb(226, 187, 11)">{{ $photo->price }} <strong>{{ $photo->currency }}</strong></span><br>
                     <strong>Location:</strong> {{ $photo->address }} <br>
                     <strong>Advert Type:</strong> <strong class=" badge badge-success">{{ $photo->advert }}</strong>
                   </p>
                   <form method="post" action="{{ url('detail') }}">
                                    @csrf
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-btn-{{ $photo->id }}">Get in Touch</button>
                                    <button type="submit" name="dd" value="{{ $data = $photo->name }}" class="btn btn-primary">More Details</button>
                                  </form>
                 </div>
               </div>
             </div>
           @endforeach
        </div>


    {{-- wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww --}}

    </div>




    @foreach ($results as $photo)
    <div class="modal fade" id="edit-btn-{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Request</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

     <form method="post" action="{{ url('requests') }}" style="width: 100%">
        @csrf
        <div class="form-group " >

            <label for="">Full Name</label>
            <input type="text" name="name" placeholder="Enter your name" class="form-control">
            <br>

            <label for="price"> Email</label>
            <input type="email" name="email" placeholder="Enter Email" class="form-control">
            <br>
            <label for="price"> Phone</label>
            <input type="phone" name="phone" placeholder="Inter Phonr Number" class="form-control">
            <br>
            <label for="price"> Property</label>


            <input type="phone" name="property_name" placeholder="" value="{{ $photo->name}}" class="form-control">

            <br>

            <button type="submit" class="btn btn-primary">Request</button>
    </form>




            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-denger" data-dismiss="modal">Close</button>
c
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

@include('contact')
