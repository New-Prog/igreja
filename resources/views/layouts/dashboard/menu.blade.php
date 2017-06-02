
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="/dashboard"><img src="/dashboard_layout/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">{{ Auth::user()->name }}</h5>


                  <li class="mt">
                      <a class="active" href="/dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="menu-item" href="/membros/consultar" >
                          <i class="glyphicon glyphicon-user"></i>
                          <span>Membros</span>

                      </a>
                  </li>

                <li class="sub-menu">
                      <a class="menu-item" href="/celulas/consultar" >
                          <i class="fa fa-tasks"></i>
                          <span>Células</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="menu-item" href="/reunioes/consultar" >
                          <i class="fa fa-book"></i>
                          <span>Reuniões</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="menu-item" href="/posts/consultar" >
                          <i class="fa fa-book"></i>
                          <span>Posts</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->