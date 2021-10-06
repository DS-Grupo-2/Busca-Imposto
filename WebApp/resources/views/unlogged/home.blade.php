@extends('unlogged.base.app')
@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="title-area" style="margin-bottom: 10%">
                <h2>Produtos Populares</h2>
                <div class="separator separator-danger">✻</div>
                <p class="description"></p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10%">
        @foreach ($list as $item)

            <div class="card col-md-4" style="width: 18rem;margin: 20px;">
                <img class="card-img-top" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
                <div class="card-body">
                <a href="">   <h5 class="card-title">{{ $item->NomeProduto }}</h5>
                    </a>
                    <p class="card-text">$ 99.99.</p>

                </div>
            </div>

        {{-- <tbody>
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->NomeSubCategoria }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>

                    <td>
                        <button type="submit" class="btn btn-danger "><a
                                href="{{ url('/system/subcategories/delete/' . $item->id) }}" class="text-white">
                                Deletar</a></button>
                        <button type="submit" class="btn btn-success "><a
                                href="{{ url('/system/subcategories/edit/' . $item->id) }} " class="text-white">
                                Editar </a></button>
                    </td>
                </tr>
            </tbody> --}}
        @endforeach
            {{-- <div class="card col-md-4" style="width: 18rem;margin: 20px;">
            <img class="card-img-top" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>

            </div>
            </div>
            <div class="card col-md-4 " style="width: 18rem; margin: 20px">
            <img class="card-img-top" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>

            </div>
            </div>
                        <div class="card col-md-4" style="width: 18rem; margin: 20px">
            <img class="card-img-top" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>
            </div>
            </div>
            <div class="card col-md-4" style="width: 18rem; margin:20px">
            <img class="card-img-top" src="assetsunlogged/img/new_logo.png" alt="Card image cap">
            <div class="card-body">
            <a href="">   <h5 class="card-title">Produto</h5>
                </a>
                <p class="card-text">$PREÇO$.</p>
            </div>
            </div>
            </div> --}}


    </div>
</div>




@endsection
