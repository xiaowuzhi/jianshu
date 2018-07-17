@extends("admin.layout.main")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>文章管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> admin</a></li>
            <li class="active">posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">文章列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>文章标题</th>
                                <th>操作</th>
                            </tr>
                            </tbody>

                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-default post-audit" post-id="{{$post->id}}" post-action-status="1">通过</button>
                                        <button type="button" class="btn btn-block btn-default post-audit" post-id="{{$post->id}}" post-action-status="-1">拒绝</button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{$posts->links()}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@section('bottomjs')
    <script src="/js/admin.js"></script>
@endsection
