  ultimosMemrosAdd();
  pedidosDeOracao();
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });

      function ultimosMemrosAdd(){
        var membro = "";
        membro += "<div class='membro-card'>";
        membro += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
        membro += "<div class='membro-descricao'>";
        membro += "  <div class='nome'>João Doria</div>";
        membro += "  <div class='idade'>33 Anos</div>";
        membro += "  <div class='sexo'>Masculino</div>";
        membro += "  <div class='endereco'>Rua: Aurora Boreal, 123 - Nova Belem</div>";
        membro += "</div>";
        membro += "</div>";


        ultimosMembros = membro;
        ultimosMembros += membro;
        ultimosMembros += membro;
        $("#ultimos-membros").html(ultimosMembros);
      }

      function pedidosDeOracao(){
        var pedido = "";
        pedido += "<div class='membro-card'>";
        pedido += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
        pedido += "<div class='pedido-oracao'>";
        pedido += "  <div class='pedido-membro'>Maria das Dores</div>";
        pedido += "  <div class='pedido-tipo'>Oração por doença</div>";
        pedido += "  <div class='pedido-descricao'>Pastor, boa tarde. Venho pedir oração para mim pois estou sentidno fortes dores nas costas durante a semana. Já fui ao médico e nada foi identificado, tenho fé que só Deus pode me curar. Peço que apresente o pedido de oração a igreja no proximo culto.</div>";
        pedido += "</div>";
        pedido += "</div>";


        pedidos = pedido;
        pedidos += pedido;
        pedidos += pedido;
        $("#pedidos-de-oracao").html(pedidos);
      }