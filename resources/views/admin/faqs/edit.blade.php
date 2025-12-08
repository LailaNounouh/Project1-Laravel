@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-3xl font-bold text-pink-600 mb-6">FAQ bewerken</h1>

        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                @csrf
                @method('PUT')

                @include('admin.faqs._form')
            </form>
        </div>

    </div>
@endsection
