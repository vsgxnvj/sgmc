@extends('layouts.app')

@push('styles')
<style>
    table th, table td {
        vertical-align: middle !important;
        text-align: center;
    }
    img {
        border-radius: 8px;
        object-fit: cover;
    }
</style>
@endpush


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mode of Payment</li>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Mode of Payments</h3>
        <a href="{{ route('mop.create') }}" class="btn btn-primary">+ Add New MOP</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Logo</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Type</th>
                <th>Status</th>
                <th>QR</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mops as $mop)
                <tr>
                    <td>
                        @if($mop->image_logo)
                            <img src="{{ asset('storage/'.$mop->image_logo) }}" alt="Logo" width="50" height="50">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
                    <td>{{ $mop->account_name }}</td>
                    <td>{{ $mop->account_number }}</td>
                    <td>{{ $mop->type_of_account }}</td>
                    <td>
                        @if($mop->isactive)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if($mop->image_qr)
                            <img src="{{ asset('storage/'.$mop->image_qr) }}" alt="QR" width="50" height="50">
                        @else
                            <span class="text-muted">No QR</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('mop.edit', $mop->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('mop.destroy', $mop->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this MOP?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No mode of payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
