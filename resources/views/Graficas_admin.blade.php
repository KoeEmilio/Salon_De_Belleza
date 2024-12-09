@extends('layouts.Graficas')

@section('title', 'Estadísticas Mensuales')

@section('grafica1-title', 'Ventas Mensuales')
@section('grafica1')
<script>

    var serviciosAgendados = @json($serviciosAgendados);

    var servicios = serviciosAgendados.map(function(servicio) {
        return servicio.service ? servicio.service.service_name : 'Desconocido';
    });

    var totales = serviciosAgendados.map(function(servicio) {
        return servicio.total;
    });

    var chart1 = echarts.init(document.getElementById('chart1'));
    var option1 = {
        color: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff', '#ff9f40'],
        title: { text: 'Servicios Agendados en el Mes' },
        tooltip: {},
        xAxis: { data: servicios },
        yAxis: {},
        series: [{ name: 'Servicios', type: 'bar', data: totales }]
    };
    chart1.setOption(option1);
</script>

@endsection

@section('grafica2-title', 'Ingresos Mensuales')
@section('grafica2')
<script>
    var months = @json($months);
    var earnings = @json($earnings);

    var chart2 = echarts.init(document.getElementById('chart2'));
    var option2 = {
        title: { text: 'Ingresos Mensuales' },
        tooltip: {},
        xAxis: { data: months }, 
        yAxis: { type: 'value' },
        series: [{ name: 'Ingresos', type: 'line', data: earnings }]
    };
    chart2.setOption(option2);
</script>
@endsection


