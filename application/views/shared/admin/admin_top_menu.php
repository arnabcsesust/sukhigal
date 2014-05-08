<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">

            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="brand" href="<?php echo base_url() . 'admin' ?>">Sukhigal</a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" id="icn-friend" class="dropdown-toggle" data-toggle="dropdown"><p>Member Criteria</p></a>
                        <ul class="dropdown-menu">                 
                            <li><a href="<?php echo base_url() . 'admin/gender' ?>"><i class="i"></i> Gender Information</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/category' ?>"><i class="i"></i> Category Information</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/maritalinfo' ?>"><i class="i"></i> Marital Information</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/bodycolor' ?>"><i class="i"></i> Body Color</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/bodyquality' ?>"><i class="i"></i> Body Quality</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/bodyheight' ?>"><i class="i"></i> Body Height</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/presentage' ?>"><i class="i"></i> Present Age</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="icn-like" class="dropdown-toggle" data-toggle="dropdown"><p>Pin Info</p></a>
                        <ul class="dropdown-menu">                 
                            <li><a href="<?php echo base_url() . 'admin/religion' ?>"><i class="i"></i> Religion <span class="digit">(1st Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/seconddigit' ?>"><i class="i"></i> Second Digit <span class="digit">(2nd Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/financialstatus' ?>"><i class="i"></i> Financial <span class="digit">(3rd Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/educationalstatus' ?>"><i class="i"></i> Educational <span class="digit">(4th Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/professionalstatus' ?>"><i class="i"></i> Professional <span class="digit">(5th Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/sixthdigit' ?>"><i class="i"></i> Sixth Digit <span class="digit">(6th Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/seventhdigit' ?>"><i class="i"></i> Seventh Digit <span class="digit">(7th Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/areainfo' ?>"><i class="i"></i> Area <span class="digit">(8th Digit)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/subareainfo' ?>"><i class="i"></i> Sub Area <span class="digit">(9th Digit)</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="icn-like" class="dropdown-toggle" data-toggle="dropdown"><p>Users</p></a>
                        <ul class="dropdown-menu">                 
                            <li><a href="<?php echo base_url() . 'admin/user/0' ?>"><i class="i"></i> New User Request</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/user/1' ?>"><i class="i"></i> Active Users</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/user/2' ?>"><i class="i"></i> Inactive Users</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="icn-like" class="dropdown-toggle" data-toggle="dropdown"><p>User Permission</p></a>
                        <ul class="dropdown-menu">                 
                            <li><a href="<?php echo base_url() . 'admin/userprevilige/0' ?>"><i class="i"></i> New Permission Requests</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/userprevilige/1' ?>"><i class="i"></i> Approved Permissions</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/userprevilige/2' ?>"><i class="i"></i> Rejected Permissions</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>  
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" id="icn-wrench" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-wrench icon-white"></p></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-pencil"></i> Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . 'admin/logout' ?>">Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
