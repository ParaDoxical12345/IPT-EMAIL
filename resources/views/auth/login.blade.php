@extends('base')

@section('content')
<div class="entity">
    <!-- Move the background image to the entity -->
    <img src="https://www.feedough.com/wp-content/uploads/2018/10/how-telegram-works-and-makes-money.webp" alt="bg">
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Give the card a transparent background -->
            <div class="card" style="background: rgba(255, 255, 255, 0.7);">
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- Add the "brand" class to the branding element -->
                    <div class="brand">
                        <div class="rounded-circle brand-logo">
                            <img src="data:image/png;base64,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" alt="Brand Logo" class="img-fluid">
                        </div>
                    </div>

                    <h1 class="text-center">Welcome</h1>

                    <form action="{{'/login'}}" method="POST">
                        {{csrf_field()}}

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <a href="{{'/register'}}">Sign up for an account</a>
                            </div>
                            <button class="btn btn-primary px-5" type="submit">Login</button>
                        </div>

                        @method('POST')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .entity {
        background-image: url("https://www.feedough.com/wp-content/uploads/2018/10/how-telegram-works-and-makes-money.webp");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; /* Ensure the entity stays behind the card */
    }

    /* Add a bit of padding to the card for better readability */
    .card {
        padding: 20px;
    }

    /* Define the "brand" class */
    .brand {
        text-align: center;
        margin-bottom: 20px; /* Adjust margin as needed */
    }

    /* Define the "brand-logo" class for rounded frame */
    .brand-logo {
        width: 150px; /* Adjust the width as needed */
        height: 150px; /* Adjust the height as needed */
        border: 5px solid #fff; /* Border for the frame */
        border-radius: 50%; /* Rounded frame */
        overflow: hidden; /* Clip the image inside the frame */
        margin: 0 auto; /* Center the frame horizontally */
    }

    /* Ensure the image fits inside the frame */
    .brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Fit the image inside the frame */
    }
</style>
@endsection
