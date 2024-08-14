@extends('admin.admin')

@section('content')
<div class="container flex flex-col gap-8">
    <div class="flex justify-end">
        <a href="{{ route('admin.queries') }}" class="btn btn-primary">Back to Queries</a>
    </div>

    <div class="mb-6 p-4 border rounded-lg shadow-sm bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <strong>ID:</strong> {{ $query->id }}
            </div>
            <div>
                <strong>Name:</strong> {{ $query->name }}
            </div>
            <div>
                <strong>Email:</strong> {{ $query->email }}
            </div>
            <div>
                <strong>Phone:</strong> {{ $query->phone }}
            </div>
            <div>
                <strong>Subject:</strong> {{ $query->subject }}
            </div>
            <div>
                <strong>Message:</strong> <br>{{ $query->message }}
            </div>
            <div>
                <strong>Received At:</strong> {{ $query->created_at->format('F d, Y h:i A') }}
            </div>
            <div>
                <strong>Status:</strong>
                <span class="badge badge-primary">{{ ucfirst($query->status) }}</span>
            </div>
        </div>
    </div>

    <div class="mb-6 p-4 border rounded-lg shadow-sm bg-white">
        <form action="{{ route('admin.queries.saveFollowUpNotes', $query->id) }}" method="POST">
            @csrf
            <div class="form-control w-full">
                <label for="follow_up_notes" class="label">
                    <span class="label-text">Follow-up Notes</span>
                </label>
                <textarea name="follow_up_notes" id="follow_up_notes" rows="5" class="textarea textarea-bordered">{{ $followUpNotes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Save Notes</button>
        </form>
    </div>

</div>
@endsection
