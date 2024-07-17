<?php
	function uploadfile($files,$allowed_access,$path){
		$file_name=$files['name'];
		$tmp_name=$files['tmp_name'];
		$file_error=$files['error'];
		if($file_error==0){
			$file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
			$file_ex_lc=strtolower($file_ex);
			if(in_array($file_ex_lc,$allowed_access)){
					$new_file_name=uniqid("",true).'.'.$file_ex_lc;
					$file_upload_path="../uploads/".$path.'/'.$new_file_name;
					move_uploaded_file($tmp_name,$file_upload_path);
					$sm['status']="good";
					$sm['data']=$new_file_name;
					return $sm;
				}else{
					$em['status']="error";
					$em['data']="you cant upload this file";
					return $em;
		}
	}else{
				$em['status']="error";
				$em['data']="Error ocured on uploading";
				return $em;
		}
	}