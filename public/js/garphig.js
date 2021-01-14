Highcharts.chart('container', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Prestamos registrados mensualmente'
  },
  xAxis: {
    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago',
                 'Sep', 'Oct', 'Nov', 'Dic']
  },
  yAxis: {
    title: {
      text: 'Cantidad de prestamos'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{

    name: 'Prestamos registrados',
    data: counts
  }],
});

