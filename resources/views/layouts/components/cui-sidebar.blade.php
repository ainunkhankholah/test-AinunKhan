<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">
        <span class="nav-icon cil-speedometer icon icon-xl"></span> Dashboard</a>
    </li>
    <li class="nav-title">{{ auth()->user()->getRole() }}</li>
    
    @can('features.master')

    @endcan
    @can('surat.read')<li class="nav-item"><a class="nav-link" href="{{ route('surat.index') }}"><span class="nav-icon cil-notes icon icon-xl"></span> Surat</a></li>@endcan
    
    @can('surat_gm.read')<li class="nav-item"><a class="nav-link" href="{{ route('surat_gm.index') }}"><span class="nav-icon cil-notes icon icon-xl"></span> SuratGM</a></li>@endcan

</ul>
