const CHART_ELEMS = {
    el: '[data-chart]',
    data: 'data-chart',
}

function initCharts() {
    const charts = document.querySelectorAll(CHART_ELEMS.el);

    charts.forEach(chart => {
        const id = chart.getAttribute('id');
        const data = chart.getAttribute(CHART_ELEMS.data);

        Highcharts.chart(id, {
            title: {
                text: null
            },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                backgroundColor: 'transparent'
            },
            plotOptions: {
                pie: {
                    borderRadius: 0,
                    borderWidth: 0,
                    size: 202,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    }
                }
            },
            colors: ['#55246A', '#8D6C9B', '#CABBD1', '#EEE9F0', '#C6C7E2', '#E3E3F9'],
            tooltip: {
                enabled: true,
                headerFormat: null,
                pointFormat: '{point.name}: {point.percentage:.1f}%',
                backgroundColor: "#fff",
                borderWidth: 0,
                borderRadius: 4,
                padding: 16,
                shadow: false,
                style: {
                    "color": "#121112",
                    "cursor": "default",
                    "fontSize": "16px",
                    "fontWeight": "400",
                    "pointerEvents": "none",
                }
            },
            series: [{
                states: {
                    hover: {
                        brightness: 0,
                        halo: false,
                    }
                },
                data: JSON.parse(data)
            }],
            credits: [{
                enabled: false
            }]
        });
    })
}
