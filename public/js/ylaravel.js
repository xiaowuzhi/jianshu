$(function() {

    var E = window.wangEditor;
    var editor = new E('#div1');
    var $text1 = $('#content');
    editor.customConfig.onchange = function(html) {
        // 监控变化，同步更新到 textarea
        $text1.val(html);
    };
    editor.customConfig.menus = [
        'head',  // 标题
        'bold',  // 粗体
        'fontSize',  // 字号
        'fontName',  // 字体
        'italic',  // 斜体
        'underline',  // 下划线
        'strikeThrough',  // 删除线
        'foreColor',  // 文字颜色
        'backColor',  // 背景颜色
        'link',  // 插入链接
        'list',  // 列表
        'justify',  // 对齐方式
        'quote',  // 引用
        'emoticon',  // 表情
        'image',  // 插入图片
        'table',  // 表格
        //'video',  // 插入视频
        'code',  // 插入代码
        'undo',  // 撤销
        //'redo'  // 重复
    ];
    editor.customConfig.uploadImgServer = '/posts/img/upload';
//editor.customConfig.uploadImgShowBase64 = true
    editor.customConfig.uploadFileName = 'vvawangEditorH5File';
    editor.customConfig.uploadImgHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    };

    editor.create();
// 初始化 textarea 的值
    $text1.val(editor.txt.html());
});

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.like-button').on('click', function(event) {
        var target = $(event.target);
        var current_like = target.attr('like-value');
        var user_id = target.attr('like-user');
        if (current_like == 1) {
            //取消关注
            $.ajax({
                url: '/user/' + user_id + '/unfan',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if(data.error != 0){
                        console.log(data.msg);
                        return;
                    }
                    target.attr("like-value", 0);
                    target.text("关注")
                },
            });
        }else{
            //关注
            $.ajax({
                url: '/user/' + user_id + '/fan',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if(data.error != 0){
                        console.log(data.msg);
                        return;
                    }
                    target.attr("like-value", 1);
                    target.text("取消关注")
                },
            });
        }
    });
});
