@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
