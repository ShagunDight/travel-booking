@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Taxi Inquiries</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Trip Type</th>
                <th>Pickup</th>
                <th>Drop</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Return Date</th>
                <th>Return Time</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->id }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->number }}</td>
                    <td>{{ ucfirst($inquiry->trip_type) }}</td>
                    <td>{{ $inquiry->pickup }}</td>
                    <td>{{ $inquiry->drop }}</td>
                    <td>{{ $inquiry->pickup_date }}</td>
                    <td>{{ $inquiry->pickup_time }}</td>
                    <td>{{ $inquiry->return_date }}</td>
                    <td>{{ $inquiry->return_time }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <form action="{{ route('admin.taxi.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" class="text-center">No inquiries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $inquiries->links() }}
</div>
@endsection
