@extends('layouts.app')

@section('content')
<div class="container mt-5"> 
    <h1 class="text-center mb-4">Order Transactions</h1> 

    @if($auditTrails->isEmpty()) 
        <div class="row justify-content-center"> 
            <div class="col-lg-8 col-md-10 col-sm-12"> 
                <div class="alert alert-info text-center"> 
                    <h4>Transaction appears here.</h4> 
                    <p>It seems like there are no order transactions yet.</p> 
                </div> 
            </div> 
        </div> 
    @else 
        <!-- Desktop Table Wrapped in a Card -->
        <div class="d-none d-lg-block">
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table table-hover table-bordered"> 
                        <thead class="table-primary">
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
                                <td>{{ $audit->new_status ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($audit->created_at)->format('D, M j Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $auditTrails->links() }}
                </div>
            </div>
        </div>

        <!-- Mobile Card Layout Wrapped in a Card -->
        <div class="d-lg-none">
            <div class="card mb-3">
                <div class="card-body">
                    @foreach ($auditTrails as $audit)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order ID: {{ $audit->order_id }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $audit->user->name . ' - ' . ucfirst($audit->user->role) }}
                            </h6>
                            <p class="card-text"><strong>Action:</strong> {{ ucfirst($audit->action) }}</p>
                            <p class="card-text"><strong>Old Value:</strong> {{ $audit->old_status ?? '-' }}</p>
                            <p class="card-text"><strong>New Value:</strong> {{ $audit->new_status ?? '-' }}</p>
                            <p class="card-text"><strong>Timestamp:</strong> {{ \Carbon\Carbon::parse($audit->created_at)->format('D, M j Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                    {{ $auditTrails->links() }}
                </div>
            </div>
        </div>
    @endif
</div> 
@endsection
