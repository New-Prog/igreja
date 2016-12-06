
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::user()->name }}</h5>

            <li class="mt">
                <a class="lista_menu active" href="/home">
                    <i class="fa fa-dashboard"></i>
                    <span>Cadastro de post</span>
                </a>
                <a class="lista_menu" href="/membros" >
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Membros</span>
                </a>
                <a class="lista_menu" href="/membros" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Célula</span>
                </a>
                <a class="lista_menu" href="/membros" >
                    <i class="glyphicon glyphicon-send"></i>
                    <span>Eventos</span>
                </a>
                <a class="lista_menu" href="/membros" >
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span>Midias</span>
                </a>
                <a class="lista_menu" href="/membros" >
                    <i class="fa fa-cogs"></i>
                    <span>Relatórios</span>
                </a>

            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<script type="text/javascript">

</script>
<!--sidebar end-->
