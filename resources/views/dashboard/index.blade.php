@extends('layouts.dashboard')

@section('title','Starter Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Starter Page</li>
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
           <x-dashboard.card />
        </section>
    <!-- /.content- -->

@endsection
