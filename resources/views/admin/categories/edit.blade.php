@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">
            Categorie bewerken
        </h1>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @method('PUT')
                @include('admin.categories._form')
            </form>
        </div>
    </div>
@endsection

