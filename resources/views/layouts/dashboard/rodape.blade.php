
<?php
    if(!isset($membro)){
        $actionForm = "/membros/cadastrar/salvar";
        $messageButton = "Cadastrar";
        $membro = null;
    } else {
        $actionForm = "/membros/up/{$membro['id']}";
        $messageButton = "Alterar";
    }

    if(!isset($mensagem)){
        $mensagem = array();
    }

?>

  <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - New Prog Softwares
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/dashboard_layout/js/jquery.js"></script>
    <script src="/dashboard_layout/js/jquery-1.8.3.min.js"></script>
    <script src="/dashboard_layout/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/dashboard_layout/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/dashboard_layout/js/jquery.scrollTo.min.js"></script>
    <script src="/dashboard_layout/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/dashboard_layout/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/dashboard_layout/js/common-scripts.js"></script>

    <script type="text/javascript" src="/dashboard_layout/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/dashboard_layout/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="/dashboard_layout/js/sparkline-chart.js"></script>
    <script src="/dashboard_layout/js/zabuto_calendar.js"></script>
    <script src="/js/modals.js"></script>
	<script type="text/javascript">



        $(document).ready(function () {

            $(document).on('click', ".btn_link", function (event) {
                event.preventDefault();
                $('#conteudo-principal').load($(this).attr('href'));
            });



            $(document).on('click', ".menu-item" , function( event ) {
                event.preventDefault();
                event.stopImmediatePropagation();

                $('#conteudo-principal').load($(this).attr('href'));
            });

            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>