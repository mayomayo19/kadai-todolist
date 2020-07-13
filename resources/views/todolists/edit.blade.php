@extends('layouts.app')

@section('content')

    <h1>id: {{ $todolist->id }} のtodo編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($todolist, ['route' => ['todolists.update', $todolist->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'todo:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection