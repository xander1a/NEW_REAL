@include('head')
<!-- banner -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
<form action="customer" method="post" class="form">
    @csrf
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required>
    
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required>
    
    <label for="phone">Phone</label>
    <input type="tel" name="phone" id="phone" placeholder="Enter Phone" class="form-control" required>
    
    <label for="type">Who are you</label>
    <select class="form-control" name="type" id="type" required>
        <option value="Broker">Broker</option>
        <option value="Buyer">Buyer</option>
        <option value="Seller">Seller</option>
    </select>
    
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
    
    <br>
    <button type="submit" class="btn btn-success">Register</button>
</form>


                
        </div>
  
</div>
</div>
</div>
