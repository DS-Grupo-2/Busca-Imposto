@extends('unlogged.base.appv2finalDefinitive')
@section('content')

    <div class="content custom ml-6 mr-3">
        <div class="row mb-6">
            <div class="col-4">
                <h1 class="ml-4 mb-4 text-capitalize" style="color: black"> <b>
                        {{ $category->NomeCategoria }}
                    </b>
                </h1>

                <div class="text-center">
                    <div class="row text-left">
                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-8">

                            <div class="text-center" style="position: relative;height:400px;width: 100%;">
                                <canvas id="myChartCat{{ $category->id }}"></canvas><br>
                            </div>

                            <script>
                                var ctx{{ $category->id }} = document.getElementById('myChartCat{{ $category->id }}');
                                var errors{{ $category->id }} = 100;
                                var mark{{ $category->id }} = <?= $category->taxPercentage != '' ? $category->taxPercentage : 0 ?>;
                                $(document).ready(function() {
                                    data = {
                                        datasets: [{
                                            data: [mark{{ $category->id }}, errors{{ $category->id }}],
                                            fill: false,
                                            backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
                                        }],
                                        labels: [
                                            'Impostos',
                                            // 'Erros',
                                        ]
                                    };
                                    options: {
                                        rotation: -0.5
                                    }
                                    var myDoughnutChart = new Chart(ctx{{ $category->id }}, {
                                        type: 'pie',
                                        data: data
                                    });
                                });
                            </script>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-xl-8">
                @if (sizeof($list) == 0)
                    <div class="text-center eg-no-content">
                        <h2 class="text-gray">
                            <b>Sem dados</b>
                        </h2>
                    </div>
                @else
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">Categoria</th>
                                <th scope="col">Imposto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->NomeSubCategoria }}</td>
                                    <td>
                                        @if($item->taxPercentage != "")
                                        {{ $item->taxPercentage }}%
                                        @else
                                        Sem dados
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
