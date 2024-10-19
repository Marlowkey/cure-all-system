@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Audit Trails</h1>
    @if($auditTrails->isEmpty())
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="alert alert-info text-center">
                    <h4>Transaction appears here.</h4>
                    <p>It seems like there's no order transactions  yet.</p>
                </div>
            </div>
        </div>
    </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User & Role</th>
                    <th>Action</th>
                    <th>Old Value</th>
                    <th>New Value</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditTrails as $audit)
                <tr>
                    <td>{{ $audit->order_id }}</td>
                    <td>{{ $audit->user->name . ' - ' . ucfirst($audit->user->role) }}</td>
                    <td>{{ ucfirst($audit->action) }}</td>
                    <td>{{ $audit->old_status ?? '-' }}</td>
                    <td>{{ $audit->new_status ?? '-'}}</td>
                    <td>{{ \Carbon\Carbon::parse($audit->created_at)->format('D, M j Y ') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $auditTrails->links() }}
    @endif
</div>
@endsection
