@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Создать новое событие</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{route('event.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="title">Название события</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Введите название события">

              </div>
              <div class="form-group">
                <label for="text">Содержание</label>
                <textarea class="form-control" id="text" name="text" placeholder="Введите текст"></textarea>
                
              </div>


            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Создать</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
     </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection
