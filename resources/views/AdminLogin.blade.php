@include('heading')





<div class="container">
    
    
  
  
  
<div class="text-center">
    <strong class="" style="color:green;">
  Register an account to post your advertisement with us at a low price.
    </strong>
</div>

  
  
  
  <br>
  <br>
  
  
  
  
  
  
  
  
  <div class="row bg-light text-center">
    <div class="col-sm-12 col-md-6">
      <div class="form-group">
        <strong ><p> Login to Your Account</p></strong>
         @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
        <form action="user_login" method="post" class="border border-rounded">
            @csrf
          <label>User name</label>
          <input type="text" name="first_name" class="form-control" placeholder="Enter first_name">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" class="form-control">
          <br>
          
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
     

    </div>
    <div class="col-sm-12 col-md-6">
      <div class="col form-group">
       <strong> <p>Register Your Acount For Free<p></strong>
         @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

 @if(session('success'))
    <div class="alert alert-success">
        {{ session('successs') }}
    </div>
@endif
        <form action="customer" method='post' class="border border-rounded">
          @csrf
          <label>First Name</label>
          <input type="text" name="first_name" class="form-control" placeholder="Enter Firstname">
          <label>Last Name</label>
          <input type="text" name="last_name" class="form-control" placeholder="Enter Lastname">
          <label>Email</label>
          <input type="email" name="email" placeholder="Enter Email" class="form-control">
          <label>Phone</label>
          <input type="tel" name="phone" placeholder="Enter phone" class="form-control">
          <label>Who are you</label>
         <select class="custom-select" name="type" id="address">
                                <option value="Broker">Broker</option>
                                  <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                              
                            </select>
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" class="form-control">
          <br>
         
          <button type="submit" class="btn btn-success">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<br>

@include('contact');
