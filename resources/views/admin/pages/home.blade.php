@extends('admin.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col gap-4">
        <div class="stats shadow w-full">
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
                <div class="stat-title">Total Likes</div>
                <div class="stat-value text-primary">25.6K</div>
                <div class="stat-desc">21% more than last month</div>
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
                <div class="stat-title">Page Views</div>
                <div class="stat-value text-secondary">2.6M</div>
                <div class="stat-desc">21% more than last month</div>
            </div>

            <div class="stat">
                <div class="stat-value">86%</div>
                <div class="stat-title">Tasks done</div>
                <div class="stat-desc text-secondary">31 tasks remaining</div>
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <h2 class="text-4xl font-bold">Recent Logs</h2>
            <table class="table w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th>Time</th>
                    <th>Level</th>
                    <th>Message</th>
                    <th>Context</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    @php
                        // Example: [2024-08-09 14:00:01] local.INFO: User logged in successfully {"user_id":1}
                        preg_match('/\[(.*?)\].*?(\w+)\.(\w+): (.*?)(\{.*\})/', $log, $matches);
                        $time = $matches[1] ?? '';
                        $level = $matches[3] ?? '';
                        $message = $matches[4] ?? '';
                        $context = $matches[5] ?? '';
                    @endphp
                    <tr>
                        <td>{{ $time }}</td>
                        <td>{{ $level }}</td>
                        <td>{{ $message }}</td>
                        <td>{{ $context }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
