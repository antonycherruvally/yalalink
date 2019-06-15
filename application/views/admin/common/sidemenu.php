<div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-item <?php if($page_title == 'Dashboard'){ echo 'active'; } ?>"> <a class="animsition-link" href="admin/dashboard"> <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i> <span class="site-menu-title">Dashboard</span> </a> </li>
          <li class="site-menu-item <?php if($page_title == 'Website'){ echo 'active'; } ?>"> <a class="animsition-link" href="admin/website"> <i class="site-menu-icon md-link" aria-hidden="true"></i> <span class="site-menu-title">Website Settings</span> </a> </li>
          <li class="site-menu-item <?php if($page_title == 'Users' || $page_title == 'Add New User' || $page_title == 'Edit User' || $page_title == 'View User'){ echo 'active open'; } ?> has-sub"> <a href="javascript:void(0)"> <i class="site-menu-icon md-accounts" aria-hidden="true"></i> <span class="site-menu-title">Users</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_users"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/users"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> Website User's</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/int_users"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> Internal User's</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item <?php if($page_title == 'Advertisements' || $page_title == 'Add New Advertisement' || $page_title == 'Edit Advertisement' || $page_title == 'View Advertisement'){ echo 'active open'; } ?> has-sub"> <a href="javascript:void(0)"> <i class="site-menu-icon md-assignment" aria-hidden="true"></i> <span class="site-menu-title">Advertisements</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_advertisements"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/advertisements"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-category">Posts</li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Real Estate' || $page_title == 'Add New Real Estate' || $page_title == 'Edit Real Estate' || $page_title == 'View Real Estate'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-city" aria-hidden="true"></i> <span class="site-menu-title">Real Estate</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_real_estate"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/real_estate"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Jobs' || $page_title == 'Add New Job' || $page_title == 'Edit Job' || $page_title == 'View Jobs'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-case" aria-hidden="true"></i> <span class="site-menu-title">Jobs</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_job"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/jobs"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Auto' || $page_title == 'Add New Auto' || $page_title == 'Edit Auto' || $page_title == 'View Auto'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-car" aria-hidden="true"></i> <span class="site-menu-title">Auto</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_auto"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/auto"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Classifieds'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-calendar-note" aria-hidden="true"></i> <span class="site-menu-title">Classifieds</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_classifieds"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/classifieds"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Housemaids'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-accounts-add" aria-hidden="true"></i> <span class="site-menu-title">House Maids</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_housemaids"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/housemaids"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Phones'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-smartphone-android" aria-hidden="true"></i> <span class="site-menu-title">Phones</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_phones"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/phones"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Electronics'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-camera" aria-hidden="true"></i> <span class="site-menu-title">Electronics</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_electronics"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/electronics"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Computers'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-desktop-mac" aria-hidden="true"></i> <span class="site-menu-title">Computers</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_computers"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/computers"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Education'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-graduation-cap" aria-hidden="true"></i> <span class="site-menu-title">Education</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_education"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/education"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Services'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-wrench" aria-hidden="true"></i> <span class="site-menu-title">Services</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_services"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/services"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Health Care'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-wrench" aria-hidden="true"></i> <span class="site-menu-title">Health Care</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_healthcare"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/healthcare"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub <?php if($page_title == 'Women & Beauty'){ echo 'active open'; } ?>"> <a href="javascript:void(0)"> <i class="site-menu-icon md-wrench" aria-hidden="true"></i> <span class="site-menu-title">Women & Beauty</span> <span class="site-menu-arrow"></span> </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item"> <a class="animsition-link" href="admin/add_womenbeauty"> <span class="site-menu-title"><i class="md-plus-square" aria-hidden="true">&nbsp;</i> Add New</span> </a> </li>
              <li class="site-menu-item"> <a class="animsition-link" href="admin/womenbeauty"> <span class="site-menu-title"><i class="md-format-list-bulleted" aria-hidden="true">&nbsp;</i> View List</span> </a> </li>
            </ul>
          </li>
          <li class="site-menu-item <?php if($page_title == 'Website'){ echo 'active'; } ?>"> <a class="animsition-link" href="admin/trash_ads"> <i class="site-menu-icon md-delete" aria-hidden="true"></i> <span class="site-menu-title">Trash</span> </a> </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="site-menubar-footer"> <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Settings"> <span class="icon md-settings" aria-hidden="true"></span> </a> <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock"> <span class="icon md-eye-off" aria-hidden="true"></span> </a> <a href="admin/signout" data-placement="top" data-toggle="tooltip" data-original-title="Logout"> <span class="icon md-power" aria-hidden="true"></span> </a> </div>
</div>
