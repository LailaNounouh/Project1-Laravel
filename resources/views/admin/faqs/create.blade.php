
@extends('layouts.app')
@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Nieuwe FAQ</h1>
        <form method="POST" action="{{ route('admin.faqs.store') }}">
            @include('admin.faqs._form')
        </form>
    </div>
@endsection
