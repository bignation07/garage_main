@extends('layouts.admin')

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center p-3 bg-dark shadow-md">
        <div>
            <h2 class="text-light font-weight-bold">Purchase List</h2>
            <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm rounded-pill">
                <i class="fas fa-plus"></i>Add Purchase
            </a>
        </div>

        <form method="GET" action="{{ route('purchases.index') }}" class="d-flex align-items-center">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" style="max-width: 300px;">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach ($purchases as $customerName => $customerPurchases)
    <div class="mt-4 mb-2 shadow-md border border-light bg-light">
        <div class="d-flex justify-content-between align-items-center pb-2 pt-2 ps-3" style="border: solid 1px #dbd5d5;">
            <h6 class="text-dark pb-0 mb-0 fw-bold text-secondary">{{ $customerName }} Purchase</h6>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name of Parts</th>
                        <th>MRP</th>
                        <!--<th>Sale Price</th>-->
                        <th>Purchase Price</th>
                        <!--<th>Purchase Per Price</th>-->
                        <th>Qty</th>
                        <th>Selling Price</th>
                        <th>Profit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalQty = 0;
                        $totalSellingPrice = 0;
                        $totalProfit = 0;
                    @endphp

                    @foreach ($customerPurchases as $index => $purchase)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $purchase->name_of_parts }}</td>
                            <td>{{ number_format($purchase->mrp, 2) }}</td>
                            <td>{{ number_format($purchase->purchase_price, 2) }}</td>
                            <td>{{ (int) $purchase->qty }}</td>

                            <td>{{ number_format($purchase->selling_price, 2) }}</td>
                            <td>{{ number_format($purchase->profit, 2) }}</td>
                            <td>
                                <div class="d-inline">
                                    <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @php
                            $totalQty += $purchase->qty;
                            $totalSellingPrice += $purchase->selling_price;
                            $totalProfit += $purchase->profit;
                        @endphp
                    @endforeach

                    <tr class="table-light">
                        <td colspan="4" class="text-start ps-5 font-weight-bold">Total</td>
                        <td class="font-weight-bold">{{$totalQty }}</td>
                        <td class="font-weight-bold">{{ number_format($totalSellingPrice, 2) }}</td>
                        <td class="fw-bold">{{ number_format($totalProfit, 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach

</div>

<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 0.5rem;  /* Reduced padding for less height */
        line-height: 1.2;  /* Reduced line-height to make the rows compact */
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .container {
        max-width: 1200px;
    }

    h1 {
        font-size: 28px;
        color: #343a40;
        font-weight: 600;
    }

    h3 {
        font-size: 22px;
        color: #007bff;
    }

    /* Make the table responsive */
    .table-responsive {
        overflow-x: auto;
    }

    /* Optional: Customize the table for smaller screens */
    @media (max-width: 768px) {
        .table th, .table td {
            font-size: 12px;  /* Reduce font size on small screens */
            padding: 0.25rem;  /* Further reduce padding on small screens */
        }
    }
</style>
@endsection
