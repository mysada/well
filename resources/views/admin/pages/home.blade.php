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
                    <th>Url</th>
                    <th>MEthod</th>
                    <th>Ip address</th>
                    <th>User agent</th>
                    <th>User Id</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
