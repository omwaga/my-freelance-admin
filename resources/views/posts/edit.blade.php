<x-app-layout>
    <x-slot name="header">
        <div class="flex flec-row">
            <h1 class="text-xl text-blue-500 font-bold">Edit post</h1>
            <div class="absolute right-20">
                <a href="{{ \Illuminate\Support\Facades\URL::previous() }}"
                   class="bg-green-400 hover:bg-green-600 text-white p-2 px-5 rounded-xl font-bold shadow-lg hover:shadow-xl transition duration-300">Go
                    Back</a>
            </div>
        </div>

    </x-slot>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    @foreach($post as $p)
        <div class="pt-20 mx-auto flex flex-col justify-center content-center items-center mb-4">
            <h1 class="text-xl">Edit Post</h1>

            <form method="post" action="{{ route('posts.update') }}" class="w-2/3" enctype="multipart/form-data">
                @csrf
                @include('partials.errors')
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input type="text" name="title" value="{{ $p->title }}" class="w-full p-2 rounded border"
                               placeholder="Title"
                               minlength="5" maxlength="100" required/>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="label" for="image">Featured Image</label>
                    <div class="control">
                        <input type="file" name="image" value="{{ old('image') }}"
                               class="w-full p-2 rounded border bg-white"
                               minlength="5" maxlength="100" required accept="image/*"/>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="" for="content">Content</label>
                    <div class="control w-full">
                        <textarea class="ckeditor form-control" name="content">{{ $p->content }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="label">Category</label>
                    <div class="control">
                        <div class="select">
                            <input name="category" required class="w-full p-2 bg-white rounded border"
                                   value="{{ $p->category }}">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="control flex justify-center">
                        <button type="submit"
                                class="bg-green-400 rounded-2xl shadow-lg hover:shadow-xl hover:bg-green-600 font-bold text-white p-2 px-5">
                            Publish
                        </button>
                    </div>
                </div>

            </form>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('wysiwyg-editor', {
                filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>
    @endforeach

</x-app-layout>

