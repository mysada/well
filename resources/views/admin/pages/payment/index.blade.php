@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between mb-4">
            <div class="opacity-75">
                @if($search)
                    Search
                    <span class="badge badge-primary badge-outline">{{ $search }}</span>
                    {{ $payments->total() }} result(s) found
                @endif
            </div>
            <div class="flex join">
                <label class="input input-bordered flex items-center gap-2 join-item">
                    <form action="{{route('AdminPaymentList')}}">
                        <input type="text" name="search" value="{{ old('search', $search) }}"
                               placeholder="Search...">
                    </form>
                </label>
                @if($search)
                    <a href="{{ route('AdminPaymentList') }}" class="btn join-item">Get All</a>
                @endif
            </div>
        </div>

        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payer Name</th>
                    <th>Payer Card</th>
                    <th>Create Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr class="hover">
                        <td>{{ $payment->id }}</td>
                        <td>
                            <a class="link-primary link"
                               href="{{ route('AdminOrderShow', $payment->order_id) }}"> {{ $payment->order_id }}</a>
                        </td>
                        <td>{{ $payment->method }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>
                            @php
                                $statusClasses = [
                                    'Pending'    => 'badge-secondary',
                                    'Completed'    => 'badge-primary',
                                    'Failed'  => 'badge-default',
                                ];
                                $statusClass = $statusClasses[$payment->status] ?? 'badge-ghost';
                            @endphp
                            <div class="badge {{ $statusClass }}">
                                {{ $payment->status }}
                            </div>
                        </td>
                        <td>{{ $payment->payer_name }}</td>
                        <td>{{ $payment->payer_card }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @include('admin.components.pagination', ['items' => $payments])
    </div>
@endsection
