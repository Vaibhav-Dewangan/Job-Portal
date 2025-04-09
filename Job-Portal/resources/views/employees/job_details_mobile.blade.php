@extends('layouts.app')

@section('page-class', 'content-margin-home')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="container pt-2 pb-5 ">
    @include('employees.components.job_card_indepth')
</div>
@endsection