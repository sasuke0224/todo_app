<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\History;

use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('status', true)->get();
  
        return view('history.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $rules = [
            //
        ];

         
  
        //モデルをインスタンス化
        $history = new History;
        
        //モデル->カラム名 = 値 で、データを割り当てる
        $history->name = $request->input('task_name');
        
        //データベースに保存
        $history->save();
        
        //リダイレクト
        return redirect('/History');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    //「完了」ボタンを押したとき
    if ($request->status === 0) {

        //該当のタスクを検索
        $history = Task::find($id);
    
        //モデル->カラム名 = 値 で、データを割り当てる
        $history->status = true; //true:完了、false:未完了
    
        //データベースに保存
        $history->save();
      }
    
    
      //リダイレクト
      return redirect('/History');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
