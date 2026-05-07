@extends('cms.layouts.app')

@section('title', 'Edit User CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Edit User')

@section('content')
    <form method="POST" action="{{ route('cms.users.update', $user) }}" class="space-y-6">
        @csrf
        @method('PUT')

        @include('cms.pages.user.partials.form')
    </form>
@endsection
