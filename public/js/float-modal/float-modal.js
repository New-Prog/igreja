$('[data-float-modal]').on('click', function (e) {
  e.stopPropagation();
  e.preventDefault();
  montaFloatModal(e, this);
});

function montaFloatModal(e, element) {
  // pegando o elemento que vamos transformar em modal
  var seletor = $(element).attr('data-float-modal');
  var $container = $(seletor);
  console.log()
  // se a modal estiver aberta paramos por aqui
  if ($container.hasClass('floating')) {
    return;
  }

  //se não localizar o container paramos por aqui também
  if (!$container[0]) {
    console.log('Float Modal - Container não encontrado (Seletor = ' + seletor);
    return;
  }

  var containerInitProps = {
    left: $container.offset().left,
    top : $container.offset().top - $(document).scrollTop(),
    width: '523px',
    height: '430px'
    /*
    width: $container.width(),
    height: $container.height()
    */
  }

  // valores para fazer a animação de volta
  var originAnimation = {
    props: containerInitProps,
    transitionTime: 300,
    complete: function() {
      $container.removeClass('floating').css({left: 0, top: 0});
      $('body').removeClass('overlay');
    }
  }

  // novos valores para fazer a animação dos elementos
  var animation = {
    props: {
      width: '90%',
      height: '80%',
      left: '5%',
      top: '10%'
    },
    transitionTime: 300,
    complete: function () {
      // resizeChart();
    }
  }

  // transforma o elemento em modal
  var floatModal = function () {

    $('body').addClass('overlay');

    $container
      .addClass('float-modal floating')
      .css({left: containerInitProps.left, top: containerInitProps.top});

    $container.animate(animation.props, animation.transitionTime, animation.complete);

    setTimeout(function() {
      $('#map').css({height: '500px'});
      initMap();
      preencheDados();
    }, 500);
  }

  // volta ao elemento ao estado normal
  var unFloatModal = function () {
    // resizeChart(true);
    $container.animate(originAnimation.props, originAnimation.transitionTime, originAnimation.complete);
    $('body').off('click');
    $(document).off('keyup');

    setTimeout(function() {
      $('#map').css({height: '350px'});
      initMap();
      preencheDados();
    }, 500);
  }

  floatModal();


  // setando click no body, caso o body ou algum elemento que não for o container for clicado voltamos ao estado inicial
  $('body').on('click', function (e) {
    unFloatModal();
  });
  $(document).on('keyup', function(e) {
    if (e.keyCode == 27) { // ESC key
      unFloatModal();
    }
  });

  $container.on('click', function (e) {
    e.stopPropagation();
  });


}