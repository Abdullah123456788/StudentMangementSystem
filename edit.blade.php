<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registeration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfile/register.css') }}">
    <title>Registration</title>
</head>
<body>
<div class="container">
    <div class="title">Updation</div>
    <div class="content">
        <div class="">
            @if($error = Session::get('error'))
                {{ $error }} 
            @endif
        </div>
        <form action="{{ url('/dashboard/update/'.$users->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" value="{{ $users->name }}" placeholder="Enter your name" required name="name">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" value="{{ $users->email }}" placeholder="Enter your email" required name="email">
                </div>
                <div class="input-box">
                    <span class="details">Current Image</span>
                    <img class="current-image" src="{{ Storage::url($users->image) }}" alt="profile">
                </div>
                <div class="input-box">
                    <span class="details">Change Image</span>
                    <input type="file" name="image" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="Your image" style="display:none;">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var currentImageElement = document.querySelector('.current-image');
        currentImageElement.src = '';
        var reader = new FileReader();
        reader.onload = function() {
            currentImageElement.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>
</html>
