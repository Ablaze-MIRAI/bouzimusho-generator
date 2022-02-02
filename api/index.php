<?php
header("Content-Type: application/octet-stream");
if(isset($_POST["data"]) && !empty($_POST["data"]) && isset($_POST["name"]) && !empty($_POST["name"])){
    preg_match("/data:image\/(\w+);base64,/", $_POST["data"], $ImgType);
    if(!isset($ImgType[0]) || empty($ImgType[0])){
        echo "エラーが発生しました [CODE: DATA_EER]";
        exit;
    }

    try{
        $Data = base64_decode(str_replace("data:image/{$ImgType};base64,", "", $_POST["data"]));
    }catch(Expention $e){
        echo "エラーが発生しました [CODE: CONVERT_EER]";
        exit;
    }

    $filename = $_POST["name"]."-".date("YmdHis").".".$ImgType;
    header("Content-Length: ".filesize($Data));
    header('Content-disposition: attachment; filename="'.$filename.'"');
    readfile($Data);
}else{
    echo "エラーが発生しました [CODE: REQUEST_EER]";
    exit;
}
