@extends('admin.admin')
@section('title', $title)

@section('content')
    <div class="flex flex-col gap-4">
        <div class="stats shadow w-full">
            <!-- Your existing stats code -->
        </div>

        <div class="overflow-x-auto w-full">
            <h2 class="text-4xl font-bold">All Logs</h2>
            <table class="table w-full">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>URL</th>
                    <th>Method</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                    <th>User ID</th>
                    <th>Timestamp</th>
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
