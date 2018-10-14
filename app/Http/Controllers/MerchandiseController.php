<?php

namespace App\Http\Controllers;

use App\Shop\Entity\Merchandise;
use Validator;
use DB;

class MerchandiseController extends Controller {

    public function indexPage(){
        // 重新導向至商品頁
        return redirect('/merchandise');
    }

    public function merchandiseListPage(){
        return view('merchandise.listMerchandise');
    }

    public function merchandiseCreateProcess(){
        $merchandise_data=[
            'status'          => 'C',   // 建立中
            'name'            => '',    // 商品名稱
            'name_en'         => '',    // 商品英文名稱
            'introduction'    => '',    // 商品介紹
            'introduction_en' => '',    // 商品英文介紹
            'photo'           => null,  // 商品照片
            'price'           => 0,     // 價格
            'remain_count'    => 0,     // 商品剩餘數量
        ];
        $Merchandise=Merchandise::create($merchandise_data);
        return redirect('/merchandise/'.$Merchandise->id.'/edit');
    }
    public function merchandiseItemEditPage($merchandise_id){
        // DB::enableQueryLog();
        // 撈取商品資料
        $Merchandise = Merchandise::findOrFail($merchandise_id);
        // $Merchandise = Merchandise::where('id',$merchandise_id)->firstOrFail();
        // var_dump(DB::getQueryLog());
        // exit;
        if (!is_null($Merchandise->photo)) {
            // 設定商品照片網址
            $Merchandise->photo = url($Merchandise->photo);
        }
        // var_dump($Merchandise);
        // exit;
        $binding = [
            'title' => '編輯商品',
            'Merchandise'=> $Merchandise,
        ];
        return view('merchandise.editMerchandise', $binding);
    }
}
