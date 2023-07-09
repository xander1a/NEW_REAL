<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rwanda House Land Brokerage</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include TinyMCE JavaScript -->
    <script src="{{ asset('path/to/tinymce/tinymce.min.js') }}"></script>

    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor | removeformat',
            menubar: false
        });
    </script>

    <script>
        function execCommand(command) {
            document.execCommand(command, false, null);
        }

        function updateTextArea() {
            const content = document.querySelector('.content');
            const textarea = document.querySelector('#text-input');
            textarea.value = content.innerHTML;
        }

        // Save the formatted text when the form is submitted
        const form = document.querySelector('form');
        form.addEventListener('submit', updateTextArea);
    </script>

    <!-- Include TinyMCE CSS -->
    <link rel="stylesheet" href="{{ asset('path/to/tinymce/skins/ui/oxide/skin.min.css') }}">

    <style>
        .upload-container {
            position: relative;
            display: inline-block;
        }

        .custom-upload-button {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .custom-upload-button img {
            width: 30px; /* Adjust the size of the logo as needed */
            height: 30px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .custom-upload-button span {
            vertical-align: middle;
        }

        /* Hide the default file input button */
        input[type="file"] {
            display: none;
        }

        .toolbar {
            padding: 10px;
        }

        .content {
            border: 1px solid #ccc;
            min-height: 200px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <h1 class="text-center">Rwanda House Land Brokerage</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">REMP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link md-3" data-toggle="modal" data-target="#exampleModalll" href="/manage_get">Add Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manage_get">Manage Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger float-right" href="/">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <div>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Property</th>
                <th>Request At</th>
                <th>Action</th>
            </thead>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->property_name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary">Confirm</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Insert Property Detail</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="align-self-center" style="">
                    <br>
                    <form method="POST" action="{{ url('property_insert') }}" enctype="multipart/form-data" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="name">Property Name</label>
                            <input type="text" name="name" placeholder="Enter property name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" placeholder="Enter price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <select class="custom-select" name="address" id="address">
                                <option value="Kigai-Kicukiro">Kigai-Kicukiro</option>
                                <option value="Kigali-Nyarugenge">Kigali-Nyarugenge</option>
                                <option value="Kigali-Gasabo">Kigali-Gasabo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="floor">Village</label>
                            <input type="text" name="village" placeholder="village" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="custom-select" name="type" id="type">
                                <option value="Plot/Land">Plot/Land</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Car">Car</option>
                                <option value="HOuse">House</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="advert">Advert</label>
                            <select class="custom-select" name="advert" id="advert">
                                <option value="Sale">Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                        </div>

                      <div class="form-group">
  <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
</div>


                        <div class="form-group">
                         <div class="form-group">
    <label for="photos" class=""><strong  class="badge badge-success">Select photos</strong></label>
    <input type="file" class="form-control input-lg" id="photos" name="file[]" required multiple>
    <div id="photoCount"></div>
    @error('photos')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload Data</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        const inputPhotos = document.getElementById('photos');
        const photoCount = document.getElementById('photoCount');

        inputPhotos.addEventListener('change', updatePhotoCount);

        function updatePhotoCount() {
            const count = inputPhotos.files.length;
            photoCount.textContent = count + (count === 1 ? ' photo selected' : ' photos selected');
            
            document.getElementById('text-editor').addEventListener('submit', function(event) {
    var contentDiv = document.getElementById('text-content');
    var textarea = document.getElementById('text-input');
    textarea.value = contentDiv.innerText;
});

        }
    </script>
</body>
</html>
