<?php

$ref = @$_POST['ref'] ? @$_POST['ref']: '' ;
$query = @$_POST['query'] ? @$_POST['query']: '' ;

$excludedFiles = ['.','..'];
$dataFiles = [];

$files = scandir(STATIC_DATA);

foreach($files as $file){
    if(!in_array($file, $excludedFiles)){
        $dataFiles[] = $file;
    }
}

if(in_array($ref.'.php', $dataFiles)){
    $dataFile = $ref.'.php';
    include_once STATIC_DATA.$dataFile;

    $data = get_defined_vars();
    $d = $data[$query];
}else{
   // echo $ref.'.php not found';
}

$message = ['status_code'=>200, 'status'=>200, 'data'=>['message'=>$d]];

echo json_response($message);

die();