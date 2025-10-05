@extends('backend.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="mb-5">
                        <h4 class="mb-0">
                            <i class="bi bi-person-lines-fill me-2"></i>
                            Student Pending List
                        </h4>
                    </div>
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="">
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email </th>
                                        <th scope="col">Grade/Class</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingStundent as $student)

                                    <tr>
                                        <td class="fw-bold">{{$student->id}}</td>
                                        <td>{{$student->user->name}}</td>
                                        <td>
                                            <i class="bi bi-envelope me-1"></i>
                                           {{$student->user->email}}
                                        </td>
                                        <td>{{$student->grade ? $student->grade : 'Not assigned yet'}}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-clock me-1"></i>
                                           {{$student->status}}
                                                
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button data-id="{{$student->id}}" type="button" class="btn btn-success btn-sm btn_approve" title="Approve">
                                                    <i class="bi bi-check-circle"></i>
                                                    Approve
                                                </button>
                                                
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Showing 3 pending students</small>
                            {{-- <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-success btn-sm">
                                    <i class="bi bi-check-all me-1"></i>
                                    Approve All
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-arrow-clockwise me-1"></i>
                                    Refresh
                                </button>
                            </div> --}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      
    </div>
   
@endsection
@push('scripts')
@vite('resources/js/student_pending.js')
@endpush