@extends('logged.base.app2')
@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ url('/system/products/edit/' . $item->id) }}">
        @csrf


        <div class="col-10">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>Imagem</label>
                    <input type="file" name="image" value="{{ $item->image }}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="NomeProduto">Nome</label>
                    <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror"
                        name="NomeProduto" value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="NomeProduto">preco</label>
                    <input id="Preco" type="text" class="form-control mb-2 @error('Preco') is-invalid @enderror" name="Preco"
                    value="{{ $item->Preco }}" required>
                </div>
            </div>






            <div class="form-row">
                <div class="form-group col-md-3">
                    Categoria
                    <select class="form-control col-md-12 col-xl-12 col-lg-12 col-sm-12" name="Category_ID">
                        <option selected="selected" value="0"> --SELECT-- </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    Sub-Categoria <br>
                    <select class="form-control col-md-12 col-xl-12 col-lg-12 col-sm-12" name="SubCategoryID">
                        <option selected="selected" value="0"> --SELECT-- </option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->NomeSubCategoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="Especificacao">Descrição</label>
                    <textarea class="form-control" name="Especificacao" id="Especificacao" value="{{ $subcategory->Especificacao }}" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="linkexterno">Link do anuncio</label>
                    <textarea class="form-control" name="linkexterno" id="linkexterno" value="{{ $subcategory->linksites }}" rows="3"></textarea>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary col-1 ml-3">Salvar</button></div>


    </form>







    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror


    <hr>
    @foreach ($list as $item)






    @endforeach
    {{-- pagination (: --}}
    {{ $list->links() }}
@endsection
