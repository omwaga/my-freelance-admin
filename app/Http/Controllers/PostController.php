<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use DomDocument;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        // Get all Posts, ordered by the newest first
        $posts = Post::latest()->get();

        // Pass Post Collection to view
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'content' => 'required|string|min:5',
            'category' => 'required|string|max:30',
            'image' => 'required'
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');
        $editor_content = $request->get('content');
        $dom = new DomDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHtml($editor_content);
        $validated['content'] = $dom->saveHTML();
        $extension = $request->image->extension();
        $request->image->storeAs('/public/blog', $validated['slug'] . "." . $extension);
        $postImage = new PostImage();
        $postImage->slug = $validated['slug'];
        $postImage->path = $validated['slug'] . "." . $extension;
        $postImage->save();

        // Create and save post with validated data
        $post = Post::create($validated);

        // Redirect the user to the created post with a success notification
        return redirect(route('posts', [$post->slug]))->with('notification', 'Post created!');
    }


    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View|Response
     */
    public function show($slug)
    {
        // Pass current post to view
        $posts = Post::where('slug', $slug)->get();
        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function edit(Request $request)
    {
        $slug = $request->slug;
        $post = Post::where('slug', $slug)->get();
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);
        $validated['slug'] = Str::slug($validated['title'], '-');

        $editor_content = $request->get('content');
        $dom = new DomDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHtml($editor_content);
        $editor_content_save = $dom->saveHTML();
        // Create slug from title
        $slug = Str::slug($validated['title'], '-');

        $id = Post::where('slug', $slug)->value('id');

        $extension = $request->image->extension();
        Storage::delete('/blog' . $validated['slug'] . "." . $extension);
        $request->image->storeAs('/public/blog', $validated['slug'] . "." . $extension);
        $postImage = new PostImage();
        $postImage->slug = $validated['slug'];
        $postImage->path = $validated['slug'] . "." . $extension;
        $postImage->save();

        $post = Post::find($id);

        $post->content = $editor_content_save;
        $post->category = $request->category;
        $post->update();

        return redirect(route('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(Request $request)
    {
        $slug = $request->slug;

        $id = Post::where('slug', $slug)->value('id');

        DB::table('posts')
            ->delete($id);

        return redirect(route('posts'));
    }
}
