@extends('layouts.dashboard')


@section('title','Profile')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Profile</li>
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.profile.update',$profile->id) }}" method="POST"  enctype="multipart/form-data" class="p-2">
        @csrf
        @method('PUT')
        @include('dashboard.profile._form',['button_label' => 'Update'])
    </form>
@endsection
