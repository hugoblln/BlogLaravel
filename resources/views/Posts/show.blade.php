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

</div>
@endsection
