<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WebInfoRequest;
use App\Models\WebsiteInfo;
use App\Services\UploadFileService;

class WebsiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WebsiteInfo::get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $websiteInfor = WebsiteInfo::where("id", $id)->get();
        return $websiteInfor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadFileService $uploadFileService, $id)
    {   
        try {
            $websiteInfo = WebsiteInfo::find($id);
            $websiteInfoData['website_name'] = $request->websiteName;
            $websiteInfoData['short_desc'] = $request->description;
            if($request->hasFile('avatar')) 
            {
                $file = $request->file('avatar');
                $pathSaveFile = public_path("uploads/images/website");
                $type = "avatar";
                $arrayFileUpload = $uploadFileService->uploadFile($request, $file, $pathSaveFile, $id, $type);
                if($arrayFileUpload['stt'] == true)
                {
                    $websiteInfoData['avatar'] = $arrayFileUpload['value'];
                }else{
                    return response()->json($arrayFileUpload);
                }
            }

            if ($request->hasFile('mycv')) {
                $file = $request->file('mycv');
                $pathSaveFile = public_path("uploads/pdf_files/website");
                $type = "mycv";
                $arrayFileUpload = $uploadFileService->uploadFile($request, $file, $pathSaveFile, $id, $type);
                if($arrayFileUpload['stt'] == true)
                {
                    $websiteInfoData['file_url'] = $arrayFileUpload['value'];
                }else{
                    return response()->json($arrayFileUpload);
                }
            }
            $websiteInfoUpdate = $websiteInfo->update($websiteInfoData);
            return response()->json(["msg" => "Update success"]);
        } catch (Exception $e) {
            return response()->json(['msg'=>$e->getMessage()], 500);
        }
        
    }

    public function downloadMyCV() {
        $myCV = WebsiteInfo::value('file_url');
        return response()->json($myCV);
    }
}
