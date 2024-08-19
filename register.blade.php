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
    <div class="title">Registration</div>
    <div class="content">
        <div class="">
            @if($error=Session::get("error"))
            {{$error}} 
            @endif
        </div>
        <form action="{{ route('registeration_store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text"  placeholder="Enter your name" required name="name">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text"  placeholder="Enter your username" required name="username">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" required name="email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" min="0" maxlength="11" placeholder="Enter your number" required name="phonenumber">
                </div>
                
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password"  placeholder="Enter your password" required name="password">
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password"  placeholder="Confirm your password"  required name="password_confirmation">
                </div>
                <div>
                    <span class="details">Upload Image</span>
                    <input type="file" id="image" name="image" accept="image/*">
                    <div class="button">
                        <input type="submit" value="Upload">                
                    </div>
                </div>
            </div>
            
            <div class="button">
                {{-- <button type="submit">Save</button> --}}
                <input  type="submit"  value="Save">
            </div>
        </form>
    </div>
</div>
</body>
</html>
