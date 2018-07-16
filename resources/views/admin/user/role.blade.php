@extends("admin.layout.main")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>角色列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> admin</a></li>
            <li class="active">roles</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">角色列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/admin/users/{{$user->id}}/role" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="roles[]"
                                                   @if($myRoles->contains($role))
                                                   checked
                                                   @endif
                                                   value="{{$role->id}}">
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@section('bottomjs')
    {{--<script src="/js/admin.js"></script>--}}
@endsection