<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Ilish Achar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0b2e13 0%, #1a4d26 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background: #ffc107;
            color: #000;
            text-align: center;
            padding: 20px;
            font-weight: bold;
            font-size: 24px;
        }
        .login-body {
            padding: 30px;
        }
        .form-control:focus {
            border-color: #0b2e13;
            box-shadow: 0 0 0 0.25rem rgba(11, 46, 19, 0.25);
        }
        .btn-login {
            background-color: #0b2e13;
            border-color: #0b2e13;
            color: white;
            font-weight: bold;
            padding: 10px;
            font-size: 16px;
        }
        .btn-login:hover {
            background-color: #1a4d26;
            color: white;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            🛡️ Admin Login
        </div>
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label text-muted fw-bold">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@example.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-muted fw-bold">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-muted" for="remember">
                        Remember Me
                    </label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-login">
                        Login to Dashboard
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
