<?php
// if(!function_exists('upload_image')){
//     function upload_image($file,$folder='',array $extend=array()){
//         $code=1;
//         //lấy đường dẫn ảnh
//         $baseFilename=public_path().'/uploads/'.$_FILES[$file]['name'];
//         //thoog tin file
//         $info=new SplFileInfo($baseFilename);
//         //đuôi file
//         $ext=strtolower($info->getExtension());
//         //kiểm tra định dạng file
//         if(!$extend){
//             $extend=['png'.'jpg'];
//         }
//         if(!in_array($ext,$extend)){
//             return $data['code']=0;
//         }
//         //tên file mới
//         $nameFile=trim(str_replace('.'.$ext,'',strtolower($info->getFilename( ))));
//         $filename=data('Y-m-d_').str_slug($nameFile).'.'.$ext;
//         //thư mục gốc để upload
//         $path=public_path().'/uploads/'.date('Y/m/d/');
//         if($folder){
//             $path=public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
//         }
//         if(!\File::exists($path)){
//             mkdir($path,0777,true);
//         }
//         //di chuyển file vào thư mục upload
//         move_uploaded_files($_FILES[$file]['tmp_name'],$path.$filename);

//         $data=[
//             'name'=>$filename,
//             'code'=>$code,
//             'path_img'=>'upload/'.$filename

//         ];
//         return $data;
//     }
//}