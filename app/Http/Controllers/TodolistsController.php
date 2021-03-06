<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todolist;    // 追加


class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // todolist一覧を取得
        $todolists = Todolist::all();

        // todolist一覧ビューでそれを表示
        return view('todolists.index', [ 'todolists' => $todolists, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todolist = new Todolist;

        // todolist作成ビューを表示
        return view('todolists.create', [
            'todolist' => $todolist,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',   // 追加
            'content' => 'required|max:255',
        ]);
        
       // todoを作成
        $todolist = new Todolist;
        $todolist->title = $request->title;    // 追加
        $todolist->content = $request->content;
        $todolist->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でtodoを検索して取得
        $todolist = Todolist::findOrFail($id);

        // todo詳細ビューでそれを表示
        return view('todolists.show', [
            'todolist' => $todolist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でtodoを検索して取得
        $todolist = Todolist::findOrFail($id);

        // todolist編集ビューでそれを表示
        return view('todolists.edit', [
            'todolist' => $todolist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',   // 追加
            'content' => 'required|max:255',
        ]);
        
        // idの値でtodoを検索して取得
        $todolist = Todolist::findOrFail($id);
        // todoを更新
        $todolist->title = $request->title;    // 追加
        $todolist->content = $request->content;
        $todolist->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でtodoを検索して取得
        $todolist = Todolist::findOrFail($id);
        // todoを削除
        $todolist->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
