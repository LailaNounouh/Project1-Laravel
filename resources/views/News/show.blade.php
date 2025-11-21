@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <article>
            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

            @if($news->image)
                <img src="{{ asset('storage/'.$news->image) }}" alt="" class="w-full max-w-2xl mb-4 rounded-lg shadow">
            @endif

            <div class="prose">
                {!! $news->content !!}
            </div>

            <p class="text-sm text-gray-600 mt-4">
                Geplaatst op {{ $news->created_at->format('d/m/Y H:i') }}
            </p>
        </article>


        <section class="mt-10">
            <h3 class="text-xl font-bold mb-4">Reacties</h3>


            @forelse($news->comments as $comment)
                <div class="p-4 bg-gray-100 rounded-lg mb-3">
                    <strong class="text-pink-600">{{ $comment->user->name }}</strong>
                    <p class="mt-1 text-gray-700">{{ $comment->body }}</p>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">Er zijn nog geen reacties. Wees de eerste!</p>
            @endforelse


            @auth
                <form method="POST" action="{{ route('comments.store', $news->id) }}" class="mt-6">
                    @csrf

                    <textarea name="body"
                              class="w-full border p-3 rounded-lg"
                              placeholder="Schrijf een reactie..."
                              required></textarea>

                    <button class="mt-3 bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">
                        Plaatsen
                    </button>
                </form>
            @else
                <p class="mt-4 text-gray-600">
                    <a href="{{ route('login') }}" class="text-pink-600 underline">Log in</a> om een reactie te plaatsen.
                </p>
            @endauth
        </section>
    </div>
@endsection

