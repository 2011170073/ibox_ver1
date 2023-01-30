<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/userprofile_style.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="box1">
                <div class="box1_container">
                    <h1>{{$user_id->name}}</h1>
                    <div class="box1_container_img" style="background-image:url('{{$user_id->icon}}')">
                        
                    </div>
                    @if(Auth::user()->is_following($user_id->id))<!-- そのユーザをフォローしている場合 -->
                        <form action="/userlist/unfollow/{{$user_id->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">フォロー解除</button>
                        </form>
                    @else
                        <form action="/userlist/dofollow/{{$user_id->id}}" method="POST">
                            @csrf
                            <button type="submit">フォローする</button>
                        </form>
                    @endif
                </div>
            </div>
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div id="id_flex1_box" class="p-6 text-gray-900">
                        <a id="id_flex1_a" href="/detail/{{$post->id}}">
                            <div id=id_flex1_box_box1 style="background-image:url('{{$post->image}}')"></div>
                        </a>
                        <div id="id_flex1_box_box2">
                            <p>{{$post->title}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>