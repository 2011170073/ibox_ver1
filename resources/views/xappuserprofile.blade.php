<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>{{$user_id->name}}のプロフ</h1>
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--投稿一覧-->
                    @foreach($posts as $post)
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <img src="{{$post->image}}">
                        <p>呪文：{{$post->spell}}</p>
                        <a href="/detail/{{$post->id}}">詳細(body部分を触ると詳細へ飛ぶようにしたい)</a>
                        @if(Auth::user()->is_likeing($post->id))<!-- その投稿をいいねしている場合 -->
                            <form action="/list/unlike/{{$post->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">いいね解除</button>
                            </form>
                        @else
                            <form action="/list/dolike/{{$post->id}}" method="POST">
                                @csrf
                                <button type="submit">いいね</button>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>