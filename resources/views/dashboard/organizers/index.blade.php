@extends('layouts.dashboard')


@section('title','Organizers')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Organizers</li>
@endsection

@section('content')
    <div class="mb-5 p-3 ">
        <a class="btn btn-small btn-outline-primary" href="{{ route('dashboard.organizers.create') }}">New organizer</a>
    </div>

    <x-alert type="success"/>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($organizers as $organizer)
            <tr>
                <td>{{ $organizer->id }}</td>
                <td><a href="{{ route('dashboard.organizers.show',$organizer->id) }}"> {{ $organizer->name }}</a></td>
                <td>{{ $organizer->email }}</td>
                <td>
                    <a href="{{ route('dashboard.organizers.edit' , $organizer->id) }}" class="btn btn-sm btn-outline-success" >Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.organizers.destroy' , $organizer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No organizers defined</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $organizers->withQueryString()->links() }}
@endsection
