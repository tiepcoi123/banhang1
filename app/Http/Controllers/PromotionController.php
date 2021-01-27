<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Dish,Promotion};
use Validator;
use Session;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Promotion::latest()->paginate(10);

        return view('promotion.list', compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $rule[$key] = 'required';
            if($key == 'discount'){
                $rule[$key] = 'required|max:100|numeric';
            }

            if($key == 'end_date'){
                $rule[$key] = 'after_or_equal:start_date';
            }
        }

        $validator  = Validator::make($request->all(), $rule,
            [
                'name.required'             => 'Tên khuyến mại chưa có',
                'code.required'             => 'Mã khuyến mại chưa có',
                'start_date.required'       => 'Ngày bắt đầu khuyến mại chưa có',
                'start_date.date'           => 'Ngày tháng không đúng định dạng',
                'end_date.date'             => 'Ngày tháng không đúng định dạng',
                'end_date.after_or_equal'   => 'Thời gian hết hạn phải lớn hơn thời gian bắt đầu',
                'discount.required'         => 'Phần trăm khuyến mại chưa có',
                'discount.max'              => 'Mày định bán nhà à',
                'discount.numeric'          => 'Phần trăm phải là dạng số',
            ]
        );

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $insertPromotion = Promotion::create($request->except('_token'));

        \Session::flash('success' , 'Thêm mới thành công');


        return redirect()-> route('list_promotion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        if($promotion->type == 1){
            $promotion->update([
                'name'            => $request->name,
                'code'            => $request->code,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'count_apply'     => $request->count_apply,
                'discount'        => $request->discount,
            ]);
        }
        else{
            $promotion->update([
                'name'            => $request->name,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'discount'        => $request->discount,
            ]);
        }

        Session::flash('success', 'Chỉnh sửa thành công');

        return redirect()->route('list_promotion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return response()->json([], 204);
    }

    /**
     * Tạo mã code tự động
     *
     * @return void
     */
    public function generateCode()
    {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return response()->json(['status' => 'success', 'data' =>  $randomString], 201);
    }
}
