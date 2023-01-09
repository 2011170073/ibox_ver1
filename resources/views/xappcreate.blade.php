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
                    <form action="/create/store" method="POST">
                        @csrf
                        <input type="text" name="post[title]" placeholder="タイトル">
                        <textarea name="post[body]" placeholder="こんにちは"></textarea>
                        <input type="text" name="post[image]" placeholder="画像?">
                        <button type="submit">投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>