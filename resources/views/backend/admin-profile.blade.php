@extends('backend.sidebar')
@section('content')
<style>
  /* Profile Card Styles */
        .profile-card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            margin-right: 1.5rem;
        }
        
        .profile-info {
            flex: 1;
        }
        
        .profile-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #1f2937;
        }
        
        .profile-email {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        .profile-role {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .profile-details {
            margin-bottom: 1.5rem;
        }
        
        .detail-item {
            display: flex;
            margin-bottom: 0.75rem;
        }
        
        .detail-label {
            width: 120px;
            font-weight: 500;
            color: #6b7280;
        }
        
        .detail-value {
            flex: 1;
            color: #374151;
        }
        
        .profile-actions {
            display: flex;
            gap: 0.75rem;
        }
    </style>
</style>
     <div class="col-md-9 col-lg-10 p-4">
      
            
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-header">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRut5GN9H7zGt3CqCF3kv0tBnTtzUhrNGwLVg&s" 
                         alt="Profile Image" class="" style="width: 140px; height: 140px;">
                    <div class="profile-info">
                        <h2 class="profile-name">Admin User</h2>
                        <p class="profile-email">admin@schoolmanagement.com</p>
                        <span class="profile-role">Administrator</span>
                    </div>
                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#profileModal">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </button>
                </div>
                
                <div class="profile-details">
                    <h5 class="mb-3 fw-bold">Personal Information</h5>
                    
                    <div class="detail-item">
                        <span class="detail-label">Full Name:</span>
                        <span class="detail-value">Admin User</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">admin@schoolmanagement.com</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Phone:</span>
                        <span class="detail-value">+1 (555) 123-4567</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Address:</span>
                        <span class="detail-value">123 Education Street, Academic City</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Last Login:</span>
                        <span class="detail-value">Today at 09:45 AM</span>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-key me-2"></i>Change Password
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-bell me-2"></i>Notification Settings
                    </button>
                </div>
            </div>
            </div>
              <!-- Profile Update Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-gear me-2"></i>Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                     <div class="profile d-flex justify-content-center position-relative" style="width: fit-content; margin: 0 auto;">
                         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRut5GN9H7zGt3CqCF3kv0tBnTtzUhrNGwLVg&s" 
                              alt="Profile Image" class="profile-image rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
    
                           <label for="profile-upload" class="position-absolute  bg-primary text-white rounded-circle p-2" 
                                  style="width: 30px; height: 30px; cursor: pointer; border: 2px solid white; top: 80px; left: 90px;">
                               <i class="fas fa-plus" style="margin-bottom: 1px ; position: relative; top: -6px; left: -11;"></i>
                           </label>
                       
                       <input type="file" id="profile-upload" class="d-none" accept="image/*">
           </div>
                   
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="Sarah Johnson">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="sarah.johnson@university.edu">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3">123 University Ave, College Town, ST 12345</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="emergencyContact" class="form-label">Emergency Contact</label>
                            <input type="text" class="form-control" id="emergencyContact" value="John Johnson - +1 (555) 987-6543">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection