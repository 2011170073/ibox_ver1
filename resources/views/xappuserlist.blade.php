<x-app-layout>
    <x-slot name="header">
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>ユーザー名：{{$user->name}}</p>
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
            @endforeach
        </div>
    </div>
</x-app-layout>