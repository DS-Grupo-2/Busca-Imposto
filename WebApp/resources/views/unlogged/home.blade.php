@extends('unlogged.base.app')
@section('content')

    <div class="">
        <div class="section" style="background-color:#f6f5f8; margin-left:2%; margin-right:2%">
            <div class="container">
                <div class="row">
                    <div class="title-area" style="margin-bottom: 10%">
                        <h2 style="color: black">Produtos Populares</h2>
                        <div class="separator separator-danger">✻</div>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10%">

                    <div class="main-section2">
                        <div class="container">
                            <div class="row">
                                @foreach ($listProd as $item)
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">

                                        <div class="card" style="width: 12rem; height: 28rem">
                                        <div style="height:220px" >
                                            <img class="card-img-top img-fluid" style=" display: block;
                                            max-width:168px;
                                            max-height:220px;
                                            min-width:167px;
                                            min-height:170px;                                            width: auto;
                                            height: auto;" src="{{ asset('uploads/product/' . $item->image) }}" alt="Card image cap">
                                        </div> 
                                         <div class="card-body">
                                            <div style="height: 90px">
                                                <p class="card-text" style="margin-left: 5%;margin-right:5%">{{ $item->NomeProduto }}</p>
                                                <h5 class="card-title" style="margin-left: 5%;margin-right:5%">R$ {{ $item->Preco }}</h5>
                                            </div>   
                                                <div class="grid-item text-center"><div style="margin-bottom:5%;font-size:16px; color:red">❤ <span style="text-color:black"> {{ $item->likes }} </span> </div></div>
                                                <div class="text-center">
                                                    <a href="{{ url('product/'.$item->id) }}" class="btn btn-primary" style="background-color: #8391d8;color: white; margin:5%" >Ver detalhes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="paginator ml-6" style="position: absolute">
                        {{ $listProd->onEachSide(5)->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection
