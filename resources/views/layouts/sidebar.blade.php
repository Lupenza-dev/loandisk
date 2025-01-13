<div id="sidebar-menu">
  <!-- Left Menu Start -->
  <ul class="metismenu list-unstyled" id="side-menu">
      <li class="menu-title" key="t-menu">Menu</li>
      <li>
        <a href="{{ route('dashboard')}}" class="waves-effect">
            <i class="bx bx-home"></i>
            <span key="t-chat">Dashboard</span>
        </a>
    </li>
      <li class="menu-title" key="t-apps">Customers</li>
      <li>
          <a href="{{ route('customers.index')}}" class="waves-effect">
              <i class="bx bx-user"></i>
              <span key="t-chat">Customers</span>
          </a>
      </li>
      <li>
          <a href="{{ route('loan.menu')}}" class="waves-effect">
              <i class="bx bx-user"></i>
              <span key="t-chat">Loans</span>
          </a>
      </li>
      <li class="menu-title" key="t-apps">Management</li>
      <li>
          <a href="{{ route('management.menu')}}" class="waves-effect">
              <i class="bx bx-cog"></i>
              <span key="t-chat">Management</span>
          </a>
      </li>
    
      <li class="menu-title" key="t-pages">Pages</li>


      <li class="menu-title" key="t-components">Components</li>
     

  </ul>
</div>







