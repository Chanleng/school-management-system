@extends('backend.sidebar')
@section('content')
<style>
      
             .page-header {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            margin: 0 0.125rem;
            border-radius: 6px;
            font-size: 0.875rem;
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-inactive {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .table thead th {
            background-color: var(--card-background);
            border-bottom: 2px solid var(--border-color);
            font-weight: 600;
            color: var(--text-color);
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
        }

        .form-switch .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
           
</style>
<div class="container-fluid">
 <div class="row">
                 <!-- Page Header -->
                 <div class="page-header">
                     <div class="row align-items-center">
                         <div class="col-md-6">
                             <h3 class="mb-0 fw-bold">
                                 <i class="fas fa-building text-primary me-2"></i>
                                 Departments
                             </h3>
                         </div>
                         <div class="col-md-6 text-end">
                             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
                                 <i class="fas fa-plus me-2"></i>Create Department
                             </button>
                         </div>
                     </div>
                 </div>
 
                 <!-- Search and Filters -->
                 <div class="row mb-3">
                     <div class="col-md-6">
                         <div class="input-group">
                             <span class="input-group-text">
                                 <i class="fas fa-search"></i>
                             </span>
                             <input type="text" class="form-control" placeholder="Search departments..." id="searchInput">
                         </div>
                     </div>
                 </div>
 
                 <!-- Departments Table -->
                 <div class="table-responsive">
                     <table class="table mb-0">
                         <thead>
                             <tr>
                                 <th style="width: 60px;">#</th>
                                 <th>Department Name</th>
                                 <th style="width: 100px;">Code</th>
                                 <th>Department Head</th>
                                 <th style="width: 120px;">Status</th>
                                 <th style="width: 140px;">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>Computer Science</td>
                                 <td>CS</td>
                                 <td>Dr. Sokha</td>
                                 <td>
                                     <span class="badge status-active rounded-pill">Active</span>
                                 </td>
                                 <td>
                                     <button class="btn btn-sm btn-outline-primary btn-action" onclick="editDepartment(1)">
                                         <i class="fas fa-edit"></i>
                                     </button>
                                     <button class="btn btn-sm btn-outline-danger btn-action" onclick="deleteDepartment(1)">
                                         <i class="fas fa-trash"></i>
                                     </button>
                                 </td>
                             </tr>
                     
                         </tbody>
                     </table>
                 </div>
 
                 <!-- Pagination -->
                 <div class="d-flex justify-content-between align-items-center mt-3">
                     <div class="text-muted">
                         Showing 1 to 5 of 5 entries
                     </div>
                     <nav aria-label="Page navigation">
                         <ul class="pagination mb-0">
                             <li class="page-item disabled">
                                 <a class="page-link" href="#" tabindex="-1">« Prev</a>
                             </li>
                             <li class="page-item active">
                                 <a class="page-link" href="#">1</a>
                             </li>
                             <li class="page-item">
                                 <a class="page-link" href="#">2</a>
                             </li>
                             <li class="page-item">
                                 <a class="page-link" href="#">3</a>
                             </li>
                             <li class="page-item">
                                 <a class="page-link" href="#">Next »</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
  
  
 </div>
</div>

    <!-- Create Department Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="createDepartmentModalLabel">
                        <i class="fas fa-plus-circle text-primary me-2"></i>
                        Create Department
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createDepartmentForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="departmentName" class="form-label">
                                    Department Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="departmentName" name="departmentName" required>
                            </div>
                            <div class="mb-3">
                                <label for="departmentCode" class="form-label">
                                    Department Code <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="departmentCode" name="departmentCode" maxlength="10" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="departmentHead" class="form-label">
                                    Department Head <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="departmentHead" name="departmentHead" required>
                                    <option value="">Select Department Head</option>
                                    <option value="1">Dr. Sokha</option>
                                   
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="departmentStatus" class="form-label">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input me-2" type="checkbox" id="departmentStatus" value="active" name="departmentStatus" checked>
                                    <label class="form-check-label" for="departmentStatus">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@endsection