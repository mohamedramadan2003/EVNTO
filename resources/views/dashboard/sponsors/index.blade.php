@extends('layouts.dashboard')


@section('title','sponsors')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">sponsors</li>
@endsection

@section('content')
    <div class="mb-5 p-3 ">
        <a class="btn btn-small btn-outline-primary" href="{{ route('dashboard.sponsors.create') }}">New sponsor</a>
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
        @forelse($sponsors as $sponsor)
            <tr>
                <td>{{ $sponsor->id }}</td>
                <td><a href="{{ route('dashboard.sponsors.show',$sponsor->id) }}"> {{ $sponsor->name }}</a></td>
                <td>{{ $sponsor->email }}</td>
                <td>
                    <a href="{{ route('dashboard.sponsors.edit' , $sponsor->id) }}" class="btn btn-sm btn-outline-success" >Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.sponsors.destroy' , $sponsor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No sponsors defined</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
