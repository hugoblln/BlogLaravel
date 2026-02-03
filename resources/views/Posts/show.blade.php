@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">

    {{-- Bouton retour --}}
    <a href="{{ route('posts.index') }}"
       class="inline-block mb-6 text-sm text-indigo-600 hover:text-indigo-800">
        ← Retour aux articles
    </a>

    {{-- Card Article --}}
    <article class="bg-white rounded-2xl shadow-md p-8">

        {{-- Titre --}}
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            {{ $post->title }}
        </h1>

        {{-- Auteur --}}
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <span>
                ✍️ Publié par <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
            </span>
        </div>

        {{-- Contenu --}}
        <div class="prose prose-lg max-w-none text-gray-800">
            {{ $post->content }}
        </div>

    </article>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
    <form method="POST" action="{{ Route('comment.store', $post) }}" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">
               mettre un commentaire : 
            </label>
            <input
                type="text"
                name="content"
                id="content"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm
                       focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Titre du post"
            >
        </div>
        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center px-6 py-2 rounded-lg
                       bg-indigo-600 font-semibold
                       hover:bg-indigo-700 focus:outline-none
                       focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                       transition"
            >
                Valider
            </button>
        </div>
    </form>
</div>
<div class="mt-6">
    <h3 class="text-xl font-semibold mb-4">Commentaires</h3>

    @forelse ($comments as $comment)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4 border border-gray-200">
            <div class="flex items-center justify-between mb-2">
                <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-700">{{ $comment->content }}</p>

            {{-- @can('delete', $comment)
                <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:text-red-700 text-sm">Supprimer</button>
                </form>
            @endcan --}}
        </div>
    @empty
        <p class="text-gray-500">Aucun commentaire pour le moment.</p>
    @endforelse
</div>


</div>
@endsection
