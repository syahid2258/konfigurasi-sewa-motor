<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sewa Motor</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .login-header {
            background: linear-gradient(135deg, #5B42D1, #7A58E6);
            color: white;
            text-align: center;
            padding: 30px 20px;
            border-radius: 15px 15px 0 0;
        }
        .login-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #7A58E6;
            border-color: #7A58E6;
        }
        .btn-primary:hover {
            background-color: #5B42D1;
            border-color: #5B42D1;
        }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="login-header">
        <h3 class="mb-0">Admin Panel</h3>
        <p class="mb-0 text-white-50">Sewa Motor App</p>
    </div>
    <div class="login-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
