@extends('admin.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col gap-8">
        <div>
            <h2 class="text-4xl font-bold mb-4">Statics</h2>
            <div class="stats shadow w-full flex flex">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Revenue</div>
                    <div class="stat-value text-primary">${{$stats['totalRevenue']}}</div>
                    <div class="stat-desc">Average: ${{$stats['averageRevenue']}}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Orders</div>
                    <div class="stat-value text-secondary">{{$stats['totalOrders']}}</div>
                    <div class="stat-desc flex justify-between">
                        <div class="">Pending:{{$stats['totalOrdersPending']}}</div>
                        <div class="">Delivered:{{$stats['totalOrdersDelivered']}}</div>
                    </div>

                </div>

                <div class="stat">
                    <div class="stat-title">Total User</div>
                    <div class="stat-value text-accent">{{$stats['totalUser']}}</div>
                    <div class="stat-desc flex justify-between">
                        <div class="">Latest User:{{$stats['latestUser']}}</div>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-value">{{$stats['totalProduct']}}</div>
                    <div class="stat-title">Products For Sale</div>
                    <div class="stat-desc text-secondary">{{$stats['totalCat']}} Categories</div>
                </div>
            </div>
        </div>


        <div>
            <h2 class="text-4xl font-bold mb-4">Top Seller</h2>
            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 border border-gray-100">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left text-gray-600">#</th>
                            <th class="text-left text-gray-600">Name</th>
                            <th class="text-left text-gray-600">Popularity</th>
                            <th class="text-left text-gray-600">Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['topSeller'] as $index => $seller)
                            @if($index < 4)
                                <tr class="border-b">
                                    <td class="py-4">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                    <td class="py-4">{{ $seller['name'] }}</td>
                                    <td class="py-4">
                                        <div class="relative w-56 bg-gray-100 rounded-full h-2">
                                            @php
                                                $width = [80, 65, 50, 30][$index] . '%';
                                                $bgClass = ['bg-primary', 'bg-secondary', 'bg-accent', 'bg-warning'][$index]; // Background classes
                                            @endphp
                                            <div class="{{ $bgClass }} h-2 rounded-full"
                                                 style="width: {{ $width }};"></div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-{{ ['primary', 'secondary', 'accent', 'warning'][$index] }} font-medium">{{ [453, 290, 186, 110][$index] }}</td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <h2 class="text-4xl font-bold">Recent Logs</h2>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Url</th>
                        <th>Method</th>
                        <th>Ip Address</th>
                        <th>User Agent</th>
                        <th>User Id</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->event }}</td>
                            <td>{{ $log->url }}</td>
                            <td>{{ $log->method }}</td>
                            <td>{{ $log->ip_address }}</td>
                            <td>{{ $log->user_agent }}</td>
                            <td>{{ $log->user_id ?? 'N/A' }}</td>
                            <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
