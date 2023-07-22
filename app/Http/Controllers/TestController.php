<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {      
        dd('test');
        //Eloquent(エロクアント)
        $values=Test::all();

        $count=Test::count();//件数の取得

        $findOrFile=Test::findOrFail(1);//id1の値のみを取得

        $whereBBB=Test::where('text', '=', 'bbb')->get();//text列がbbbのものを指定し、getを付けることで取得した

        //クエリビルダ
        $query=db::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();//getかfirstを書くことでデータを取得できる
        dd($values, $count, $findOrFile, $whereBBB, $query);
        return view('tests.test', compact('values'));
    }
}
