<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->body}}</p>
                    <img src="{{$post->image}}">
                    <p>呪文：{{$post->spell}}</p>
                    <p>{{$post->user->name}}</p>
                </div>
            </div>
            <div class="comment_area">
                @foreach($comments as $comment)
                    <p>{{$comment->user->name}}</p>
                    <p>{{$comment->body}}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>