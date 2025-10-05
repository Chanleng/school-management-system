<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
        }
        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        .form-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 2rem 1rem 1.5rem;
            text-align: center;
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: transform 0.2s;
            width: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        }
        .form-floating > label {
            color: #6b7280;
        }
        .form-floating > .form-control:focus ~ label {
            color: #4f46e5;
        }
        .login-links {
            text-align: center;
            margin-top: 1.5rem;
        }
        .login-links a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }
        .login-links a:hover {
            text-decoration: underline;
        }
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }
        .divider span {
            background: white;
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-container mx-auto">
                    <!-- Header -->
                    <div class="form-header">
                        <h2 class="mb-2">
                            <i class="bi bi-person-circle me-2"></i>
                            Student Login
                        </h2>
                        <p class="mb-0 opacity-90">Welcome back! Please sign in to your account</p>
                    </div>

                    <!-- Form -->
                    <div class="p-4">
                        <form id="loginForm" action="{{route('Login')}}" novalidate method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                <label for="email">Email address</label>
                                <div class="invalid-feedback">Please provide a valid email.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="6">
                                <label for="password">Password</label>
                                <div class="invalid-feedback">Password is required.</div>
                                @if(session('error'))
                                <div class="text-danger">{{session('error')}}</div>
                                @endif
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>

                            <div class="divider">
                                <span>or</span>
                            </div>

                            <div class="login-links">
                                <p class="mb-2">
                                    <a href="#" id="forgotPassword">Forgot your password?</a>
                                </p>
                                <p class="mb-0">
                                    Don't have an account? 
                                    <a href="{{route('studentRegister')}}" id="signUpLink">Sign up here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'success!',
            text: '{{ session('success') }}',
            icon: 'success',
        })
    </script>
    @endif
    
    <script>
   
    </script>
</body>
</html>