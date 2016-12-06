
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::user()->name }}</h5>

            <li class="mt">
                <a class="active" href="/">
                    <i class="fa fa-dashboard"></i>
                    <span>Painel Administrativo</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Igreja</span>
                </a>
                <ul class="sub">
                    <li><a  href="#">Alterar Dados</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="/membros" >
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Membros</span>
                </a>
               <!-- <ul class="sub">
                    <li><a  href="/listarMembros">Listar Membros</a></li>
                    <li><a  href="/CadastrarMembros">Cadastrar Membros</a></li>
                </ul>-->
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="glyphicon glyphicon-send"></i>
                    <span>Eventos</span>
                </a>
                <ul class="sub">
                    <li><a  href="#">Listar Eventos</a></li>
                    <li><a  href="#">Cadastrar Eventos</a></li>
                    <li><a  href="#">Deletar Eventos</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Configurações</span>
                </a>
                <ul class="sub">
                    <li><a  href="#">Configurar Painel de Controle</a></li>

                </ul>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
