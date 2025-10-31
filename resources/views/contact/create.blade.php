@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Nieuw nieuwsbericht</h1>

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Titel</label>
                <input type="text" name="title" value="{{ old('title') }}" class="border rounded w-full p-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Afbeelding (optioneel)</label>
                <input type="file" name="image" accept="image/*" class="border rounded w-full p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Inhoud</label>
                <textarea name="content" rows="8" class="border rounded w-full p-2" required>{{ old('content') }}</textarea>
            </div>

            <div class="flex gap-3">
                <button class="btn-glam">Opslaan</button>
                <a href="{{ route('news.index') }}" class="underline">Annuleren</a>
            </div>
        </form>
    </div>
@endsection


