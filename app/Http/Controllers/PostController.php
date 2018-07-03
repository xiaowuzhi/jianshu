<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {
    //列表页面
    public function index() {
        $app = app();
        $log = $app->make('log');
        $log->info('post_index', ['this is log']);


        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        //dd($posts);
        return view("post/index", compact('posts'));
    }

    //详情页
    public function show(Post $post) {
        return view("post/show", compact('post'));
    }

    //创建文章
    public function create() {
        //dd(csrf_token());
        return view("post/create");
    }

    //创建逻辑
    public function store() {
        //dd(\Request::all()); request();
//        $post = new Post();
//        $post->title = request('title');
//        $post->content = request('content');
//        $post->save();
        //$params = ['title' => request('title'), 'content' => request('content')];
        //验证
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ], [
            //'title.min' => '文章标题过短'
        ]);
        //逻辑
        $params = request(['title', 'content']);
        $post = Post::create($params);

        //渲染
        return redirect('/posts');

    }

    //编辑页面
    public function edit(Post $post) {
        return view("post/edit", compact('post'));
    }

    //编辑逻辑
    public function update(Post $post) {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);
        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        //渲染
        return redirect("/posts/{$post->id}");
    }

    //删除逻辑
    public function delete(Post $post) {
        $post->delete();
        return redirect('/posts');

    }

    //上传图片
    public function imageUpload(Request $request) {

        //print_r(request()->all());exit;
        //dd(request()->all());
        $path = $request->file('vvawangEditorH5File')->storePublicly(md5(time()));

        $vva_class = (object)['errno' => 0, 'data' => [asset('storage/' . $path)]];
        return json_encode($vva_class);
    }
}
