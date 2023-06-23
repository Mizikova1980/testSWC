@extends('layouts.admin')

@section('content')
<!-- About Me Box -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$event->title}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="profile-username text-center">Описание события</i></strong>
      <p class="text-muted">{{ $event->text }}</p>

      <strong><i class="profile-username text-center">Дата создания</i></strong>
      <p class="text-muted">{{ $event->created_at }}</p>

    </div>
    <!-- /.card-body -->

    @if(Auth::id() === $event->user_id)
    <form method="POST" action="{{ route('event.deleteParticipant') }}" enctype="multipart/form-data">
        @csrf
        @method('delete')
       
        <input type="hidden" class="form-control"  name="user" value={{Auth::id() }}>
        <input type="hidden" class="form-control"  name="event" value={{$event->id}}>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Отказаться от участия</button>
        </div>
      </form>


    @else

    <form method="POST" action="{{ route('event.addParticipant')}}" enctype="multipart/form-data">
        @csrf
          <input type="hidden" class="form-control"  name="user" value={{Auth::id()}}>
          <input type="hidden" class="form-control"  name="event" value={{$event->id}}>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Принять участие</button>
        </div>
      </form>

      @endif




    <div class="card-body">
        <strong><i class="profile-username text-center">Участники</i></strong>
        <ul class="nav nav-treeview">
        @foreach($event->users as $event->user)
            <li class="nav-item">
                <div class="info">
                    <a href="{{ route('user.show', $event->user->id) }}" class="nav-link">{{$event->user->name }}</a>
                </div>
            </li>
        @endforeach
        </ul>

      </div>
      <!-- /.card-body -->






  </div>
  <!-- /.card -->

  @endsection




