<li >
    <a href="{{ url('/home') }}"><i class="fa fa-home"></i><span>Accueil</span></a>
</li>

@if(Auth::user()->role == 0)
    <li class="treeview">
        <a href="#">
            <i class=" fa fa-group"></i><span>Utilisateurs</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('dataclerks*') ? 'active' : '' }}">
                <a href="{{ route('dataclerks.index') }}"><i class="fa fa-user"></i><span>Dataclerks</span></a>
            </li>

            </li><li class="{{ Request::is('epidemiologistes*') ? 'active' : '' }}">
                <a href="{{ route('epidemiologistes.index') }}"><i class="fa fa-user"></i><span>Epidémiologistes</span></a>
            </li>

        </ul>
    </li>
@endif

<li class="{{ Request::is('contamines*') ? 'active' : '' }}">
    <a href="{{ route('contamines.index') }}"><i class="fa fa-bug "></i><span>Contaminés</span></a>
</li>

