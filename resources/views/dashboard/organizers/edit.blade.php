@extends('layouts.dashboard')


@section('title','Organizers')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Organizers</li>
    <li class="breadcrumb-item active">Edit Organizer</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.organizers.update',$organizer->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('dashboard.organizers._form',['button_label' => 'Update'])
    </form>
@endsection
