<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold uppercase text-center py-8">Etiqueta: {{$tag->name}}</h1>

        @foreach ($posts as $post)
            {{-- Componente anonimo --}}
            <x-card-post :post="$post">
            </x-card-post>
        @endforeach

        <div class="my-4">
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>
