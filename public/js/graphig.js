Highcharts.chart('containeruser', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'En construccion'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Prestamos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Bloque A',
        data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10]

    }, {
        name: 'Bloque B',
        data: [11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11]

    }, {
        name: 'Bloque C',
        data: [15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15]

    }, {
        name: 'Bloque D',
        data: [8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8]

    }]
});