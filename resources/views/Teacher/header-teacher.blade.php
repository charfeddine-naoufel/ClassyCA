<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item" data-item="dashboard">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard <br> Prof </span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    
                    
                    

                    <li class="nav-item" data-item="courses">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Folders"></i>
                            <span class="nav-text">Mes Cours</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item " >
                        <a class="nav-item-hold" href="{{route('teacher.mesgroups')}} ">
                            <i class="nav-icon i-Conference"></i>
                            <span class="nav-text">Mes Groupes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>


                    <li class="nav-item" >
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Dec"></i>
                            <span class="nav-text">Mon Calendrier</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    
                    
                   
                    
                </ul>
                
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                <ul class="childNav" data-parent="dashboard">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name">Version 1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name">Version 2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v3.html">
                            <i class="nav-icon i-Over-Time"></i>
                            <span class="item-name">Version 3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v4.html">
                            <i class="nav-icon i-Clock"></i>
                            <span class="item-name">Version 4</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="courses">
                    <li class="nav-item">
                        <a href="{{route('teacher.mescours')}}">
                            <i class="nav-icon i-Management"></i>
                            <span class="item-name">Cours</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('chapitres.index')}}">
                            <i class="nav-icon i-Newspaper"></i>
                            <span class="item-name">Chapitres</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('teacher.messeances')}}">
                            <i class="nav-icon i-Data-Stream"></i>
                            <span class="item-name">Séances</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <i class="nav-icon i-Consulting"></i>
                            <span class="item-name">Live</span>
                        </a>
                    </li>
                </ul>
                
                

               


                


                
                
                
            </div>
            <div class="sidebar-overlay"></div>
        </div> 
       