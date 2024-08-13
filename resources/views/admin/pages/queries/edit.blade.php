@extends('admin.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Edit Query</h1>

    <form action="{{ route('admin.queries.update', $query->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-control w-full">
            <label for="name" class="label">
                <span class="label-text">Name</span>
            </label>
            <input type="text" name="name" class="input input-bordered" value="{{ old('name', $query->name) }}" required>
            @error('name')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full">
            <label for="email" class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered" value="{{ old('email', $query->email) }}" required>
            @error('email')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full">
            <label for="phone" class="label">
                <span class="label-text">Phone</span>
            </label>
            <input type="text" name="phone" class="input input-bordered" value="{{ old('phone', $query->phone) }}">
            @error('phone')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full">
            <label for="subject" class="label">
                <span class="label-text">Subject</span>
            </label>
            <input type="text" name="subject" class="input input-bordered" value="{{ old('subject', $query->subject) }}" required>
            @error('subject')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full">
            <label for="message" class="label">
                <span class="label-text">Message</span>
            </label>
            <textarea name="message" class="textarea textarea-bordered" required>{{ old('message', $query->message) }}</textarea>
            @error('message')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control w-full">
            <label for="follow_up_notes" class="label">
                <span class="label-text">Follow-Up Notes</span>
            </label>
            <textarea name="follow_up_notes" class="textarea textarea-bordered">{{ old('follow_up_notes', $query->follow_up_notes) }}</textarea>
            @error('follow_up_notes')
            <div class="text-error mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Query</button>
    </form>
</div>
@endsection