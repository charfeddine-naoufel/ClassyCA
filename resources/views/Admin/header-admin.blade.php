<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item" data-item="dashboard">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text"><strong>Admin <br> Dashboard</strong> </span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{route('matieres.index')}}">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text"><strong>Matiere</strong></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item active" data-item="users">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon  i-Address-Book"></i>
                            <span class="nav-text"><strong>Utilisateurs</strong> </span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{route('payments.index')}}">
                            <i class="nav-icon  i-Billing"></i>
                            <span class="nav-text"><strong>Payements</strong></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{route('offres.index')}}">
                            <i class="nav-icon  i-Dropbox"></i>
                            <span class="nav-text"><strong>Offres</strong></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="{{route('chapitres.index')}}">
                            <i class="nav-icon i-Computer-Secure"></i>
                            <span class="nav-text"><strong>Packs</strong></span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    

                    <li class="nav-item " >
                        <a class="nav-item-hold" href="{{route('classes.index')}}">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text"><strong>Classes <br> et Groupes</strong></span>
                        </a>
                        <div class="triangle"></div>
                    </li>


                    
                   
                   
                   
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                <ul class="childNav" data-parent="dashboard">
                    <li class="nav-item">
                        <a href="#">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name">Tableau de Board</span>
                        </a>
                    </li>
                    
                </ul>
                <ul class="childNav" data-parent="users">
                    <li class="nav-item">
                        <a href="{{route('eleves.index')}}">
                            <i class="nav-icon  i-Business-Mens"></i>
                            <span class="item-name">Eleves</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('enseignants.index')}}">
                            <i class="nav-icon i-Conference"></i>
                            <span class="item-name">Enseignants</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}">
                            <i class="nav-icon  i-Administrator"></i>
                            <span class="item-name">Admins</span>
                        </a>
                    </li>
                    
                    
                    
                    
                </ul>
                

               


                


                
                
                
                
            </div>
            <div class="sidebar-overlay"></div>
        </div>
