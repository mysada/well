@extends('admin.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col gap-4">
        <!-- Your existing content for stats -->

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
