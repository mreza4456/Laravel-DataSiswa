<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    
        <div class="card p-5 shadow border-1" style="width:350px; position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
    <h2 class="text-center mb-5">Login</h2>

    

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" required class="form-control"  >
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        @if ($errors->any())
        
        <div class="text-danger mb-3">
            {{ $errors->first() }}
        </div>
    @endif
        <button type="submit" class="btn btn-dark float-right" style="width:100%;">Login</button>
    </form>
        </div>
    </div>
  
</body>

</html>