@extends('layouts.app')

@section('content')

    <h1>todoリスト一覧</h1>

    @if (count($todolists) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>todoリスト</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $todolist)
                <!--<tr>-->
                <!--    <td>{{ $todolist->id }}</td>-->
                <!--    <td>{{ $todolist->content }}</td>-->
                <!--</tr>-->
                <tr>
                    {{-- todo詳細ページへのリンク --}}
                    <td>{!! link_to_route('todolists.show', $todolist->id, ['todolist' => $todolist->id]) !!}</td>
                    <td>{{ $todolist->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- todolist作成ページへのリンク --}}
    {!! link_to_route('todolists.create', '新規todoの作成', [], ['class' => 'btn btn-primary']) !!}
    

@endsection