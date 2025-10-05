<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */
        .registration-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .form-section {
            background: #f8fafc;
            border-left: 4px solid #4f46e5;
            margin: 1.5rem 0;
            padding: 1rem;
            border-radius: 8px;
        }
        .form-section h5 {
            color: #4f46e5;
            font-weight: 600;
            margin-bottom: 1rem;
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
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        }
        .btn-outline-secondary {
            border: 2px solid #6b7280;
            color: #6b7280;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-outline-secondary:hover {
            background: #6b7280;
            color: white;
            transform: translateY(-2px);
        }
        .required {
            color: #ef4444;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="registration-container">
                    <!-- Header -->
                    <div class="form-header">
                        <h2 class="mb-0">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Student Registration
                        </h2>
                        <p class="mb-0 mt-2 opacity-90">Create your student account to get started</p>
                    </div>

                    <!-- Form -->
                    <div class="p-4">
                        <form id="registrationForm" action="{{route('studentRegisterSubmit')}}" novalidate method="POST">
                         @csrf
                            <!-- Login Information Section -->
                            <div class="form-section">
                                <h5><i class="bi bi-shield-lock me-2"></i>Login Information</h5>
                                <div class="row">
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">Please provide a valid email.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Password <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" required minlength="6">
                                        <div class="invalid-feedback">Password must be at least 6 characters long.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <div class="invalid-feedback">Passwords do not match.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="form-section">
                                <h5><i class="bi bi-person me-2"></i>Personal Information</h5>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="fullName" class="form-label">Full Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                                        <div class="invalid-feedback">Please enter your full name.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="dateOfBirth" class="form-label">Date of Birth <span class="required">*</span></label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="gender" class="form-label">Gender <span class="required">*</span></label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your gender.</div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="address" class="form-label">Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                        <div class="invalid-feedback">Please enter your address.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phoneNumber" class="form-label">Phone Number <span class="required">*</span></label>
                                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                                        <div class="invalid-feedback">Please enter your phone number.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="parentGuardian" class="form-label">Parent/Guardian <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="parentGuardian" name="parentGuardian" required>
                                        <div class="invalid-feedback">Please enter parent/guardian name.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="parentContact" class="form-label">Parent Contact <span class="required">*</span></label>
                                        <input type="tel" class="form-control" id="parentContact" name="parentContact" required>
                                        <div class="invalid-feedback">Please enter parent contact number.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-3 justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Register
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Reset
                                </button>
                            </div>
                             <div class="text-center mt-4 pt-3 border-top">
                                <p class="text-muted mb-0">
                                    Already have an account? 
                                    <a href="{{route('studentLogin')}}" class="text-decoration-none fw-semibold" style="color: #4f46e5;">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>Login here
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
       @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        </script>
        @endif
    <script>
      
        
    </script>
</body>
</html>