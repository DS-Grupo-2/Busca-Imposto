@extends('unlogged.base.appv2finalDefinitive')
@section('content')

    <div class="content custom ml-6 mr-3">
        <div class="row mb-6">
            <div class="col-12">
                <h1 class="ml-4 mb-4" style="color: black"> <b>
                        Categorias
                    </b> </h1>

                <div class="main-section2">
                    <div class="container">
                        <div class="row">
                            @foreach ($list as $item)
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="card" style="height:360px;width: 200px; margin:10px;border-radius:3%">
                                        <div class="text-center mt-4">
                                            <a href="{{ url('subcategory/'.$item->id) }}">
                                                <h4 class="card-title text-capitalize">{{ $item->NomeCategoria }}</h4>
                                            </a>
                                        </div>
                                        <canvas
                                            id="myChart{{  $item->id  }}"></canvas><br>
                                            <script>
                                                var ctx{{  $item->id }} = document.getElementById('myChart{{  $item->id  }}');
                                                var errors{{  $item->id }} = 100-<?= ($item->taxPercentage != '') ? $item->taxPercentage : 0;?>;
                                                var mark{{  $item->id }} = <?=  ($item->taxPercentage != '') ? $item->taxPercentage : 0; ?> ;
                                                $(document).ready(function() {
                                                    data = {
                                                        datasets: [{
                                                            data: [mark{{  $item->id }}, errors{{  $item->id }}],
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
                                                    var myDoughnutChart = new Chart(ctx{{$item->id }}, {
                                                        type: 'doughnut',
                                                        data: data
                                                    });
                                                });
                                            </script>
                                        <div class="text-center">

                                            <h5 class="card-text"><?= ($item->taxPercentage != '') ? $item->taxPercentage."<b>%</b>" : 'Não informado'; ?>.</p>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                            {{-- <div class="card"
                            style="height:170px;width: 200px; margin:10px;border-radius:10%">
                            <img class="card-img-top" style="margin-left: 7%; margin-top:2%;width:70px;height:70px"
                                src="http://127.0.0.1:8000/assetsunlogged/img/new_logo.png"
                                alt="Card image cap">
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Produto</h5>
                                </a>
                                <p class="card-text">$PREÇO$.</p>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>






@endsection
