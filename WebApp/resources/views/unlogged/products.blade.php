

@extends('unlogged.base.appv2finalDefinitive')
@section('content')
    <div class="content custom ml-6 mr-3">
        <div class="row mb-6">
            <div class="col-12">
                <h1 class="ml-4 mb-4" style="color: black"> <b>
                        @if(isset($categoryData->NomeCategoria) && isset($subcategoryData->NomeSubCategoria))
                            <b>{{ $categoryData->NomeCategoria }} > {{ $subCategoryData->NomeSubCategoria }} </b>
                        @elseif(isset($categoryData->NomeCategoria))
                            <b> {{ $categoryData->NomeCategoria }} </b>
                        @elseif(isset($subcategoryData->NomeSubCategoria))
                            <b> {{ $subCategoryData->NomeSubCategoria }} </b>
                        @else
                            <b>Produtos</b>
                        @endif
                    </b>
                </h1>

                <div class="ml-4 mb-4">
                    Subcategorias:<br>
                    @foreach($subCategoryData as $subcategory)
                        <a href="{{ url('get-products/').'?'.'category='.$categoryItem.'&subcategory='.$subcategory->id.'&search='.$defSearch }}" style="display: inline-block;" class="mr-2"> {{ $subcategory->NomeSubCategoria }} </a>
                    @endforeach
                </div>
                <hr>
                <div class="main-section2">
                    <div class="container">
                        <div class="row">
                            @foreach ($list as $item)
                                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">

                                    <div class="card" style="width: 12rem; height: 28rem">
                                        <div style="height: 210px">
                                        <img class="card-img-top img-fluid" style="display: block;
                                        max-width:168px;
                                        max-height:210px;
                                        min-width:167px;
                                        min-height:170px;                                            width: auto;
                                        height: auto;" src="{{ asset('uploads/product/' . $item->image) }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                        <div style="height: 90px;margin-bottom:35%">
                                            <p class="card-text">{{ $item->NomeProduto }}</p>
                                            <h5 class="card-title">R$ {{ $item->Preco }}</h5>
                                        </div>    
                                            <div class="text-center">
                                                <a href="{{ url('product/'.$item->id) }}" class="btn btn-primary">Ver detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="card" style="height:360px;width: 200px; margin:10px;border-radius:3%">
                                        <div class="text-center mt-4">
                                            <a href="#">
                                                <h4 class="card-title text-capitalize">teste 10</h4>
                                            </a>
                                        </div>

                                        <div class="text-center">

                                            <h5 class="card-text">15.25<b>%</b>.<p></p>
                                        </h5></div>
                                    </div>

                                </div> --}}
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
    <div class="paginator ml-6" style="position: absolute">
        {{ $list->onEachSide(5)->links() }}
    </div>
@endsection
