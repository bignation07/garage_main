@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Purchase</h2>
    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="mb-3 col-md-4 col-12"> 
                <label for="customer_name" class="form-label">Select Customer</label>
               <!--<select name="customer_id" id="customer_name" class="form-control" required>-->
               <!--     <option value="">-- Select Customer --</option>-->
               <!--     @foreach($customers as $id => $name)-->
               <!--         <option value="{{ $id }}" {{ $purchase->customer_id == $id ? 'selected' : '' }}>-->
               <!--             {{ $name }}-->
               <!--         </option>-->
               <!--     @endforeach-->
               <!-- </select>-->
               <select name="customer_id" id="customer_name" class="form-control" required>
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $id => $displayName)
                        <option value="{{ $id }}" {{ $purchase->customer_id == $id ? 'selected' : '' }}>
                            {{ $displayName }}
                        </option>
                    @endforeach
                </select>


            </div>
        </div>

        
        <table class="table table-bordered" id="purchaseTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name of Parts</th>
                    <th>MRP</th>
                    <th>Purchase Price</th>
                    <th>Qty</th> 
                    <th>Selling Price</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="text" name="name_of_parts" class="form-control" value="{{ $purchase->name_of_parts }}" required></td>
                    <td><input type="number" step="0.01" name="mrp" class="form-control" value="{{ $purchase->mrp }}" required></td>
                    <td><input type="number" step="0.01" name="purchase_price" class="form-control purchase_price" value="{{ $purchase->purchase_price }}" required></td>
                    <td><input type="number" name="qty" class="form-control qty" value="{{ $purchase->qty }}" required></td>

                    <td><input type="number" step="0.01" name="selling_price" class="form-control selling_price" value="{{ $purchase->selling_price }}" required></td>
                    <td><input type="number" step="0.01" name="profit" class="form-control profit" value="{{ $purchase->profit }}" readonly></td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    // $(document).ready(function () {
    //     $(document).on("input", ".purchase_price, .selling_price", function () {
    //         let purchasePrice = parseFloat($(".purchase_price").val()) || 0;
    //         let sellingPrice = parseFloat($(".selling_price").val()) || 0;
    //         let profit = sellingPrice - purchasePrice;
    //         $(".profit").val(profit.toFixed(2));
    //     });
    // });
          $(document).on("input", ".purchase_price, .selling_price, .qty", function () {
            let row = $(this).closest("tr");
            let purchasePrice = parseFloat(row.find(".purchase_price").val()) || 0;
            let sellingPrice = parseFloat(row.find(".selling_price").val()) || 0;
            let qty = parseFloat(row.find(".qty").val()) || 1; // Default 1 if empty
        
            let profit = (sellingPrice - purchasePrice) * qty; // Multiply by qty
            row.find(".profit").val(profit.toFixed(2));
        });
</script>
@endsection