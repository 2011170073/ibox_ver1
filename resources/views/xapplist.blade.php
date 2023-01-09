<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("全ての投稿を一覧") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <p>{{$post->user->name}}</p>
                        <p>{{$post->created_at}}</p>
                        <a href="/detail/{{$post->id}}">詳細(body部分を触ると詳細へ飛ぶようにしたい)</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>