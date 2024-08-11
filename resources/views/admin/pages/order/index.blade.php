@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between mb-4">
            <div class="opacity-75">
                @if($search)
                    Search
                    <span class="badge badge-primary badge-outline">{{ $search }}</span>
                    found {{ count($items) }} result(s)
                @endif
            </div>
            <div class="flex join">
                <label class="input input-bordered flex items-center gap-2 join-item">
                    <form action="{{route('AdminOrderList')}}">
                        <input type="text" name="search" value="{{ old('search', $search) }}"
                               placeholder="Search...">
                    </form>
                </label>
                @if($search)
                    <a href="{{ route('AdminOrderList') }}" class="btn join-item">Get All</a>
                @endif
            </div>
        </div>

        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Quantity</th>
                    <th>Pre-Tax</th>
                    <th>Post-Tax</th>
                    <th>Status</th>
                    <th>Recipient</th>
                    <th>Order Time</th>
                    <th class="px-0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $order)
                    <tr class="hover">
                        <td>
                            <a href="{{ route('AdminOrderShow', $order->id) }}"> {{ $order->id }}</a>
                        </td>
                        <td>
                                {{ $order->user->name }}
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ number_format($order->pre_tax_amount, 2) }}</td>
                        <td>${{ number_format($order->post_tax_amount, 2) }}</td>
                        <td>
                            @php
                                $statusClasses = [
                                    'Pending'    => 'badge-default',
                                    'Shipped'    => 'badge-neutral',
                                    'Delivered'  => 'badge-primary',
                                    'Confirmed'  => 'badge-primary',
                                    'Cancelled'  => 'badge-secondary'
                                ];
                                $statusClass = $statusClasses[$order->status] ?? 'badge-ghost';
                            @endphp
                            <div class="badge {{ $statusClass }}">
                                {{ $order->status }}
                            </div>
                        </td>
                        <td>
                            <p>{{ $order->shipping_name }}</p>
                            <p class="opacity-75 text-sm">{{ $order->recipient_email }}</p>
                            <p class="opacity-75 text-sm">{{ $order->recipient_phone }}</p>
                        </td>
                        <td>
                            {{$order->created_at}}
                        </td>
                        <td class="px-0">
                            <div class="join flex w-full">
                                <a href="{{ route('AdminOrderShow', $order->id) }}"
                                   class="btn btn-primary join-item flex-1">Details
                                </a>
                                <form action="{{ route('AdminOrderDestroy', $order->id) }}" method="POST"
                                      class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')"
                                            class="btn join-item">Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin.components.pagination')
    </div>
@endsection
