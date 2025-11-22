@extends('layouts.app')

@push('styles')
@endpush


{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mode of Payment</li>
@endsection --}}



@section('content')
    <div class="container py-5">

        <h2 class="mb-4" style="color:#00FFC8;">Latest Payouts</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form -->
        <form action="{{ route('payouts.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Sites</label>
                <select name="sites" class="form-control" required>
                    <option value="">-- Select Site --</option>
                    @foreach ($cards as $card)
                        <option value="{{ $card->title }}">{{ $card->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Receipt Image</label>
                <input type="file" name="img_recibo" class="form-control">
            </div>
            <div class="mb-3">
                <label>Date Processed</label>
                <input type="date" name="date_processed" class="form-control"
                    value="{{ old('date_processed', date('Y-m-d')) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Payout</button>
        </form>

        <!-- Latest Payouts Table -->
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Sites</th>
                    <th>Amount</th>
                    <th>Receipt</th>
                    <th>Date Processed</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($payouts as $payout)
                    <tr>
                        <td>{{ $payout->username }}</td>
                        <td>{{ $payout->sites }}</td>
                        <td>{{ number_format($payout->amount, 2) }}</td>
                        <td>
                            @if ($payout->img_recibo)
                                <a href="{{ asset('storage/payouts/' . $payout->img_recibo) }}" target="_blank">View</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $payout->date_processed->format('Y-m-d') }}</td>
                        <td>
                            <form action="{{ route('payouts.destroy', $payout->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this payout?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        {{ $payouts->links() }}

    </div>
@endsection
