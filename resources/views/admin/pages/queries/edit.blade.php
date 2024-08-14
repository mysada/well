@extends('admin.admin')

@section('content')
    <div class="container flex flex-col gap-8">

        <div class="flex justify-end">
            <a href="{{ route('admin.queries') }}" class="btn  btn-primary mb-3">Back to Product List</a>
        </div>

        <form class="w-full grid grid-cols-2 place-items-center gap-4" action="{{ route('admin.queries.update', $query->id) }}" method="POST" >
            @csrf
            @method('PUT')

            <div class="form-control w-full">
                <label for="name" class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" name="name" class="input input-bordered" value="{{ old('name', $query->name) }}"
                       required>
                @error('name')
                <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered" value="{{ old('email', $query->email) }}"
                       required>
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
                <input type="text" name="subject" class="input input-bordered"
                       value="{{ old('subject', $query->subject) }}" required>
                @error('subject')
                <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <label for="message" class="label">
                    <span class="label-text">Message</span>
                </label>
                <textarea name="message" class="textarea textarea-bordered"
                          required>{{ old('message', $query->message) }}</textarea>
                @error('message')
                <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-wide">Update Query</button>
        </form>
    </div>
@endsection
