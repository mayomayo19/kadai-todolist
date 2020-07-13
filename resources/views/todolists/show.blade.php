@extends('layouts.app')

@section('content')

    <h1>id = {{ $todolist->id }} のtodoの詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $todolist->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $todolist->title }}</td>
        </tr>
        <tr>
            <th>todo</th>
            <td>{{ $todolist->content }}</td>
        </tr>
    </table>
    
    {{-- todo編集ページへのリンク --}}
    {!! link_to_route('todolists.edit', 'このtodoを編集', ['todolist' => $todolist->id], ['class' => 'btn btn-light']) !!}
    
    {{-- todo削除フォーム --}}
    {!! Form::model($todolist, ['route' => ['todolists.destroy', $todolist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection