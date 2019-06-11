<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth('admin')->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="/admin/admin/article/infos" method="get" class="sidebar-form">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="输入文档标题...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
$urlstr = Request::getRequestUri();
        ?>
        <ul class="sidebar-menu">

              @foreach ($menu as $k=> $m)
                       
                          <li class="treeview">
                            <a href="/admin{{$m->url}}">
                                <i class="fa  @if($k==0)fa-file-text @elseif($k==1) fa-user-secret @elseif($k==2) fa-dashboard @elseif($k==3) fa-files-o @elseif($k==4) fa-laptop @elseif($k==5) fa-table @elseif($k==6) fa-circle-o text-red @elseif($k==7) fa-circle-o text-aqua @elseif($k==8) fa-circle-o text-yellow @elseif($k==9) fa-circle-o text-blue @elseif($k==10) fa-circle-o text-red @elseif($k==11) fa-circle-o text-blue @elseif($k==12) fa-circle-o text-red @endif"></i> <span>{{$m->name}}</span></a>
                              
                         {{--  <i class="fa fa-angle-left pull-right"></i> --}}
                        </li>
                        @endforeach

           
           

          {{--   <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>核心操作管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                      @foreach ($menu as $m)
                        <li @if(strstr($urlstr,$m->url))class="active"@endif>
                            <a href="/admin{{$m->url}}"><i class="fa fa-circle-o"></i>{{$m->name}}</a>
                        </li>
                        @endforeach


                </ul>
            </li>
           --}}
           {{--  <li class="treeview">
                <a href="#">
                    <i class="fa  fa-wrench"></i> <span>系统设置中心</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                      <li @if(strstr($urlstr,'/admin/catelist'))class="active"@endif><a href="/admin/catelist"><i class="fa fa-circle-o"></i> 站点核心设置</a></li>
                  
                </ul>
            </li> --}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
