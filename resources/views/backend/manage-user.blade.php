@extends('backend.sidebar')
@section('content')

     <div id="users" class="content-section ">
                    <h2 class="mb-4 fw-bold">Manage Users</h2>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">User Management</h5>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                        <i class="fas fa-plus me-1"></i>Add User
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td><span class="badge bg-danger">{{$user->role}}</span></td>
                                                   
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                                                        <button class="btn btn-sm btn-outline-danger">Reset Password</button>
                                                    </td>
                                                </tr>
                                                    
                                                @endforeach
                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">User Statistics</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Admins</span>
                                            <span>5</span>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Teachers</span>
                                            <span>89</span>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Students</span>
                                            <span>1,247</span>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar" style="width: 95%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- modal add user  --}}

            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h2 class="modal-title fw-bold" id="addTeacherModalLabel">
                                        <i class="fas fa-user-plus me-2"></i>
                                        Add New User
                                    </h2>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-white border rounded-3 shadow-sm p-4">
                                            <div class="text-center mb-4">
                                                <p class="text-muted">Create a new user account and profile</p>
                                            </div>

                                            <form id="addTeacherForm" novalidate action="{{route('createUserSubmit')}}" method="post">
                                            <!-- User Information Section -->
                                           @csrf
                                                <div class="bg-success text-white p-3 rounded-top-3 mb-3 mx-n4 mt-n4">
                                                    <h5 class="mb-0 fw-semibold">
                                                        <i class="fas fa-user me-2"></i>
                                                        User Information
                                                        <small class="ms-2 opacity-75">(users table)</small>
                                                    </h5>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="fullName" class="form-label fw-medium">
                                                            Full Name <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control border-2"  id="name" name="name" required>
                                                        <div class="invalid-feedback">Please provide a valid full name.</div>
                                                        @error('name')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label fw-medium">
                                                            Email Address <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="email" class="form-control border-2" @error('email') value="{{old('email')}}" @enderror id="email" name="email"  required>
                                                        <div class="invalid-feedback">Please provide a valid email address.</div>
                                                        @error('email')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="password" class="form-label fw-medium">
                                                            Password <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="password" class="form-control border-2" id="password" name="password" required minlength="6">
                                                        <div class="invalid-feedback">Password must be at least 6 characters long.</div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="password" class="form-label fw-medium">
                                                        Confirm Password <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="password" class="form-control border-2" id="password_confirmation" name="password_confirmation" required>
                                                        <div class="invalid-feedback">Password no match</div>
                                                        @error('password')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="role" class="form-label fw-medium">Role</label>
                                                    {{-- <input type="text" class="form-control border-2 bg-light" value="teacher" readonly> --}}
                                                    <select class="form-select"  id="role" name="role">
                                                        <option value="">Select Role</option>
                                                        <option value="Teacher">Teacher</option>
                                                        <option value="Student">Student</option>
                                                        <option value="Admin">Admin</option>
                                                        
                                                    </select>
                                                    @error('role')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    
                                                </div>
                                            

                                                <div class="float-end mt-5">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            <i class="fas fa-times me-2"></i>
                                                            Cancel
                                                        </button>
                                                        <button type="submit" data-id='4' class="btn btn-success">
                                                            <i class="fas fa-save me-2"></i>
                                                            Add User
                                                        </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        
                    </div>
            </div>
            @if(session('success'))
            <script>
                Swal.fire({
                    title: "success",
                    text: '{{session('success')}}',
                    icon: "success"
                });
            </script>
            @endif
            @if($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', ()=>{
                    let modal = new bootstrap.Modal(document.getElementById('addUserModal'));
                    modal.show();
                })
                
            </script>
            @endif


@endsection
