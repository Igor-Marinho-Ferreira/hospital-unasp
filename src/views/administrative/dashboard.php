<?php $this->layout("administrative/template", [
    "styles" => [
        css_directory("/global/table-responsive.css"),
        css_directory("/administrative/departments/index.css"),
    ]
]); ?>



<nav class="breadcrumb mt-3">
    <a class="breadcrumb-item" href="">Início</a>
</nav>



<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Média de consulta por departamento
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos os departamentos cadastrados automaticamente estarão ativos.
        </p>
    </div>
    <div class="card-body">

    </div>
</div>

<div class="card shadow-light mb-4" id="cardForm">
    <div class="card-header">
        Médico do mês
        <p class="text-muted mb-0 d-none d-md-flex">
            Todos os departamentos cadastrados automaticamente estarão ativos.
        </p>
    </div>
    <div class="card-body">
        <div id="medicalChart"></div>
    </div>
</div>

<script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script>
var medicalData = <?php echo json_encode($medical); ?>;
function renderBarChart(data) {
    var doctorCounts = {};
    data.forEach(function (doctor) {
        var name = doctor.name;
        if (doctorCounts[name]) {
            doctorCounts[name]++;
        } else {
            doctorCounts[name] = 1;
        }
    });

    var chartData = [];
    for (var name in doctorCounts) {
        chartData.push({
            label: name,
            value: doctorCounts[name]
        });
    }

    FusionCharts.ready(function () {
        var chart = new FusionCharts({
            type: 'bar2d',
            renderAt: 'medicalChart',
            width: '100%',
            height: '400',
            dataFormat: 'json',
            dataSource: {
                chart: {
                    caption: 'Contagem de Médicos',
                    xAxisName: 'Médico',
                    yAxisName: 'Contagem',
                    theme: 'fusion'
                },
                data: chartData
            }
        });
        chart.render();
    });
}

renderBarChart(medicalData);
</script>