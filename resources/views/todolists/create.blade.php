@extends('layouts.app')

@section('content')

    <h1>新規todo作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($todolist, ['route' => 'todolists.store']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'todo:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection