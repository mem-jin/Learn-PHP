<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;

class CardsController extends Controller
{
    //
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    public function new($listing_id)
    {
        return view('card/new', compact('listing_id'));
    }
    
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['card_name' => 'required|max:255', 'card_memo' => 'max:1023']);
        
        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければListingモデルを介して、作ったユーザーidとタイトルをlistingsテーブルに保存
        $cards = new Card;
        $cards->title = $request->card_name;
        $cards->memo = $request->card_memo;
        $cards->listing_id = $request->id;
        $cards->save();
        return redirect('/');
        // テンプレート「listing/new.blade.php」を表示します。
    }
    
    public function detail($listing_id, $card_id)
    {
        $card =Card::where('id', $card_id)
            ->first();
        $listing =Listing::where('id', $listing_id)
            ->first();
        return view('card/show', ['card' => $card, 'listing' => $listing]);
    }
    
    
    
    
    public function edit($card_id)
    {
        $card =Card::where('id', $card_id)
            ->first();
            
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
            
            return view('card/edit', ['card' => $card, 'listings' => $listings]);
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
    
    
    
    public function destroy($card_id)
    {
        $card=Card::where('id',$card_id)->delete();
        return redirect('/');
    }
    
}
