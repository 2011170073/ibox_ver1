<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("投稿作成画面") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/create/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="post[title]" placeholder="タイトル">
                        <textarea name="post[body]" placeholder="こんにちは"></textarea>
                        <textarea name="post[spell]" placeholder="background,2d,room, pc,monochrome color, red art, gray scale,window,hand focus など"></textarea>
                        <input type="file" name="post[image]">
                        <button type="submit">投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>