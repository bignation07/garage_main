@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Purchase Form</h2>
    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
       <div class="row">
    <!--<div class="mb-3 col-lg-3 col-sm-12">-->
        <!--<label for="customer_name" class="form-label">Select Customer</label>-->
    <!--    <select name="customer_id" id="customer_name" class="form-control" required>-->
    <!--        <option value="">Select Customer</option>-->
    <!--        @foreach($customers as $id => $name)-->
    <!--            <option value="{{ $id }}">{{ $name }}</option>-->
    <!--        @endforeach-->
    <!--    </select>-->
    <!--</div>-->
    <div class="mb-3 col-lg-3 col-sm-12">
    <select name="customer_id" id="customer_name" class="form-control" required>
        <option value="">Select Customer</option>
        @foreach($customers as $id => $displayName)
            <option value="{{ $id }}">{{ $displayName }}</option>
        @endforeach
    </select>
</div>

</div>

        <table class="table table-bordered" id="purchaseTable">
            <thead>
                <tr>
                    <th>Name of Parts</th>
                    <th>MRP</th>
                    <th>Purchase Price</th>
                     <th>Quantity (Qty)</th>
                    <th>Selling Price</th>
                    <th>Profit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="name_of_parts[]" class="form-control" required></td>
                    <td><input type="number" step="0.01" name="mrp[]" class="form-control" required></td>
                    <td><input type="number" step="0.01" name="purchase_price[]" class="form-control purchase_price" required></td>
                     <td><input type="number" step="1" name="qty[]" class="form-control qty" required></td> <!-- Added Qty Field -->
            
                    <td><input type="number" step="0.01" name="selling_price[]" class="form-control selling_price" required></td>
                    <td><input type="number" step="0.01" name="profit[]" class="form-control profit" readonly></td>
                    <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-success" id="addRow">Add Row</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Add new row
        $("#addRow").click(function () {
            let newRow = `<tr>
                <td><input type="text" name="name_of_parts[]" class="form-control" required></td>
                <td><input type="number" step="0.01" name="mrp[]" class="form-control" required></td>
                <td><input type="number" step="0.01" name="purchase_price[]" class="form-control purchase_price" required></td>
                
                 <td><input type="number" step="1" name="qty[]" class="form-control qty" required></td> <!-- Added Qty Field -->
                 <td><input type="number" step="0.01" name="selling_price[]" class="form-control selling_price" required></td>
                <td><input type="number" step="0.01" name="profit[]" class="form-control profit" readonly></td>
                <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
            </tr>`;

            $("#purchaseTable tbody").append(newRow);
        });

        // Remove row
        $(document).on("click", ".removeRow", function () {
            $(this).closest("tr").remove();
        });

        // Auto-calculate profit
        // $(document).on("input", ".purchase_price, .selling_price", function () {
        //     let row = $(this).closest("tr");
        //     let purchasePrice = parseFloat(row.find(".purchase_price").val()) || 0;
        //     let sellingPrice = parseFloat(row.find(".selling_price").val()) || 0;
        //     let profit = sellingPrice - purchasePrice;

        //     row.find(".profit").val(profit.toFixed(2));
        // });
        $(document).on("input", ".purchase_price, .selling_price, .qty", function () {
            let row = $(this).closest("tr");
            let purchasePrice = parseFloat(row.find(".purchase_price").val()) || 0;
            let sellingPrice = parseFloat(row.find(".selling_price").val()) || 0;
            let qty = parseFloat(row.find(".qty").val()) || 1; // Default 1 if empty
        
            let profit = (sellingPrice - purchasePrice) * qty; // Multiply by qty
            row.find(".profit").val(profit.toFixed(2));
        });

    });
</script>
@endsection
