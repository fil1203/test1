<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Attribute;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $goods = Good::all();
        $data = [
            'goods'=>$goods,
        ];

        return view ('welcome',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if($request->isMethod('post')){
        $input['title'] = strip_tags($request['title']);
        $input['price'] = strip_tags($request['price']);
        $input['color'] =strip_tags( $request['color']);
        $input['code'] =strip_tags( $request['code']);
        $pivot = strip_tags($request['sku']);
        $attr =strip_tags($request['size']) ;
        $prod = new Good();
        $prod->fill($input);
        if($prod->save()){
            $prod->attributes()->attach($attr, ['sku'=>$pivot]);

            return redirect()->back()->with('status','ok');
        }
    }

        $sizes = Attribute::orderBy('title','desc')->get();
        $data = [
            'sizes'=>$sizes,
        ];
        return view('create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $product = Good::with('attributes')->find($id);
        $group_goods = Good::getGroupGoods($product->code);

        $data = [
            'product'=>$product,
            'group_goods'=>$group_goods,

        ];

        return view('product', $data);
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
        $product = Good::with('attributes')->find($id);
        $sizes = Attribute::orderBy('title','desc')->get();
        $data = [
            'sizes'=>$sizes,
            'product'=>$product,
        ];
        return view('edit',$data);


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
        //
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


    public function ajaxSize(Request $request){

        $size = $request->size;
        $id = $request->id;

        $prod = Good::with('attributes')->where('id', $id)->first();
        foreach ($prod->attributes as $attribute) {
            if($attribute->title == $size){
                (session()->put('sku',$attribute->pivot->sku));

                echo $attribute->pivot->sku;
            }
        }

    }
}
