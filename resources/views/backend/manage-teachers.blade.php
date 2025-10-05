<style>
   :root {
            --primary-color: #10b981;
            --primary-dark: #059669;
            --secondary-color: #f59e0b;
            --background-color: #f8fafc;
            --surface-color: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
        }

        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            background: var(--surface-color);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .form-header h2 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-secondary);
            margin: 0;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
        }

        .multi-select-container {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            max-height: 200px;
            overflow-y: auto;
            background: var(--surface-color);
        }

        .multi-select-container:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
        }

        .class-option {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s ease;
        }

        .class-option:last-child {
            border-bottom: none;
        }

        .class-option:hover {
            background-color: #f3f4f6;
        }

        .class-option input[type="checkbox"] {
            margin-right: 0.75rem;
            transform: scale(1.1);
        }

        .class-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .class-details {
            flex: 1;
        }

        .class-name {
            font-weight: 500;
            color: var(--text-primary);
        }

        .class-meta {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        .student-count {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 2rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #6b7280;
            border-color: #6b7280;
            padding: 0.75rem 2rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
            border-color: #4b5563;
        }

        .selected-count {
            background: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .teacher-info {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .teacher-info h5 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
</style>
@extends('backend.sidebar')
@section('content')
<!-- Manage Teachers Section -->
                <div id="teachers" class="content-section">
                    <h2 class="mb-4 fw-bold">Manage Teachers</h2>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Teacher Records</h5>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                                <i class="fas fa-plus me-1"></i>Add Teacher
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Teacher ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Class</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>TCH001</td>
                                            <td>Dr. Sarah Wilson</td>
                                            <td>sarah@school.edu</td>
                                            <td>Physics</td>
                                            <td>3 class</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">View</button>
                                                <button class="btn btn-sm btn-outline-secondary me-1">Edit</button>
                                                <button class="btn btn-sm btn-outline-warning">Assign Course</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TCH002</td>
                                            <td>Prof. Michael Brown</td>
                                            <td>michael@school.edu</td>
                                            <td>Mathematics</td>
                                            <td>4 class</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">View</button>
                                                <button class="btn btn-sm btn-outline-secondary me-1">Edit</button>
                                                <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#assignClassModal">Assign Course</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal assign class --}}
 <div class="modal fade" id="assignClassModal" tabindex="-1" aria-labelledby="assignClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="assignClassModalLabel">
                    <i class="fas fa-chalkboard-teacher me-2"></i>Assign Classes to Teacher
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">Select classes to assign to the teacher</p>
                
                <!-- Teacher Information -->
                <div class="teacher-info">
                    <h5><i class="fas fa-user me-2"></i>Teacher Information</h5>
                    <p class="mb-1"><strong>Name:</strong> Dr. Sarah Johnson</p>
                    <p class="mb-0"><strong>Employee ID:</strong> TCH001</p>
                </div>

                <form id="assignClassesForm">
                    <!-- Subject Selection -->
                    <div class="mb-4">
                        <label for="subject" class="form-label">
                            <i class="fas fa-book me-2"></i>Subject
                        </label>
                        <select class="form-select" id="subject" required>
                            <option value="">Select Subject</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English Literature</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                            <option value="computer_science">Computer Science</option>
                            <option value="art">Art & Design</option>
                        </select>
                    </div>

                    <!-- Class Selection -->
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-users me-2"></i>Select Classes
                            <span id="selectedCount" class="selected-count" style="display: none;">0 selected</span>
                        </label>
                        <div class="multi-select-container" id="classContainer">
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class1" name="classes[]" value="grade-9-a">
                                        <label for="class1" class="class-name">Grade 9-A</label>
                                        <div class="class-meta">Morning Session • Room 101</div>
                                    </div>
                                    <span class="student-count">32 students</span>
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class2" name="classes[]" value="grade-9-b">
                                        <label for="class2" class="class-name">Grade 9-B</label>
                                        <div class="class-meta">Morning Session • Room 102</div>
                                    </div>
                                    <span class="student-count">28 students</span>
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class3" name="classes[]" value="grade-10-a">
                                        <label for="class3" class="class-name">Grade 10-A</label>
                                        <div class="class-meta">Afternoon Session • Room 201</div>
                                    </div>
                                    <span class="student-count">30 students</span>
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class4" name="classes[]" value="grade-10-b">
                                        <label for="class4" class="class-name">Grade 10-B</label>
                                        <div class="class-meta">Afternoon Session • Room 202</div>
                                    </div>
                                    <span class="student-count">26 students</span>
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class5" name="classes[]" value="grade-11-a">
                                        <label for="class5" class="class-name">Grade 11-A</label>
                                        <div class="class-meta">Morning Session • Room 301</div>
                                    </div>
                                    <span class="student-count">24 students</span>
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class6" name="classes[]" value="grade-12-a">
                                        <label for="class6" class="class-name">Grade 12-A</label>
                                        <div class="class-meta">Morning Session • Room 401</div>
                                    </div>
                                    <span class="student-count">22 students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="submit" form="assignClassesForm" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Assignment
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add teacher modal --}}
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h2 class="modal-title fw-bold" id="addTeacherModalLabel">
                        <i class="fas fa-user-plus me-2"></i>
                        Add New Teacher
                    </h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-white border rounded-3 shadow-sm p-4">
                        <div class="text-center mb-4">
                            <p class="text-muted">Create a new teacher account and profile</p>
                        </div>

                        <form id="addTeacherForm" novalidate>
                            <!-- User Information Section -->
                            <div class="bg-white border rounded-3 p-4 mb-4">
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
                                        <input type="text" class="form-control border-2" id="fullName" name="fullName" required>
                                        <div class="invalid-feedback">Please provide a valid full name.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label fw-medium">
                                            Email Address <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control border-2" id="email" name="email" required>
                                        <div class="invalid-feedback">Please provide a valid email address.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label fw-medium">
                                            Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input type="tel" class="form-control border-2" id="phone" name="phone" required>
                                        <div class="invalid-feedback">Please provide a valid phone number.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label fw-medium">
                                            Password <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control border-2" id="password" name="password" required minlength="6">
                                        <div class="invalid-feedback">Password must be at least 6 characters long.</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label fw-medium">Role</label>
                                    <input type="text" class="form-control border-2 bg-light" id="role" name="role" value="teacher" readonly>
                                    <small class="text-muted">Role is automatically set to teacher</small>
                                </div>
                            </div>

                            <!-- Teacher Information Section -->
                            <div class="bg-white border rounded-3 p-4 mb-4">
                                <div class="bg-success text-white p-3 rounded-top-3 mb-3 mx-n4 mt-n4">
                                    <h5 class="mb-0 fw-semibold">
                                        <i class="fas fa-chalkboard-teacher me-2"></i>
                                        Teacher Information
                                        <small class="ms-2 opacity-75">(teachers table)</small>
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="subject" class="form-label fw-medium">
                                            Department <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select border-2" id="subject" name="subject" required>
                                            <option value="">Select Subject</option>
                                            <option value="mathematics">Computer Science</option>
                                        
                                        </select>
                                        <div class="invalid-feedback">Please select a subject.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label fw-medium">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select border-2" id="status" name="status" required>
                                            <option value="">Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a status.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label me-1">Can be head <span class="text-danger">?</span></label>
                                        <input type="checkbox" class="form-checkbox" name="head" id="" style="width: 20px; height: 20px; cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>
                        Cancel
                    </button>
                    <button type="submit" form="addTeacherForm" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>
                        Save Teacher
                    </button>
                </div>
            </div>
        </div>
    </div>
    
@endsection