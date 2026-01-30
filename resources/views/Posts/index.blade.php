@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">
        Derniers articles
    </h1>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        {{ $post->title }}
                    </h2>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $post->content }}
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-gray-500">
                            ✍️ {{ $post->user->name }}
                        </span>

                        <a href="{{ route('posts.show', $post) }}"
                           class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            Lire la suite →
                        </a>

                        <a href="{{route('posts.edit', $post)}}"
                        class="text-sm font-medium text-blue-600 hover:text-blue-800">
                            modifier
                        </a>
                        <form method="POST" action="{{route('posts.destroy', $post)}}">
                            @csrf
                             @method('DELETE')
                            <button type="submit">supprimer</button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
@endsection
