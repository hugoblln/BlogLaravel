@props(['post' => null])

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
    <form method="POST" action="{{ $post ? route('posts.update', $post) : route('posts.store') }}" class="space-y-6">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">
                Titre
            </label>
            <input
                type="text"
                name="title"
                id="title"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm
                       focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Titre du post"
                value="{{$post?->title}}"
            >
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">
                Contenu
            </label>
            <textarea
                name="content"
                id="content"
                rows="5"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm
                       focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Écris ton contenu ici..."
            >{{$post?->content}}</textarea>
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
