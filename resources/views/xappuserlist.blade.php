<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/userlist_style.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
        <form method="GET" action="/userlist/search">
            <input type="text" name="keyword" placeholder="ユーザー名入力" value="@if (isset($keyword)) {{$keyword}} @endif">
            <button type="submit">検索</button>
        </form>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($users as $user)
                @if(Auth::user()->id == $user->id)
                @else
                    <div class="box1">
                        <div class="box1_container">
                            <a href="/userprofile/{{$user->id}}"><h1>{{$user->name}}</h1></a>
                            <div class="box1_container_img" style="background-image:url('{{$user->icon}}')"></div>
                            @if(Auth::user()->is_following($user->id))<!-- そのユーザをフォローしている場合 -->
                                <form action="/userlist/unfollow/{{$user->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit">フォロー解除</button>
                                </form>
                            @else
                                <form action="/userlist/dofollow/{{$user->id}}" method="POST">
                                    @csrf
                                    <button type="submit">フォローする</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>