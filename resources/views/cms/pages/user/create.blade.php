@extends('cms.layouts.app')

@section('title', 'Tambah User CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Tambah User')

@section('content')
    <form method="POST" action="{{ route('cms.users.store') }}" class="space-y-6">
        @csrf

        @include('cms.pages.user.partials.form')
    </form>
@endsection
