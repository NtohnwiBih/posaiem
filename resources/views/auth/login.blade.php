<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::to('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{URL::to('frontend/css/authlogin.css')}}" rel="stylesheet">
</head>
<body>
    <div class="bg"></div>

    <div class="star-field">
    <div class="layer"></div>
    <div class="layer"></div>
    <div class="layer"></div>
    <form>
        <h3>Welcome Back!
            <span>Login to your account.</span>
        </h3>

        <label for="phone_number">Phone Number</label>
        <input class="bg-darkz" type="text" id="phone_number" name="phone_number">

        <label for="password">Password</label>
        <input type="password" placeholder="Minimum 6 characters" id="password">

        <button>Sign In</button>
    </form>
    <script src="{{URL::to('frontend/js/auth.js')}}"></script>
</body>
</html>