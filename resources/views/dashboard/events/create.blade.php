@extends('layouts.dashboard')


@section('title','Events')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Events</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.events.store') }}" method="POST" enctype="multipart/form-data" class="p-2">
        @csrf
        @include('dashboard.events._form',['button_label' => 'Create'])
    </form>
@endsection
