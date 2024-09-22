@extends('layouts.dashboard')


@section('title','Organizers')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Organizers</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.organizers.store') }}" method="POST" enctype="multipart/form-data" class="p-2">
        @csrf
        @include('dashboard.organizers._form',['button_label' => 'Create'])
    </form>
@endsection
