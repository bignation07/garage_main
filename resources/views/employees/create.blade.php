@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add Employee</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="d-flex justify-content-between">
                            
                            <label for="user_id" class="form-label fw-bold">Select Employee</label>
                             <a href="{{ route('users.create') }}" class="btn btn-outline-primary mb-2 btn-sm fw-bold">
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </div>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="">Choose Employee</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="salary" class="form-label fw-bold mb-2">Salary Per Month</label>
                        <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter salary" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="fas fa-plus"></i> Add Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

