<div class="wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content no-padding">

                    <div class="summernote" id="summernote">
                        @if(isset($typeinfos->contents))
                        {!! $typeinfos->contents !!}
                            @elseif(isset($articleinfos->body))
                            {!! $articleinfos->body !!}
                            @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

