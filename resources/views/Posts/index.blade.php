@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">
            Derniers articles
        </h1>

    <div class="max-w-md mx-auto mt-6 p-4 bg-white rounded-lg shadow-md">
        <form action="{{ route('posts.index') }}" method="GET" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="q" 
                value="{{ $search }}"
                placeholder="Recherchez un post..." 
                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button 
                type="submit" 
                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition"
            >
                Rechercher
            </button>
        </form>
    </div>


    <div class="grid gap-6 mt-5 sm:grid-cols-2 lg:grid-cols-3">
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
