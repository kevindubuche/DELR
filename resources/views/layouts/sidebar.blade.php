<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::user()->role !=0)
                <img src="{{asset('user_images/'.Auth::user()->GetUser(Auth::user()->role,Auth::user()->id)->image)}}" class="img-circle" alt="User Image">
              @else
                <img src="{{asset('user_images/defaultAvatar.png')}}" class="img-circle"
                alt="User Image"> 
                @endif
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>MSPP/DELR</p>
                @else
                    <p>{{ Auth::user()->nom}} {{ Auth::user()->prenom}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <hr>

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
            </div>
        </form> --}}
        <!-- Sidebar Menu -->

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>