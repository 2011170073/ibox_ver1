<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("いいね一覧") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>{{$post->user_id}}</p>
                        <p>{{$post->title}}</p>
                        <p>{{$post->body}}</p>
                        <img src="{{$post->image}}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>