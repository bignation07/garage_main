@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0">Edit Employee</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="user_id" class="form-label fw-bold">Select Employee</label>
                        <select name="user_id" id="user_id" class="form-select" required disabled>
                            <option value="">Choose Employee</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Employee name cannot be changed.</small>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="salary" class="form-label fw-bold">Salary Per Month</label>
                        <input type="number" name="salary" id="salary" class="form-control" value="{{ $employee->salary }}" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="fas fa-save"></i> Update Employee
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4 py-2">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
