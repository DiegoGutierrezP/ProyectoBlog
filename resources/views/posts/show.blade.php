<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-lg text-gray-500 mb-2">
             {{-- {{$post->extract}} --}}
             {!! $post->extract !!}{{-- usamos estos signos para que laravel considere las etiquetas html y no aparescan--}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
           {{--contenido principal--}}
            <div class="md:col-span-2 ">
                <figure>
                    <img class="w-full h-80 object-cover object-center"
                    src="@if($post->image) {{Storage::url($post->image->url)}}
                    @else https://cdn.pixabay.com/photo/2021/12/22/16/50/landscape-6887936_960_720.jpg @endif">

                </figure>
                <div class="text-base text-gray-500 mt-4">
                   {{-- {{$post->body}} --}}
                   {!! $post->body !!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold -text-gray-600 mb-4">Más en {{$post->category->name}}</h1>
                <ul>
                    @foreach ($similares as $simi)
                        <li class="mb-4">
                            <a  class="flex" href="{{route('posts.show',$simi)}}">
                                <img class="w-36 h-20 object-cover object-center" src="@if($simi->image) {{Storage::url($simi->image->url)}}
                                @else https://cdn.pixabay.com/photo/2021/12/22/16/50/landscape-6887936_960_720.jpg @endif">
                                <span class="ml-2 text-gray-600">{{$simi->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
