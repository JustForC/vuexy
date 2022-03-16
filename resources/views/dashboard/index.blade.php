@extends('layout.app')

@section('title', 'Category')

@section('content')

@include('components.header')
@include('components.sidebar')
@include('dashboard.category.content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('components.footer')


@endsection