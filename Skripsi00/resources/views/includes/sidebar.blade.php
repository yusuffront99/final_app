<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
<div class="app-brand demo">
    @if (Auth::user()->divisi != 'Admin')
    <a href="{{route('home')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
            <svg
            width="25"
            viewBox="0 0 25 42"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            >
            <defs>
                <path
                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                id="path-1"
                ></path>
                <path
                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                id="path-3"
                ></path>
                <path
                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                id="path-4"
                ></path>
                <path
                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                id="path-5"
                ></path>
            </defs>
            <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                <g id="Icon" transform="translate(27.000000, 15.000000)">
                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                    <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                    </mask>
                    <use fill="#696cff" xlink:href="#path-1"></use>
                    <g id="Path-3" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-3"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                    </g>
                    <g id="Path-4" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-4"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                    </g>
                    </g>
                    <g
                    id="Triangle"
                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                    >
                    <use fill="#696cff" xlink:href="#path-5"></use>
                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                    </g>
                </g>
                </g>
            </g>
            </svg>
        </span>
        <span class="app-brand-text demo text-warning fw-bolder ms-2">Power<span class="text-primary">Plant</span><sup></sup> </span>
        </a>
    @else
    <a href="{{route('dashboard')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
            <svg
            width="25"
            viewBox="0 0 25 42"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            >
            <defs>
                <path
                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                id="path-1"
                ></path>
                <path
                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                id="path-3"
                ></path>
                <path
                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                id="path-4"
                ></path>
                <path
                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                id="path-5"
                ></path>
            </defs>
            <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                <g id="Icon" transform="translate(27.000000, 15.000000)">
                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                    <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                    </mask>
                    <use fill="#696cff" xlink:href="#path-1"></use>
                    <g id="Path-3" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-3"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                    </g>
                    <g id="Path-4" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-4"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                    </g>
                    </g>
                    <g
                    id="Triangle"
                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                    >
                    <use fill="#696cff" xlink:href="#path-5"></use>
                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                    </g>
                </g>
                </g>
            </g>
            </svg>
        </span>
        <span class="app-brand-text demo text-warning fw-bolder ms-2">Power<span class="text-primary">Plant</span><sup></sup> </span>
        </a>
    @endif

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
    <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Home -->
    @if (Auth::user()->divisi != 'Admin')
    <li class="menu-item {{Request::is('home') ? 'active' : ''}}">
        <a href="{{route('home')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Home</div>
        </a>
    @endif
    
    @if (Auth::user()->jabatan == 'Supervisor Operasi')
    <li class="menu-item {{Request::is('home/inbox/*') || Request::is('home/lmasuk_lfo*') || Request::is('home/lmasuk_edg*') ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">All Inboxes</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('home/inbox/burner*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.burner')}}" class="menu-link">
                <div data-i18n="Without menu">Burner System </div>
                @if ($nb > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nb}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>
            <li class="menu-item {{Request::is('home/inbox/sootblower*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.sootblower')}}" class="menu-link">
                <div data-i18n="Without menu">Sootblower System </div>
                @if ($nb > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nb}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>
            <li class="menu-item {{Request::is('home/inbox/edg*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.edg')}}" class="menu-link">
                <div data-i18n="Without menu">EDG System</div>
                @if ($nedg > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nedg}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>

            <li class="menu-item {{Request::is('home/inbox/co_turbine*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.coturbine')}}" class="menu-link">
                <div data-i18n="Without menu">Change Over Turbine</div>
                @if ($nct > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nct}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>

            <li class="menu-item {{Request::is('home/inbox/co_boiler*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.coboiler')}}" class="menu-link">
                <div data-i18n="Without menu">Change Over Boiler</div>
                @if ($ncb > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$ncb}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>

            <li class="menu-item {{Request::is('home/inbox/co_common*') ? 'active' : ''}}">
            <a href="{{route('lmasuk.op.cocommon')}}" class="menu-link">
                <div data-i18n="Without menu">Change Over Common</div>
                @if ($ncc > 0)
                <div class="bx-notif">
                    <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$ncc}} laporan masuk"></span>
                </div>
                @endif
            </a>
            </li>

            <li class="menu-item {{Request::is('home/inbox/lfo_system*') || Request::is('home/inbox/lfo_system/fw_pump*') || Request::is('home/inbox/lfo_system/hp_pump*')  ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                
                    @if ($nfw != 0 || $nhp != 0 || $nhsd)
                    <div data-i18n="Layouts" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nfw + $nhp + $nhsd}} laporan masuk">LFO System</div>
                    @else
                    <div data-i18n="Layouts">LFO System</div>
                    @endif
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{Request::is('home/inbox/lfo_system/fw_pump*') ? 'active' : ''}}">
                    <a href="{{route('lmasuk.op.fwpump')}}" class="menu-link">
                        <div data-i18n="Without menu">Forwarding Pump</div>
                        @if ($nfw > 0)
                        <div class="bx-notif-sub">
                            <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nfw}} laporan masuk"></span>
                        </div>
                        @endif
                    </a>
                    </li>

                    <li class="menu-item {{Request::is('home/inbox/lfo_system/hp_pump*') ? 'active' : ''}}">
                    <a href="{{route('lmasuk.op.hppump')}}" class="menu-link">
                        <div data-i18n="Without navbar">HP Pump</div>
                        @if ($nhp > 0)
                        <div class="bx-notif-sub">
                            <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nhp}} laporan masuk"></span>
                        </div>
                        @endif
                    </a>
                    </li>

                    <li class="menu-item {{Request::is('home/inbox/lfo_system/hsd_level*') ? 'active' : ''}}">
                    <a href="{{route('lmasuk.op.hsdlevel')}}" class="menu-link">
                        <div data-i18n="Without navbar">HSD Level</div>
                        @if ($nhsd > 0)
                        <div class="bx-notif-sub">
                            <span class="notif-dot p-2 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=" ada {{$nhsd}} laporan masuk"></span>
                        </div>
                        @endif
                    </a>
                    </li>
            </li>
        </ul>
    </li>
    @elseif (Auth::user()->jabatan == 'Supervisor Pemeliharaan')
    <li class="menu-item {{Request::is('home/inbox*') ? 'active' : ''}}">
        <a href="{{route('lmasuk.har')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">All Inboxes</div>
        </a>
    
    {{-- OPERATOR BOILER --}}

    @elseif (Auth::user()->jabatan == 'Operator Boiler')
    <li class="menu-item {{Request::is('home/lfo_system*') || Request::is('home/sbl_system*') || Request::is('home/burner_system*') || Request::is('home/co_boiler*')  ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Reports</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('home/burner_system*') ? 'active' : ''}}">
            <a href="{{route('burner_system.index')}}" class="menu-link">
                <div data-i18n="Without menu">Burner System</div>
            </a>
            </li>
            <li class="menu-item {{Request::is('home/sbl_system*') ? 'active' : ''}}">
            <a href="{{route('sbl_system.index')}}" class="menu-link">
                <div data-i18n="Without menu">Sootblower System</div>
            </a>
            </li>
            <li class="menu-item {{Request::is('home/co_boiler*') ? 'active' : ''}}">
            <a href="{{route('coboiler.index')}}" class="menu-link">
                <div data-i18n="Without navbar">Change Over Boiler</div>
            </a>
            </li>
    </li>
    <li class="menu-item {{Request::is('home/lfo_system*') || Request::is('home/lfo_system/fw_pump*') || Request::is('home/lfo_system/hp_pump*') || Request::is('home/lfo_system/hp_pump*')  ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="Layouts">LFO System</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('home/lfo_system/fw_pump*') ? 'active' : ''}}">
            <a href="{{route('fw_pump.index')}}" class="menu-link">
                <div data-i18n="Without menu">Forwarding Pump</div>
            </a>
            </li>
            <li class="menu-item {{Request::is('home/lfo_system/hp_pump*') ? 'active' : ''}}">
            <a href="{{route('hp_pump.index')}}" class="menu-link">
                <div data-i18n="Without navbar">HP Pump</div>
            </a>
            </li>
            <li class="menu-item {{Request::is('home/lfo_system/hsd_level*') ? 'active' : ''}}">
            <a href="{{route('hsd_level.index')}}" class="menu-link">
                <div data-i18n="Without navbar">HSD Level</div>
            </a>
            </li>
    </li>

    {{-- OPERATOR TURBINE --}}
    
    @elseif (Auth::user()->jabatan == 'Operator Turbine')
    <li class="menu-item {{Request::is('home/edg_system*') || Request::is('home/co_turbine*') || Request::is('home/co_common*') ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Reports</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('home/edg_system*') ? 'active' : ''}}">
                <a href="{{route('edg_system.index')}}" class="menu-link">
                    <div data-i18n="Without navbar">EDG System</div>
                </a>
            </li>
            <li class="menu-item {{Request::is('home/co_turbine*') ? 'active' : ''}}">
                <a href="{{route('coturbine.index')}}" class="menu-link">
                    <div data-i18n="Without navbar">Change Over Turbine</div>
                </a>
            </li>
            <li class="menu-item {{Request::is('home/co_common*') ? 'active' : ''}}">
                <a href="{{route('cocommon.index')}}" class="menu-link">
                    <div data-i18n="Without navbar">Change Over Common</div>
                </a>
            </li>
        </li>
        
    @else
    <!-- Dahhboard -->

    <li class="menu-item {{Request::is('dashboard') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-dashboard"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>

    <li class="menu-item {{Request::is('dashboard/report*') ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">All Report</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('dashboard/report/burner*') ? 'active' : ''}}">
            <a href="{{route('admin.index.burner')}}" class="menu-link">
                <div data-i18n="Without menu">Burner System</div>
            </a>
            </li>
            {{-- <li class="menu-item  {{Request::is('dashboard/report/lfo*') ? 'active' : ''}}">
            <a href="{{route('admin.index.lfo')}}" class="menu-link">
                <div data-i18n="Without navbar">LFO System</div>
            </a>
            </li> --}}
            <li class="menu-item  {{Request::is('dashboard/report/edg*') ? 'active' : ''}}">
            <a href="{{route('admin.index.edg')}}" class="menu-link">
                <div data-i18n="Without navbar">EDG System</div>
            </a>
            </li>
            <li class="menu-item  {{Request::is('dashboard/report/coturbine*') ? 'active' : ''}}">
            <a href="{{route('admin.index.coturbine')}}" class="menu-link">
                <div data-i18n="Without navbar">Change Over Turbine</div>
            </a>
            </li>
            <li class="menu-item  {{Request::is('dashboard/report/coboiler*') ? 'active' : ''}}">
            <a href="{{route('admin.index.coboiler')}}" class="menu-link">
                <div data-i18n="Without navbar">Change Over Boiler</div>
            </a>
            </li>
            <li class="menu-item  {{Request::is('dashboard/report/cocommon*') ? 'active' : ''}}">
            <a href="{{route('admin.index.cocommon')}}" class="menu-link">
                <div data-i18n="Without navbar">Change Over Common</div>
            </a>
            </li>

            <li class="menu-item {{Request::is('dashboard/report/*') || Request::is('dashboard/report/fwpump*') || Request::is('dashboard/report/hppump*') || Request::is('dashboard/report/hsdlevel*')  ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Layouts">LFO System</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{Request::is('dashboard/report/fwpump*') ? 'active' : ''}}">
                    <a href="{{route('admin.index.fwpump')}}" class="menu-link">
                        <div data-i18n="Without menu">Forwarding Pump</div>
                    </a>
                    </li>
                    <li class="menu-item {{Request::is('dashboard/report/hppump*') ? 'active' : ''}}">
                    <a href="{{route('admin.index.hppump')}}" class="menu-link">
                        <div data-i18n="Without navbar">HP Pump</div>
                    </a>
                    </li>
                    <li class="menu-item {{Request::is('dashboard/report/hsdlevel*') ? 'active' : ''}}">
                    <a href="{{route('admin.index.hsdlevel')}}" class="menu-link">
                        <div data-i18n="Without navbar">HSD Level</div>
                    </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li class="menu-item {{Request::is('dashboard/employee*') || Request::is('dashboard/leader*') ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Layouts">Data Pegawai</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{Request::is('dashboard/employee*') ? 'active' : ''}}">
            <a href="{{route('admin.index.user')}}" class="menu-link">
                <div data-i18n="Without menu">Data Pegawai</div>
            </a>
            </li>
            <li class="menu-item {{Request::is('dashboard/leader*') ? 'active' : ''}}">
            <a href="{{route('leader.index')}}" class="menu-link">
                <div data-i18n="Without menu">Data Leaders</div>
            </a>
            </li>
        </ul>
    </li>
    @endif
</ul>
</aside>
<!-- / Menu -->