<div class="container-fluid bg-dark text-center">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3 bg-dark text-light mb-4">
      <p class="text-center"><strong class="badge badge-success">Contact us</strong></p>
      <ul class="list-unstyled">
        <li><strong>Address:</strong> Kigali- Kinyinya-Gacuriro</li>
        <li><strong>Phone:</strong> 0783156849 / 0791499646</li>
        <li><strong>Email:</strong> rawndahouseland@gmail.com</li>
      </ul>
      <span class="text-center">
        <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
        <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="wp"><i class="fab fa-whatsapp"></i></a>
      </span>
    </div>

    <div class="col-12 col-md-6 col-lg-3 bg-dark mb-4 text-light">
      <p class="text-center"><strong class="badge badge-success">Give us an idea</strong></p>
   <form action="/submit-form" method="POST">
    @csrf

  

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

  

    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>

    <div class="col-12 col-md-6 col-lg-3 bg-dark mb-4 text-light">
      <p class="text-center"><strong class="badge badge-success">Property Type</strong></p>
      <ul class="list-unstyled">
        <li>Commercial</li>
        <li>House</li>
        <li>Apartment</li>
        <li>Shop</li>
        <li>Residential</li>
        <li>Office</li>
        <li>Plot</li>
        <li>Land</li>
      </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-3 bg-dark mb-4 text-light">
      <p class="text-center"><strong class="badge badge-success">Our Services</strong></p>
      <ul class="list-unstyled">
        <li>Sell Property</li>
        <li>Rent Property</li>
        <li>Advertisement</li>
      </ul>
    </div>
  </div>
</div>
