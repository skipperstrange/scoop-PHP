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

    if(isset($data[$query])){
        $d = $data[$query];
        $status = 200;
        $message['data'] = $d;
    }
    else{
        $status = 404;
        $message['data'] = 'Not Found';
       // echo $ref.'.php not found';
    }

}else{
    $status = 404;
    $message['data'] = 'Data resource does not exist';
   // echo $ref.'.php not found';
}

;

die(json_response($message, $status));