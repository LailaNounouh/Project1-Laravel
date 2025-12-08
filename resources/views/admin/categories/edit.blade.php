@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-3xl font-bold text-pink-600 mb-8">
            Categorie bewerken
        </h1>

        <div class="bg-white rounded-xl shadow p-6">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @method('PUT')
                @include('admin.categories._form')
            </form>
        </div>

    </div>
@endsection

