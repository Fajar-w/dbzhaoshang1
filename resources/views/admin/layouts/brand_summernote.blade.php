<li>
    <i class="fa fa-user bg-aqua"></i>
    <div class="timeline-item">
        <span class="time"><i class="fa fa-edit"></i>标题可留空，填写后为自定义标题</span>
        <h3 class="timeline-header no-border">
            <a href="#" style="display:inline-block;"> {{Form::label('ppindextitle', '品牌介绍标题', array('class' => 'control-label'))}}</a>
            {{Form::text('ppindextitle', null, array('class' => 'form-control','id'=>'ppindextitle','placeholder'=>'项目首页标题','style'=>'display:inline-block'))}}
        </h3>
    </div>
</li>
<li>
    <i class="fa fa-file-text bg-maroon"></i>
    <div class="timeline-item">
        <span class="time"><i class="fa fa-circle-o-notch"></i> 此处为必填内容</span>
        <h3 class="timeline-header"><a href="#">项目首页</a> 内容编辑</h3>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content no-padding">
                                @include('admin.layouts.ueditor')
                                <script id="container" name="body" type="text/plain"  >
                                    @if(isset($articleinfos->body))
                                        {!! $articleinfos->body !!}
                                    @endif
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <div class="timeline-footer">
            <button type="submit"  class="btn btn-md bg-maroon">提交文档</button>
        </div>
    </div>
</li>