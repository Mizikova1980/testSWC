@extends('layouts.admin')
<!-- About Me Box -->

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Информация о пользователе</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <strong><div class="text-muted">Логин</div></strong>
      <p class="text-muted">{{ $user->name }}</p>

      <strong><div class="text-muted">Имя пользователя</div></strong>
      <p class="text-muted">{{ $user->name }}</p>

      <strong><div class="text-muted">Фамилия пользователя</div></strong>
      <p class="text-muted">{{ $user->surname }}</p>


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  @endsection




