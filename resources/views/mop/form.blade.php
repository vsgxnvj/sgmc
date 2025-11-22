<div class="row">
    <div class="col-md-6 mb-3">
        <label>Account Name</label>
        <input type="text" name="account_name" class="form-control"
            value="{{ old('account_name', $mop->account_name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Account Number</label>
        <input type="text" name="account_number" class="form-control"
            value="{{ old('account_number', $mop->account_number ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Type of Account</label>
        <input type="text" name="type_of_account" class="form-control"
            value="{{ old('type_of_account', $mop->type_of_account ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="isactive" class="form-label">Status</label>
        <select name="isactive" id="isactive" class="form-select" required>
            <option value="1" {{ old('isactive', $mop->isactive ?? '') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('isactive', $mop->isactive ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Logo Image</label>
        <input type="file" name="image_logo" class="form-control">
        @if (!empty($mop->image_logo))
            <img src="{{ asset('storage/' . $mop->image_logo) }}" width="100" class="mt-2 rounded shadow-sm">
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label>QR Image</label>
        <input type="file" name="image_qr" class="form-control">
        @if (!empty($mop->image_qr))
            <img src="{{ asset('storage/' . $mop->image_qr) }}" width="100" class="mt-2 rounded shadow-sm">
        @endif
    </div>
</div>

<div class="mt-3">
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('mop.index') }}" class="btn btn-secondary">Cancel</a>
</div>


