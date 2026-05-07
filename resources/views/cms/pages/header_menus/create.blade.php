@extends('cms.layouts.app')

@section('title', 'Tambah Menu CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Tambah Menu')

@section('content')
    <form method="POST" action="{{ route('cms.header-menus.store') }}" class="space-y-6">
        @csrf

        @include('cms.pages.header_menus._form')
    </form>
@endsection
