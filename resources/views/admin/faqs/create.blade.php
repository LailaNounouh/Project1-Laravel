@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Nieuwe FAQ</h1>

        <form method="POST" action="{{ route('admin.faqs.store') }}">
            @csrf

            @include('admin.faqs._form')
        </form>
    </div>
@endsection
