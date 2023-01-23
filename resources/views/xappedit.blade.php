<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/edit_style.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("投稿編集画面") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="form_box">
                        <img src="{{$post->image}}">
                        <form action="/mylist/edit/{{$post->id}}/store" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form_box_input_file">
                                <label>
                                    <input type="file" name="post[image]" accept="image/*" required>
                                </label>
                            </div>
                            <input type="hidden" name="post[image2]" value="{{$post->image}}" readonly>
                            <input type="hidden" name="post[created_at]" value="{{$post->created_at}}" readonly>
                            <input type="hidden" name="post[user_id]" value="{{$post->user_id}}" readonly>
                            <div class="form_box_container">
                                <div id="id_form_box_box"  class="form_box_input_text">
                                    <p>タイトル↓</p>
                                    <input type="text" name="post[title]" placeholder="タイトル" value="{{$post->title}}" required>
                                </div>
                                <div id="id_form_box_box" class="form_box_textarea">
                                    <p>内容↓</p>
                                    <textarea name="post[body]" placeholder="イラストについて書きたい事をお願いします！" value="{{$post->body}}"></textarea>
                                </div>
                                <div id="id_form_box_box"  class="form_box_textarea2">
                                    <p>呪文↓</p>
                                    <textarea name="post[spell]" placeholder="background,2d,room, pc,monochrome color, red art, gray scale,window,hand focusなど、イラスト生成に使った呪文を書きたい方はお願いします！" value="{{$post->spell}}"></textarea>
                                </div>
                            </div>
                            <div>
                               <button type="submit">変更する</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>