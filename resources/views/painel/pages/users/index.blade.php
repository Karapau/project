@extends('layouts.painel.index')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Usuarios</h3></div>

                        <div class="card-body">
                            @if (auth()->user()->permission == 10)
                                <div class="my-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsers">Cadastrar Usuario</button></div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Permissão</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$permissoes[$user->permission]}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-editar-user" data-toggle="modal" data-target="#modalUsersEdit" data-dados="{{$user}}">Editar Usuario</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUsers" tabindex="-1" aria-labelledby="modalUsersLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsersLabel">Cadastrar Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.users.create')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nome do usuario</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Usuario">
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissão</label>
                            <select name="permission" class="form-control">
                                <option value="">- Selecione uma opção -</option>
                                <option value="10">Admin</option>
                                <option value="3">Entregador</option>
                                <option value="0">Sem Permissão</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email de login</label>
                            <input type="email" name="email" class="form-control" placeholder="Email de login">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha do usuario</label>
                            <input type="password" name="password" class="form-control" placeholder="Senha do usuario">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUsersEdit" tabindex="-1" aria-labelledby="modalUsersEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsersEditLabel">Cadastrar Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.users.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nome do usuario</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Usuario">
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissão</label>
                            <select name="permission" class="form-control" @if(auth()->user()->permission < 10) readonly @endif>
                                <option value="">- Selecione uma opção -</option>
                                <option value="10">Admin</option>
                                <option value="3">Entregador</option>
                                <option value="0">Sem Permissão</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email de login</label>
                            <input type="email" name="email" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha do usuario</label>
                            <input type="password" name="password" class="form-control" placeholder="Senha do usuario">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection