@extends('cms.layouts.app')

@section('title', 'Edit Menu CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Edit Menu')

@section('content')
    <form method="POST" action="{{ route('cms.header-menus.update', $menu) }}" class="space-y-6">
        @csrf
        @method('PUT')

        @include('cms.pages.header_menus._form')
    </form>
@endsection
