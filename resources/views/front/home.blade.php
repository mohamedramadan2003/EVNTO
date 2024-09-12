<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">  </head>
<body>
<div class="container d-flex flex-column align-items-center">
    <img src="{{ asset('assets/home/images/logo-shape.png') }}" alt="Your Logo" class="img-fluid mx-auto d-block">
    <p class="text-center">Explore Our Dashboard</p>
    <a href="{{ route('dashboard.dashboard') }}"><button class="btn btn-lg btn-gradient">Dashboard<i class="bi bi-arrow-right"></i></button></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
