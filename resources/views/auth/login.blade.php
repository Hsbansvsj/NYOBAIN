<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Login Blog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(120deg,#4facfe,#00f2fe);
    height:100vh;
}

.login-card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">

<div class="col-md-4">

<div class="card login-card shadow-lg">

<div class="card-body p-4">

<h3 class="text-center mb-4">Login Blog</h3>

{{-- NOTIFIKASI --}}
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

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

<form method="POST" action="/login">

@csrf

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email">
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password">
</div>

<button class="btn btn-primary w-100">
Login
</button>

</form>

<p class="text-center mt-3">

Belum punya akun?
<a href="/register">Register</a>

</p>

</div>
</div>

</div>
</div>
</div>

</body>
</html>