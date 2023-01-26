<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>{{$user_id->name}}のプロフィール</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--投稿一覧-->
                    @foreach($posts as $post)
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <img src="{{$post->image}}">
                        <p>呪文：{{$post->spell}}</p>
                        <a href="list/detail/{{$post->id}}">詳細(body部分を触ると詳細へ飛ぶようにしたい)</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>