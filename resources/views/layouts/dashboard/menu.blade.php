
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="/dashboard_layout/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">{{ Auth::user()->name }}</h5>

                  
                  <li class="mt">
                      <a class="active" href="/dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="glyphicon glyphicon-user"></i>
                          <span>Membros</span>

                      </a>
                      <ul class="sub">
                          <li><a  href="/membros/cadastrar">Cadastrar</a></li>
                          <li><a  href="/membros/consultar">Consultar</a></li>
                      </ul>
                  </li>


                <li class="sub-menu">
                      <a href="/celulas/consultar" >
                          <i class="fa fa-tasks"></i>
                          <span>Celulas</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Reuniões</span>

                      </a>
                      <ul class="sub">
                          <li><a  href="/reunioes/cadastrar">Cadastrar</a></li>
                          <li><a  href="/reunioes/consultar">Consultar</a></li>
                      </ul>
                  </li>



                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Configurações</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->