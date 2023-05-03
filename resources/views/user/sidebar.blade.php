<ul id="sidebarnav">
    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{route('home')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                class="hide-menu">Dashboard</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
        href="{{route('konsultasi')}}" aria-expanded="false"><i class="mdi mdi-file-document"></i><span
            class="hide-menu">Konsultasi</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
        href="{{route('user-report', Auth::user()->id )}}" aria-expanded="false"><i class="mdi mdi-file-document"></i><span
            class="hide-menu">Report</span></a></li>
</ul>
