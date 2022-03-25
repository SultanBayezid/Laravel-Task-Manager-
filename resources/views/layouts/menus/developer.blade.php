<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Developer Login</div>
                        
                          
                            <a class="nav-link" href="{{route('tasks.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                All Tasks
                               
                            </a>
                     
                        
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       {{Auth::user()->name}}
                    </div>
                </nav>
            </div>