<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infomation;
use App\Http\Requests\ProfileInforFormRequest;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infomation = Infomation::get();
        return response()->json($infomation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileInforFormRequest $request)
    {
        try {
            $objInfor = new Infomation();
            $objInfor->name = $request->name;
            $objInfor->content = $request->content;
            $objInfor->status = $request->status;
            $objInfor->save();

            $arrResult = ['status' => true];
            return response()->json($arrResult);
        } catch (Exception $e) {
            $response = response()->json([
                'message' => 'Save data error',
                'status' => false,
                'details' => $e->messages(),
            ], 200);
            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profileInfo = Infomation::where('id', $id)->get();
        return $profileInfo;
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
}
