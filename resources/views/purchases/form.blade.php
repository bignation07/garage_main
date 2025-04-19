<div class="form-group">
    <label>Name of Parts</label>
    <input type="text" name="name_of_parts" class="form-control" required>
</div>

<div class="row">
    @foreach(['mrp', 'sale_price', 'purchase_price', 'purchase_per_price', 'selling_price', 'profit', 'total'] as $field)
        <div class="col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label>{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                <input type="number" step="0.01" name="{{ $field }}" class="form-control" required>
            </div>
        </div>
    @endforeach
</div>
