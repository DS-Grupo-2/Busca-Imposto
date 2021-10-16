@extends('unlogged.base.app')
@section('content')

<div class="conteudo">
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

            <div class="card col-md-4" style="width: 18rem;margin: 20px">
            <img class="card-img-top" style="margin:5%" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>

            </div>
            </div>
            <div class="card col-md-4 " style="width: 18rem; margin: 20px">
            <img class="card-img-top" style="margin:5%" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>

            </div>
            </div>
                        <div class="card col-md-4" style="width: 18rem; margin: 20px">
            <img class="card-img-top" style="margin:5%" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>
            </div>
            </div>
            <div class="card col-md-4" style="width: 18rem; margin:20px">
            <img class="card-img-top" style="margin: 5%" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>
            </div>
            </div>
            </div>


        </div>
    </div>
</div>



@endsection
