<?php
	namespace App\Services;
	use App\Models\WebsiteInfo;

	class UploadFileService
	{

        /* Function upload avatar */
        public function uploadFile($req, $file, $pathSaveFile, $idItem, $type)
        {       
            if($type == "avatar") $oldAvatarName = WebsiteInfo::where('id', $idItem)->value('avatar');
            else $oldAvatarName = WebsiteInfo::where('id', $idItem)->value('file_url');
        	$sttDelFile = true;

        	if($oldAvatarName) {
        		$sttDelFile = $this->deleteOldAvatar($pathSaveFile, $oldAvatarName);
        		if($sttDelFile == false) {
        			return ["stt" => false, "value" => "$type - Không thể delete file cũ. Vui lòng thử lại"];
        		}
        	}

        	if($sttDelFile == true){
        		/* Get extension of file current user upload */
    	      $fileExtension = $file->getClientOriginalExtension();

    	      /* Create new name file */
              if($type == 'avatar') $newNameFile = "tpn_".time().rand(0000,9999).".".$file->getClientOriginalExtension();
              else $newNameFile = "CV_TranPhuongNam_".date("Y").".".$file->getClientOriginalExtension();
    	      
    	      /* Save file in to folder */
    	      $saveFile = $file->move($pathSaveFile, $newNameFile);
    	      return ["stt" => true, "value" => $newNameFile];
        	}
        }

        private function deleteOldAvatar($pathSaveFile, $fileName) {
    		$pathFileDelete = $pathSaveFile.'/'.$fileName;
    		if(file_exists($pathFileDelete)) {
    			$deleteFile = unlink($pathFileDelete);
    			return true;
    		} else return false;
        }
	}
?>