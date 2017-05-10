var Script = function () {

    //morris chart

    $(function () {
      // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
      var tax_data = [
           {"period": "2011 Q3", "licensed": 3407, "sorned": 660},
           {"period": "2011 Q2", "licensed": 3351, "sorned": 629},
           {"period": "2011 Q1", "licensed": 3269, "sorned": 618},
           {"period": "2010 Q4", "licensed": 3246, "sorned": 661},
           {"period": "2009 Q4", "licensed": 3171, "sorned": 676},
           {"period": "2008 Q4", "licensed": 3155, "sorned": 681},
           {"period": "2007 Q4", "licensed": 3226, "sorned": 620},
           {"period": "2006 Q4", "licensed": 3245, "sorned": null},
           {"period": "2005 Q4", "licensed": 3289, "sorned": null}
      ];
/*
      Morris.Bar({
        element: 'membros-celulas',
        data: [
          {celula: 'Nova Vida', quantidade: 2},
          {celula: 'Amor em Cristo', quantidade: 4},
          {celula: 'Jeová Varão', quantidade: 5},
          {celula: 'Juventude Nova', quantidade: 7},
          {celula: 'OPE Abençoada', quantidade: 7.5}
        ],
        xkey: 'celula',
        ykeys: ['quantidade'],
        labels: ['Quantidade de membros'],
        barRatio: 0.4,
        xLabelAngle: 15,
        hideHover: 'auto',
        barColors: ['#ac92ec']
      });
*/

      new Morris.Line({
        element: 'examplefirst',
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value'],
        data: [
          {year: '2008', value: 20},
          {year: '2009', value: 10},
          {year: '2010', value: 5},
          {year: '2011', value: 5},
          {year: '2012', value: 20}
        ]
      });

      $('.code-example').each(function (index, el) {
        eval($(el).text());
      });
    });



}();

