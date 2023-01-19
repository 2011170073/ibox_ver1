<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("投稿編集画面") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <img src="{{$post->image}}">
                    <form action="/mylist/edit/{{$post->id}}/store" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <!--<input type="hidden" name="post[id]" value="{{$post->id}}" readonly> -->
                        <input type="text" name="post[title]" value="{{$post->title}}">
                        <input type="text" name="post[body]" value="{{$post->body}}">
                        <input type="hidden" name="post[image2]" value="{{$post->image}}">
                        <input type="file" name="post[image]">
                        <input type="text" name="post[spell]" value="{{$post->spell}}">
                        <input type="hidden" name="post[created_at]" value="{{$post->created_at}}" readonly>
                        <input type="hidden" name="post[user_id]" value="{{$post->user_id}}" readonly>
                        <button type="submit">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>