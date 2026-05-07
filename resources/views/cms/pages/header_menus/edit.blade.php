@extends('cms.layouts.app')

@section('title', 'Edit Menu - ' . config('app.name'))

@section('content')
    <div class="max-w-3xl">
        <section class="rounded-2xl border border-cms-line bg-white p-6">
            <h1 class="text-lg font-extrabold">Edit Menu</h1>
            <form action="{{ route('cms.header-menus.update', $menu) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                @include('cms.pages.header_menus._form')
            </form>
        </section>
    </div>
@endsection
