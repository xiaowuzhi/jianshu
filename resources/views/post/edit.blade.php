@extends('layout.main')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="/posts/{{$post->id}}" method="POST">
            {{method_field("PUT")}}
            {{csrf_field()}}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <div id="div1"><p>{!! $post->content !!}</p></div>
                <textarea id="content" style="display: none;" name="content" class="form-control" placeholder="这里是内容"></textarea>
            </div>
            @include("layout.error")
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>
    </div><!-- /.blog-main -->
@endsection