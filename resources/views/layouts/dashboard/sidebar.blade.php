<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><img src="img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="{{ url('dashboard/img/notification/4.jpg') }}" alt="" /></a>
                <h2 style="max-width: 165px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">
                    @if (Auth::guard('mitra')->user())
                        {{ Auth::guard('mitra')->user()->email }}
                    @else
                        {{ Auth::user()->nama }}
                    @endif
                </h2>
            </div> 
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                @if(Auth::guard('mitra')->user())
                    <ul class="metismenu" id="menu1"> 
                        <li>
                            <a href="{{ url('mitra/dashboard') }}" aria-expanded="false"><i class="icon nalika-home icon-wrap"></i> <span class="mini-click-non">Home</span></a>
        
                        </li>  
                        <li>
                            <a href="{{ url('mitra/kelola_lowongan') }}" aria-expanded="false"><i class="icon nalika-user icon-wrap"></i> <span class="mini-click-non">Kelola Lowongan</span></a>
        
                        </li> 
                    </ul>
                @elseif(Auth::user())
                    <ul class="metismenu" id="menu1"> 
                        <li>
                            <a href="{{ url('admin/dashboard') }}" aria-expanded="false"><i class="icon nalika-home icon-wrap"></i> <span class="mini-click-non">Home</span></a>
        
                        </li> 
                        <li>
                            <a href="{{ url('admin/kelola_user') }}" aria-expanded="false"><i class="icon nalika-user icon-wrap"></i> <span class="mini-click-non">Kelola User</span></a>
        
                        </li> 
                        <li>
                            <a href="{{ url('admin/kelola_mitra') }}" aria-expanded="false"><i class="icon nalika-user icon-wrap"></i> <span class="mini-click-non">Kelola Mitra</span></a>
        
                        </li> 
                    </ul>

                @endif
            </nav>
        </div>
    </nav>
</div>