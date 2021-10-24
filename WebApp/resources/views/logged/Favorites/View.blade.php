@extends('logged.base.app2')
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

            <hr>
            <div class="main-section2">
                <div class="container">
                    <div class="row">
                        @foreach ($list as $item)
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">

                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top img-fluid" style="height:250px; width:300px display: block;
                                    max-width:300px;
                                    max-height:220px;
                                    width: auto;
                                    height: auto;" src="{{ asset('uploads/product/' . $item->image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->NomeProduto }}</p>
                                        <h5 class="card-title">R$ {{ $item->Preco }}</h5>
                                        <div class="text-center">
                                            <a href="{{ url('product/'.$item->id) }}" class="btn btn-primary">Ver detalhes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
