<x-app-layout>
    <x-slot name="header">
        <div class="flex flec-row">
            <h1 class="text-xl text-blue-500 font-bold">Posts</h1>
            <div class="absolute right-20">
                <a href="{{ route('post.create') }}"
                   class="bg-green-400 hover:bg-green-600 text-white p-2 px-5 rounded-xl font-bold shadow-lg hover:shadow-xl transition duration-300">Create
                    New Post</a>
            </div>
        </div>
    </x-slot>
    <div class="flex flex-col justify-center mt-10">
        <div class="flex flex-row flex-wrap">
            @foreach ($posts as $post)
                @include('partials.summary')
            @endforeach
        </div>
    </div>
</x-app-layout>
