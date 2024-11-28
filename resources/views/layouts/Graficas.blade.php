<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Estadísticas')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .chart-container {
            height: 400px; /* Altura de las gráficas */
        }
    </style>
    <!-- Incluir ECharts -->
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @yield('grafica1-title', 'Gráfica 1')
                    </div>
                    <div class="card-body">
                        <div id="chart1" class="chart-container">
                            @yield('grafica1')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @yield('grafica2-title', 'Gráfica 2')
                    </div>
                    <div class="card-body">
                        <div id="chart2" class="chart-container">
                            @yield('grafica2')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
