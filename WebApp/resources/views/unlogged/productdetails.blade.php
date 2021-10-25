@extends('unlogged.base.appv2finalDefinitive')
@section('content')
    <div class="content custom ml-6 mr-3">
        <div class="row mb-6">
            <div class="col-12">
                <div class="text-center">
                    <h1 class="ml-4 mb-4" style="color: black"> <b>
                            <b class="text-uppercase"> {{ $item->NomeProduto }} </b>
                        </b>
                    </h1>
                </div>


                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="" style="height:200px;width: 200px; margin:10px;border-radius:3%">
                            <canvas id="category{{ $categoryData->id }}" width="200" height="200"
                                style="display: block; box-sizing: border-box; height: 200px; width: 200px;"></canvas>
                            <script>
                                var ctx44 = document.getElementById('category{{ $categoryData->id }}');
                                var errors44 = 100 - <?= ($categoryData->taxPercentage != '') ? $categoryData->taxPercentage : 0;?> ;
                                var mark44 = <?= (  $categoryData->taxPercentage  != '') ? $categoryData->taxPercentage : 0 ?>;
                                $(document).ready(function() {
                                    data = {
                                        datasets: [{
                                            data: [mark44, errors44],
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
                                    var myDoughnutChart = new Chart(ctx44, {
                                        type: 'doughnut',
                                        data: data
                                    });
                                });
                            </script>
                        </div>
                        <h3 class="ml-6">
                            Categoria: <br> <span class="text-capitalize">{{ $categoryData->NomeCategoria }}</span>
                        </h3>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div style="height:200px;width: 200px; margin:10px;border-radius:3%">
                            <canvas id="subcategory{{ $subCategoryData->id }}" width="200" height="200"
                                style="display: block; box-sizing: border-box; height: 200px; width: 200px;"></canvas>
                            <script>
                                var ctx45 = document.getElementById('subcategory{{ $subCategoryData->id }}');
                                var errors45 = 100 - <?= (  $subCategoryData->taxPercentage  != '') ? $subCategoryData->taxPercentage : 0 ?>;
                                var mark45 = <?= (  $subCategoryData->taxPercentage  != '') ? $subCategoryData->taxPercentage : 0 ?>;
                                $(document).ready(function() {
                                    data = {
                                        datasets: [{
                                            data: [mark45, errors45],
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
                                    var myDoughnutChart = new Chart(ctx45, {
                                        type: 'doughnut',
                                        data: data
                                    });
                                });
                            </script>
                        </div>
                        <h3 class="ml-6">
                            Subcategoria: <br><span class="text-capitalize">{{ $subCategoryData->NomeSubCategoria }} </span>
                        </h3>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                        <img class="card-img-top img-fluid" style="height:100%; width:100% display: block;
                            max-width:300px;
                            max-height:220px;
                            width: auto;
                            height: auto;" src="{{ asset('uploads/product/' . $item->image) }}" alt="Card image cap">
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="text-center">
                            <h1>
                               Preço - R$ {{ $item->Preco }}
                            </h1>
                            <h2 class="text-warning">
                                Imposto - R$ {{$tax}}
                            </h2>
                        </div>

                        <div>
                            <br>
                            <h2>Descrição do produto:</h2>
                            {{ $item->NomeSubCategoria }}
                        </div>


                        <div class="row text-center">
                            <div class="col-6">
                                <div class="text-center">
                                    <a href="{{ $item->linksites }}" class="btn btn-warning"> Ver anúncio</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">

                                    @if($UserFavorite == 1)
                                    <a href="{{ url('/save-product'.'/'.$item->id) }}" class="btn btn-warning"> Rem. Lista de desejos </a>
                                    @else
                                    <a href="{{ url('/save-product'.'/'.$item->id) }}" class="btn btn-success"> Adc. Lista de desejos </a>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
