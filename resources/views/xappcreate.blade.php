<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/create_style.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("投稿作成画面") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="form_box">
                        <form action="/create/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form_box_input_file">
                                <label>
                                    <input type="file" name="post[image]" accept="image/*" required>
                                </label>
                            </div>
                            <div class="form_box_container">
                                <div id="id_form_box_box"  class="form_box_input_text">
                                    <p>タイトル↓</p>
                                    <input type="text" name="post[title]" placeholder="タイトル" required>
                                </div>
                                <div id="id_form_box_box" class="form_box_textarea">
                                    <p>内容↓</p>
                                    <textarea name="post[body]" placeholder="イラストについて書きたい事をお願いします！"></textarea>
                                </div>
                                <div id="id_form_box_box"  class="form_box_textarea2">
                                    <p>呪文↓</p>
                                    <textarea name="post[spell]" placeholder="background,2d,room, pc,monochrome color, red art, gray scale,window,hand focusなど、イラスト生成に使った呪文を書きたい方はお願いします！"></textarea>
                                </div>
                            </div>
                            <div>
                               <button type="submit">投稿する</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function validate(){
        
    }
</script>