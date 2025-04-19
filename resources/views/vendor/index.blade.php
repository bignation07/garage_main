@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Vendor Payment Management</h2>
    <div class="card shadow-lg p-4">
        <form action="/vendors" method="POST">
            @csrf
            <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="mb-3">
                  <label for="vendor_name" class="form-label">Vendor Name</label>
                  <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="Enter Vendor Name" required>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mb-3">
                  <label for="invoice_number" class="form-label">Invoice Number</label>
                  <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="Enter Invoice Number" required>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mb-3">
                  <label for="purchase_date" class="form-label">Purchase Date</label>
                  <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mb-3">
                  <label for="parts_list" class="form-label">List of Parts Purchased</label>
                  <textarea class="form-control" id="parts_list" name="parts_list" rows="3" placeholder="Enter Parts List" required></textarea>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="mb-3">
                  <label for="total_cost" class="form-label">Total Cost</label>
                  <input type="number" class="form-control" id="total_cost" name="total_cost" placeholder="Enter Total Cost" required>
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
                  <label for="payment_method" class="form-label">Payment Method</label>
                  <select class="form-select" id="payment_method" name="payment_method">
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