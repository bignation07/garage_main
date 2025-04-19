@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <h1 class="mb-4">Checklists for {{ $checkin->customer_name }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Part Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checklists as $index => $checklist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $checklist->category }}</td>
                        <td>{{ $checklist->part_name }}</td>
                        <td>{{ $checklist->qty }}</td>
                        <td>{{ $checklist->rate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
