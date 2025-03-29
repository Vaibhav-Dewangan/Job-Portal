@extends('layouts.app')

@section('page-class', 'content-margin-home')

@section('content')
<div class="container pt-2 pb-5 ">
    @include('components.job_card_indepth')
</div>
@endsection