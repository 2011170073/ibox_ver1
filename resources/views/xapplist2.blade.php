<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('/css/list_style.css')  }}" >
        <form method="GET" action="/list/search">
            <input type="text" name="keyword" placeholder="イラスト検索" value="@if (isset($keyword)) {{$keyword}} @endif">
            <button type="submit">検索</button>
        </form>
        <script>
            if("{{isset(Auth::user()->id)}}" == true){//ログインしている時
                window.location.replace('./');
            }
        </script>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div id="id_flex1_box" class="p-6 text-gray-900">
                        <a id="id_flex1_a" href="list/detail/{{$post->id}}">
                            <div id=id_flex1_box_box1 style="background-image:url('{{$post->image}}')"></div>
                        </a>
                        <div id="id_flex1_box_box2">
                            <p>{{$post->title}}</p>
                                投稿主:<a href="list/userprofile/{{$post->user->id}}">{{$post->user->name}}</a>
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