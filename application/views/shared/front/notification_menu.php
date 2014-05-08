<ul class="nav pull-right">
    <li><a class="homeButton" href="#/">Welcome <?php echo $this->session->userdata('username'); ?></a></li>
    <li>
        <a href="#/"><p class = "icon-home icon-white"></p></a>
    </li>
<!--    <li class="dropdown">
        <a href="#" id="icn-friend" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-user icon-white"></p><span class="new">5</span></a>
        <ul class="dropdown-menu">                 
            <li><a href="#"><i class="i"></i> You have a friend request</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> You have a friend request</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> You have a friend request</a></li>
            <li class="divider"></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" id="icn-like" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-thumbs-up icon-white"></p></a>
        <ul class="dropdown-menu">                 
            <li><a href="#"><i class="i"></i> Someone likes your profile</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> Someone likes your profile</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> Someone likes your profile</a></li>
            <li class="divider"></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" id="icn-marry" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-heart icon-white"></p></a>
        <ul class="dropdown-menu">                 
            <li><a href="#"><i class="i"></i> Someone sends you a marriage proposal</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> Someone sends you a marriage proposal</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> Someone sends you a marriage proposal</a></li>
            <li class="divider"></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" id="icn-message" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-envelope icon-white"></p></a>
        <ul class="dropdown-menu">                 
            <li><a href="#"><i class="i"></i> You have received a message</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> You have received a message</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> You have received a message</a></li>
            <li class="divider"></li>
        </ul>
    </li>-->

    <li class="dropdown">
        <a href="#" id="icn-wrench" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-wrench icon-white"></p></a>
        <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-pencil"></i> Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'main/logout'; ?>"><i class="i"></i> Log Out</a></li>
        </ul>
    </li>
</ul>
