@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">
            Nieuwsbericht bewerken
        </h1>

        @include('news._form')

    </div>
@endsection
