@include('vendor.ueditor.assets')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
            [ 'paragraph', 'fontfamily', 'fontsize','customstyle','bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage', //源代码
                'emotion', 'fullscreen','insertvideo','music','autotypeset','removeformat','pasteplain','source' ]
        ],
        elementPathEnabled: false,
        enableContextMenu: true,
        autoClearEmptyNode:true,
        initialFrameHeight:300,
        removeFormatAttributes:'class,style,lang,width,height,align,hspace,valign',
        wordCount:false,
        imagePopup:true,
        removeClass: true,
        allowDivTransToP:false,
        autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>