Highcharts.chart('container', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Prestamos registrados mensualmente'
  },
  xAxis: {
    categories: ['Ene2021', 'Feb2020', 'Mar2020', 'Abr2020', 'May2020', 'Jun2020', 'Jul2020', 'Ago2020',
                 'Sep2020', 'Oct2020', 'Nov2020', 'Dic2020']
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

