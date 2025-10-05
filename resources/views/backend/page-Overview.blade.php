@extends('backend.sidebar')
@section('content')

                <!-- Overview Section -->
                <div id="overview" class="content-section">
                    <h2 class="mb-4 fw-bold">Dashboard Overview</h2>
                    
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-3">
                            <div class="stat-card text-center">
                                <i class="fas fa-user-graduate fa-2x text-primary mb-3"></i>
                                <div class="stat-number">0</div>
                                <div class="text-muted">Total Students</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card text-center">
                                <i class="fas fa-chalkboard-teacher fa-2x text-secondary mb-3"></i>
                                <div class="stat-number">0</div>
                                <div class="text-muted">Total Teachers</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card text-center">
                                <i class="fas fa-book fa-2x text-success mb-3"></i>
                                <div class="stat-number">0</div>
                                <div class="text-muted">Total Courses</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card text-center">
                                <i class="fas fa-calendar-check fa-2x text-warning mb-3"></i>
                                <div class="stat-number">0</div>
                                <div class="text-muted">Today's Attendance</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row">
                       
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Activity</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 px-0">
                                            <small class="text-muted">2 hours ago</small><br>
                                            New student John Doe enrolled in Mathematics
                                        </div>
                                        <div class="list-group-item border-0 px-0">
                                            <small class="text-muted">4 hours ago</small><br>
                                            Teacher Sarah Wilson updated Physics course
                                        </div>
                                        <div class="list-group-item border-0 px-0">
                                            <small class="text-muted">1 day ago</small><br>
                                            Attendance marked for Chemistry class
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
               
@endsection