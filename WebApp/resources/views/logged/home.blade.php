@extends('logged.base.app2')

@section('content')


<div class="text-center">
  <img class="card-img-top ml-3 mt-3" src="/uploads/avatars/{{ $user->avatar }}" alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
  <div class="card-body">
    <h2 class="card-title">{{ $user->name }} </h2>
    <form enctype="multipart/form-data" action="home" method="post">
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" class="pull-right btn btn-sm btn-primary">

  <br> Criado em: {{ $user->created_at }} <br>
  Atualizado em: {{ $user->updated_at }}<br>
    </form>
</div>
</div>

<form class = "p-3" method="POST" action="{{ route('save-user-info') }}" >
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNome">Nome</label>
        <input type="text" name="name" value="{{ $user->name }}" required autocomplete="name" class="form-control" id="inputNome" placeholder="Nome">
      </div>
      <div class="form-group col-md-6">
        <label for="inputSobrenome">Sobrenome</label>
        <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" name="last_name" value="{{ $user->last_name }}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $user->email }}" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Senha</label>
        <input type="password" class="form-control" id="inputPassword4" value="{{ $user->name }}" placeholder="Senha" disabled>
      </div>
    </div>
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTelefone">Telefone</label>
        <input type="text" name="cellphone" value="{{ $user->cellphone }}" class="form-control" id="inputTelefone">
      </div>
      <div class="form-group col-md-6">
        <br>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
      </div>
    </div>
  </form>
<div>
<a class="delete-btn-w-after btn btn-danger ml-3" href="#" shref="{{ url('/system/user-delete') }}" mthod="GET"> Deletar conta </a>
</div>

@endsection
