<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("プロフィール") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="icon" accept="image/*">
                <button type="submit">アイコン設定</button>
            </form>
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>

<script>
</script>