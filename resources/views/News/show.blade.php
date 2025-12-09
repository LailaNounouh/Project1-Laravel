@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">

        <article class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">
                {{ $news->title }}
            </h1>

            @if($news->image)
                <div class="mb-5">
                    <img src="{{ asset('storage/'.$news->image) }}"
                         alt="{{ $news->title }}"
                         class="w-full max-h-96 object-cover rounded-lg">
                </div>
            @endif

            <div class="prose max-w-none text-gray-800 text-sm leading-relaxed">
                {!! nl2br(e($news->content)) !!}
            </div>

            <p class="mt-4 text-xs text-gray-500">
                Gepubliceerd op {{ $news->created_at?->format('d/m/Y H:i') }}
            </p>
        </article>

        <section class="mt-10">
            <h2 class="text-xl font-semibold mb-4 text-pink-600">
                Reacties
            </h2>

            @forelse($news->comments as $comment)
                <div class="mb-3 bg-gray-50 border border-gray-100 rounded-lg p-4">
                    <p class="text-sm font-medium text-gray-900">
                        {{ $comment->user->name }}
                    </p>
                    <p class="mt-1 text-sm text-gray-700">
                        {{ $comment->content }}
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        {{ $comment->created_at?->diffForHumans() }}
                    </p>
                </div>
            @empty
                <p class="text-sm text-gray-500">
                    Er zijn nog geen reacties op dit bericht.
                </p>
            @endforelse

            @auth
                <form method="POST" action="{{ route('comments.store', $news->id) }}" class="mt-6 space-y-3">
                    @csrf
                    <label class="block text-sm font-medium text-gray-700">
                        Reageer op dit nieuws
                    </label>
                    <textarea
                        name="body"
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                        placeholder="Schrijf een reactie..."
                        required
                    ></textarea>

                    <button class="btn-glam text-sm">
                        Reactie plaatsen
                    </button>
                </form>
            @else
                <p class="mt-4 text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="text-pink-600 underline">
                        Log in
                    </a>
                    om een reactie te plaatsen.
                </p>
            @endauth
        </section>
    </div>
@endsection
