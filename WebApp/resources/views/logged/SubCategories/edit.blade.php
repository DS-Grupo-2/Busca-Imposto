  @extends('logged.base.app')
  @section('content')

      <form method="POST" action="{{ url('/system/subcategories/edit/' . $item->id) }}">
          @csrf
          <div class="form">
              <img class="card-ig-top ml-3 mt-3" src="/uploads/avatars/User.jpg" m alt="Card image cap"
                  style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
              <div class="card-body">
                  <form enctype="multipart/form-data" action="home" method="post">

                      <input type="file" name="avatar">
                      <input type="hidden" name="_token" value="ekGgW459wGmMk7r8bMir5NwI7J4NxfOP6KK2Fd8F">
                      <input type="submit" class="pull-right btn btn-sm btn-primary">


              </div>

      </form>


      </div>

      <div class="col-10">
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="NomeProduto">Nome</label>
                  <input id="NomeSubCategoria" type="text"
                      class="form-control @error('NomeSubCategoria') is-invalid @enderror" name="NomeSubCategoria"
                      value="{{ $item->NomeSubCategoria }}" required autocomplete="text" autofocus>
              </div>
              <div class="form-group col-md-6">
                  <br> Categoria <br>
                  <select name="Category_ID">
                      <option selected="selected"> --SELECT-- </option>

                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                      @endforeach
                  </select>
                  <br><br>
              </div>
          </div>
          </form>
          @error('NomeProduto')
              <span class="invalid-feedback" role="alert">
                  <strong></strong>
              </span>
          @enderror
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
      <hr>
      @foreach ($list as $item)






      @endforeach
      {{-- pagination (: --}}
      {{ $list->links() }}
  @endsection
