@extends('layouts.admin')

@section('content')
<div class="container">
      <div class="d-flex shadow-sm justify-content-between  p-4 bg-dark text-light">
           <h3 class="text-light">Work Assignments</h3>
           <a href="{{ route('work_assignments.create') }}" class="btn btn-success  ms-3 "><i class="fas fa-plus "></i></a>
         </div>
      <div >
       
        @foreach($workAssignments->groupBy('vehicle_checkin_id') as $customerId => $assignments)
           <div class="d-flex justify-content-between bg-light border ps-4 pe-4 pt-2 pe-2 mt-4">
               
                <h6  class="text-dark fw-bold text-secondary pt-1">{{ $assignments->first()->vehicleCheckin->customer_name }} - {{ $assignments->first()->vehicleCheckin->vehicle_registration_number }}</h6>
                <a href="{{ route('work_assignments.download-customer', $customerId) }}" class="btn btn-primary mb-2 btn-sm"><i class="fas fa-download"></i></a>
        
           </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Reg. No</th>
                        <th>Work</th>
                        <th>Mechanic</th>
                        <th>Completed</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $index => $assignment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $assignment->vehicleCheckin->make_model }}</td>
                            <td>{{ $assignment->vehicleCheckin->year_of_manufacture }}</td>
                            <td>{{ $assignment->vehicleCheckin->vehicle_registration_number }}</td>
                            <td>{{ $assignment->name_of_work }}</td>
                            <td>{{ $assignment->mechanic }}</td>
                            <td>{{ $assignment->completed ? 'Yes' : 'No' }}</td>
                            <td>{{ $assignment->result }}</td>
                            <td>
                                <a href="{{ route('work_assignments.edit', $assignment->vehicle_checkin_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> </a>
                                <form action="{{ route('work_assignments.destroy', $assignment->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')"><i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
   </div>
</div>
@endsection
