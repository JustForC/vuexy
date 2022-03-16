@extends('layout.app')

@section('title', 'Product')

@section('content')

@include('components.header')
@include('components.sidebar')
@include('dashboard.product.content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('components.footer')


@endsection

@section('javascript')
@include('dashboard.product.javascript')
@endsection