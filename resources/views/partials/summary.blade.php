<div class="bg-white p-8 rounded-xl shadow-lg w-1/4 mb-8 ml-8 hover:shadow-2xl transition duration-300">
    <?php
    $image = \App\Models\PostImage::where('slug', $post->slug)->latest()->value('path');
    ?>
    <div
        style="background: url('{{ asset('storage/blog/'. $image) }}'); width: 100%; height: 200px; background-size: cover; background-position: center"></div>
    <small class="text-sm text-gray-400 pt-1">Posted {{ $post->created_at->diffForHumans() }}
        in {{ $post->category }}</small>

    <a href="{{ route('posts.show', [$post->slug]) }}">
        <h1 class="text-xl capitalize font-bold">{{ $post->title }}</h1>
    </a>

    <form method="post" action="{{ route('posts.destroy', [$post->slug]) }}">
        @csrf @method('delete')
        <div class="flex flex-row justify-between mt-4">
                <div>
                    <a
                        href="{{ route('posts.edit', [$post->slug])}}"
                        class="bg-green-400 hover:bg-green-600 transition duration-300 text-white font-bold px-5 py-1 rounded-xl shadow-lg hover:shadow-xl"
                    >
                        Edit
                    </a>
                </div>
                <div class="control">
                    <button type="submit"
                            class="bg-red-400 hover:bg-red-600 transition duration-300 text-white font-bold px-5 py-1 rounded-xl shadow-lg hover:shadow-xl">
                        Delete
                    </button>
                </div>
            </div>
        </form>
</div>
