 <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <a href="index.php">
                    <span id="big-logo" ><img id="big-logo-image"  src="../../images/<?php echo $image ?>" alt="logo" style="width:40px;height:40px;border-radius: 50%" /><span id="logo-name"><?php echo " &nbsp;".$dealershipname ?></span></span>
                    
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li class="active">
                            <a class="js-arrow" href="index.php">
                               
                               <i id="sidebaricon" class="c-blue ti-home"></i><span id="sidebarcontent1">Dashboard</span>
                                
                            </a>
                        </li>
                        <li>
                            <a href="Calendar.php">
                                <i id="sidebaricon" class="c-orange ti-calendar"></i><span id="sidebarcontent1">Calendar</span></a>
                        </li>
                        <li>
                            <a href="Edit-Delete_a_Vehicle.php">
                                <i id="sidebaricon" class="c-purple ti-pencil"></i><span id="sidebarcontent1">Edit/Delete a Vehicle</span></a>
                        </li>
                        <li>
                            <a href="Vehicle_with_pending_Info.php">
                               <i id="sidebaricon" class="c-brown ti-palette"></i><span id="sidebarcontent1">Vehicle with pending Info</span></a>
                        </li>
                      
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i id="sidebaricon" class="c-teal ti-car"></i><span id="sidebarcontent1">Add a vehicle</span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="vindecode.php"><span id="sidebarcontent1">Vin Decode</span></a>
                                </li>
                                <li>
                                    <a href="manually.php"><span id="sidebarcontent1">Manually</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>