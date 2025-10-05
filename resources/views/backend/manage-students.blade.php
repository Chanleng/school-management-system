@extends('backend.sidebar')
@section('content')
<style>
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

        .selected-count {
            background: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .student_info {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .student_info h5 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
</style>
            <div id="students" class="content-section">
                    <h2 class="mb-4 fw-bold">Manage Students</h2>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Student Records</h5>
                            <div>
                                <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <i class="fas fa-plus me-1"></i>Add Student
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Search students...">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option>All Courses</option>
                                        <option>Mathematics</option>
                                        <option>Physics</option>
                                        <option>Chemistry</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option>All Years</option>
                                        <option>Year 1</option>
                                        <option>Year 2</option>
                                        <option>Year 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Grade</th>
                                            <th>Attendance</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->user->name}}</</td>
                                    <td>{{$student->user->email}}</</td>
                                    <td></td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-warning" style="width: 78%">78%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">View</button>
                                        <button class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#assignClassModal">Enroll to class</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>
                                    
                                @endforeach
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
                <p class="text-muted mb-3">Select class and subject to eroll to the student</p>
                
                <!-- Teacher Information -->
                <div class="student_info">
                    <h5><i class="fas fa-user me-2"></i>Student Information</h5>
                    <p class="mb-1"><strong>Name:</strong> Dr. Sarah Johnson</p>
                    <p class="mb-0"><strong>Student ID:</strong> TCH001</p>
                </div>

                <form id="assignClassesForm" action="" method="post">
                    @csrf
                    <!-- Subject Selection -->
                    <div class="mb-4">
                        <label for="subject" class="form-label">
                            <i class="fas fa-book me-2"></i>Class
                        </label>
                        <select class="form-select" id="subject" required>
                            <option value="">Select Class</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                            <option value="">12</option>
                            {{-- <option value="">Select Class</option>
                            <option value="mathematics">7</option>
                            <option value="english">English Literature</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="geography">Geography</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                            <option value="computer_science">Computer Science</option>
                            <option value="art">Art & Design</option> --}}
                        </select>
                    </div>

                    <!-- Class Selection -->
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-users me-2"></i>Select Subject
                            <span id="selectedCount" class="selected-count" style="display: none;">0 selected</span>
                        </label>
                        <div class="multi-select-container" id="classContainer">
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class1" name="classes[]" value="english">
                                        <label for="class1" class="class-name">English Literature</label>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class2" name="classes[]" value="mathematics">
                                        <label for="class2" class="class-name">Mathematics</label>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class3" name="classes[]" value="science">
                                        <label for="class3" class="class-name">Science</label>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class4" name="classes[]" value="geography">
                                        <label for="class4" class="class-name">Geography</label>
                                       
                                    </div>
                            
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class5" name="classes[]" value="physics">
                                        <label for="class5" class="class-name">Physics</label>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="class-option">
                                <div class="class-info">
                                    <div class="class-details">
                                        <input type="checkbox" id="class6" name="classes[]" value="chemistry">
                                        <label for="class6" class="class-name">Chemistry</label>
                                        
                                    </div>
                                
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
                    <i class="fas fa-save me-2"></i>Save
                </button>
            </div>
        </div>
    </div>
</div>
@endsection