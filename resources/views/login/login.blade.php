<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
            text-align: center;
        }
        .login-container h2 {
            color: #0d6efd; /* Blue */
            margin-bottom: 20px;
        }
        .form-label {
            color: #495057; /* Darker gray for labels */
        }
        .btn-primary {
            background-color: #0d6efd; /* Blue button */
            border-color: #0d6efd;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #0a58ca; /* Darker blue on hover */
            border-color: #0a58ca;
        }
        .alert-danger {
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('loginform') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            @if ($errors->has('login_error'))
                <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
