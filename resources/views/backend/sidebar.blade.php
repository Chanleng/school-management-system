<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>School Management System - Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <style>
        :root {
            --primary-color: #0891b2;
            --secondary-color: #f97316;
            --background-color: #ffffff;
            --card-background: #f9fafb;
            --text-color: #4b5563;
            --border-color: #e5e7eb;
            --sidebar-bg: #f9fafb;
        }
        
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        
        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            border-right: 1px solid var(--border-color);
        }
        
        .sidebar .nav-link {
            color: var(--text-color);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .header {
           /* margin-top: 20px; */
            background-color: rgb(255, 255, 255);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
        }
        
        .stat-card {
            background: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        /* .content-section {
            display: none;
        } */
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #0e7490;
            border-color: #0e7490;
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-secondary:hover {
            background-color: #ea580c;
            border-color: #ea580c;
        }
        
     
        .content-section.active {
            display: block;
        }
        
        .table-responsive {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
        }
        
        .progress-bar {
            background-color: var(--primary-color);
        }
        
        .badge-success {
            background-color: #22c55e;
        }
        
        .badge-warning {
            background-color: #eab308;
        }
        
        .badge-danger {
            background-color: #ef4444;
        }
    </style>
</head>

<body>
  <!-- Header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                        School Management System
                    </h4>
                </div>
                <div class="col-md-6 text-end">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>Admin User
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('adminProfile')}}"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                            <li>
                                <form action="{{route('Logout')}}"method="POST">
                                    @csrf
                                <button type="submit" class="dropdown-item " ><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
     <div class="row">
       <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <nav class="nav flex-column py-3">
                    <a class="nav-link " href="{{route('pageOverview')}}">
                        <i class="fas fa-home me-2"></i>Overview
                    </a>
                    <a class="nav-link" href="{{route('manageUser')}}">
                        <i class="fas fa-users me-2"></i>Manage Users
                    </a>
                    <a href="{{route('studentPending')}}"  class="nav-link">
                         <i class="bi bi-person-lines-fill me-2"></i>Students Pending
                    </a>
                    <a class="nav-link" href="{{route('manageStudent')}}" >
                        <i class="fas fa-user-graduate me-2"></i>Manage Students
                    </a>
                    <a class="nav-link" href="{{route('manageTeacher')}}" >
                        <i class="fas fa-chalkboard-teacher me-2"></i>Manage Teachers
                    </a>
                     <a class="nav-link" href="{{route('departments')}}" >
                        <i class="fas fa-building me-2"></i>Departments
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-book me-2"></i>Manage Courses
                    </a>
                    <a class="nav-link" href="#" >
                        <i class="fas fa-calendar-check me-2"></i>Manage Attendance
                    </a>
                    <a class="nav-link" href="#" >
                        <i class="fas fa-chart-bar me-2"></i>Reports
                    </a>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10 p-4">
           <!-- Main Content -->
            @yield('content')
           <!-- Main Content -->

            
            </div>
            <script>
             
            // Handle sidebar navigation
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    
                    // Remove active class from all links and sections
                    // navLinks.forEach(navLink => navLink.classList.remove('active'));
                    // Add active class to clicked link
                    link.classList.add('active');
                });
            });
      
            </script>
            @stack('scripts')
     
     </div>
    </div>
</body>
</html>