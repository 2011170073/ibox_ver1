<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('/css/list_style.css')  }}" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
        <form method="GET" action="/search">
            <input type="text" name="keyword" placeholder="イラスト検索" value="@if (isset($keyword)) {{$keyword}} @endif">
            <button type="submit">検索</button>
        </form>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div id="id_flex1_box" class="p-6 text-gray-900">
                        <a id="id_flex1_a" href="/detail/{{$post->id}}">
                            <div id=id_flex1_box_box1 style="background-image:url('{{$post->image}}')"></div>
                        </a>
                        <div id="id_flex1_box_box2">
                            <p>{{$post->title}}</p>
                            @if(Auth::user()->id == $post->user->id)<!--自分の投稿に対して -->
                                投稿主:<a href="/mylist/{{$post->user->id}}">{{$post->user->name}}</a>
                            @else<!--自分以外の投稿に対して-->
                                投稿主:<a href="/userprofile/{{$post->user->id}}">{{$post->user->name}}</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
               {{$posts->appends(Request::only('keyword'))->links()}}
            </div>
        </div>
    </div>
</x-app-layout>