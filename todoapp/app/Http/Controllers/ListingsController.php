<?php

namespace App\Http\Controllers;

use App\Listing;
use Auth;
use Validator;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function index()
    {
        // Listingモデルを介してデータベースからデータを取得。whereで取得したデータは配列になっている。
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
            
         // コントローラからビューへの値の受け渡しをview関数を使って実施
        return view('listing/index', ['listings' => $listings]);
    }
    
    public function new()
    {
        return view('listing/new');
        // テンプレート「listing/new.blade.php」を表示します。
    }
    
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['list_name' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければListingモデルを介して、作ったユーザーidとタイトルをlistingsテーブルに保存
        $listings = new Listing;
        $listings->title = $request->list_name;
        $listings->user_id = Auth::user()->id;
        $listings->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    
    public function edit($listing_id)
    {
        $listing =Listing::find($listing_id);
        return view('listing/edit', ['listing' => $listing]);
    }
    
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['list_name' => 'required|max:255', ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listings=Listing::where('id', $request->id);
        $listings->update(['title' => $request->list_name]);
        
        return redirect('/');
    }
    
    public function destroy($listing_id)
    {
        $listings=Listing::where('id',$listing_id)->delete();
        return redirect('/');
    }
}
