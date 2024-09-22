@extends('layouts.dashboard')


@section('title','Events')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Events</li>
@endsection

@section('content')
    <div class="mb-5 p-3 ">
        <a class="btn btn-small btn-outline-primary" href="{{ route('dashboard.events.create') }}">New event</a>
    </div>

    <x-alert type="success"/>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Organizer Name</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td><a href="{{ route('dashboard.events.show',$event->id) }}"> {{ $event->name }}</a></td>
                <td>{{ $event->organizer->name }}</td>
                <td>
                    <a href="{{ route('dashboard.events.edit' , $event->id) }}" class="btn btn-sm btn-outline-success" >Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.events.destroy' , $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No events defined</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $events->withQueryString()->links() }}
@endsection
