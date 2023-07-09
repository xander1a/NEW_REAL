@include('user_heading')

<div class="container">
    @foreach($data as $user)
    
    <p>Dear <strong>{{ $user->first_name }} {{ $user->last_name }}</strong> Manage your Post
  <a href="#">  <button class="btn btn-success my-2 my-sm-0" >Back to Post
  </button></a> </p>
         @endforeach
<table class="table table-bordered">
    <thead>
        <th>Property name</th>
         <th>Price</th>
         <th>Currency</th>
          <th>Address</th>
           <th>Village</th>
            <th>Type</th>
            <th>Advert</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
             <th>Taken/Onmakert</th>
    </thead>
  <tbody>
@foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->price }}</td>
            <td>{{ $user->currency }}</td>
              <td>{{ $user->address }}</td>
                 <td>{{ $user->village }}</td>
                    <td>{{ $user->type }}</td> 
                    <td>{{ $user->advert }}</td>
                      <td>{{ $user->description }}</td>
                      
        <td>
                  <form class="form-inline my-2 my-lg-0" action="property_edit" method="post">
     @csrf
    
  <button class="btn btn-success my-2 my-sm-0" type="submit" name="update" value="{{ $user->first_name }}">  Update
  </button>
</form>
        </td>
        
        <td>
                           <form class="form-inline my-2 my-lg-0" action="data_get" method="post">
     @csrf
    
  <button class="btn btn-danger my-2 my-sm-0" type="button" name="delete" value="{{ $user->first_name }}">  Delete
  </button>
</form>   
        </td>
        
        
         
        <td>
                           <form class="form-inline my-2 my-lg-0" action="data_get" method="post">
     @csrf
    
  <button class="btn btn-warning my-2 my-sm-0" type="button" name="first_name" value="{{ $user->first_name }}">  On Market
  </button>
</form>   
        </td>
        </tr>
        @endforeach
</tbody>
</table>

</div>