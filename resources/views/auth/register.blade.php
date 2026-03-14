<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Register Blog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(120deg,#43e97b,#38f9d7);
    height:100vh;
}

.register-card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">

<div class="col-md-4">

<div class="card register-card shadow-lg">

<div class="card-body p-4">

<h3 class="text-center mb-4">Register Blog</h3>

{{-- VALIDASI ERROR --}}
@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="/register">

@csrf

<div class="mb-3">
<input type="text" name="name" class="form-control" placeholder="Nama">
</div>

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email">
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password">
</div>

<button class="btn btn-success w-100">
Register
</button>

</form>

<p class="text-center mt-3">

Sudah punya akun?
<a href="/login">Login</a>

</p>

</div>
</div>

</div>
</div>
</div>

</body>
</html>