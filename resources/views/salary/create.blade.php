@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class=" mb-4">Salary Management</h2>
    <div class="card shadow-lg p-4">
        <form action="/salaries" method="POST">
            @csrf
            <div class="row">
              <!--<div class="col-md-4 col-sm-12">-->
              <!--    <div class="mb-3">-->
              <!--        <label for="employee_name" class="form-label">Employee Name</label>-->
              <!--        <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter Employee Name" required>-->
              <!--    </div>-->
              <!--</div>-->
              <!--<div class="col-md-4 col-sm-12">-->
              <!--  <div class="mb-3">-->
              <!--      <label for="employee_id" class="form-label">Employee ID</label>-->
              <!--      <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Enter Employee ID" required>-->
              <!--  </div>-->
              <!--</div>-->
             <div class="col-md-4 col-sm-12">
              <label for="employee_name" class="form-label">Employee Name</label>
                  <!-- Admin: Can select employee -->
                    <select name="employee_name" class="form-select" required id="employeeSelect">
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->name }}" data-employee-id="{{ $employee->id }}">
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" id="employee_id" name="employee_id">
                </div>
                
              
            <script>
                const employeeSelect = document.getElementById('employeeSelect');
                const employeeIdInput = document.getElementById('employee_id');
            
                if (employeeSelect) {
                    employeeSelect.addEventListener('change', function () {
                        const selectedOption = this.options[this.selectedIndex];
                        const employeeId = selectedOption.getAttribute('data-employee-id');
                        employeeIdInput.value = employeeId;
                    });
                }
            </script>

                
              
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="basic_salary" class="form-label">Basic Salary</label>
                    <input type="number" class="form-control" id="basic_salary" name="basic_salary" placeholder="Enter Basic Salary" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="attendance" class="form-label">Attendance</label>
                    <input type="number" class="form-control" id="attendance" name="attendance" placeholder="Enter Attendance" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="overtime_hours" class="form-label">Overtime Hours</label>
                    <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" placeholder="Enter Overtime Hours">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="deductions" class="form-label">Deductions</label>
                    <input type="number" class="form-control" id="deductions" name="deductions" placeholder="Enter Deductions">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select class="form-select" id="payment_status" name="payment_status">
                        <option value="Pending" selected>Pending</option>
                        <option value="Paid">Paid</option>
                    </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="payment_mode" class="form-label">Payment Mode</label>
                    <select class="form-select" id="payment_mode" name="payment_mode">
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="UPI">UPI</option>
                    </select>
                </div>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
@endsection
<style>
  .card {
    border-radius: 10px;
    background-color: #f8f9fa;
}

h2 {
    color: #333;
    font-weight: bold;
}

.form-label {
    font-weight: 600;
}

.form-control, .form-select {
    border-radius: 8px;
}

button[type="submit"] {
    background-color: #007bff;
    border: none;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>