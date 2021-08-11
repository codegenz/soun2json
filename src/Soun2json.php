<?php

namespace Soun2json;

use XBase\TableReader;

class Soun2json
{

    public function getData() {

	$fileUrl = "https://www.gnivc.ru/html/gnivcsoft/Soun/SOUN_DBF.ARJ";
	$fileName = basename($fileUrl);
	file_put_contents($fileName,file_get_contents($fileUrl));

	$extractCommand="7z e SOUN_DBF.ARJ SOUN1.dbf";
	$stdOut=null;
	$exitCode=null;
	exec($extractCommand, $stdOut, $exitCode);

	$table = new TableReader(
	    'SOUN1.dbf',
	    [
    		'encoding' => 'cp866'
	]);

	$array = array();
	$dataStruct = array();

	while ($record = $table->nextRecord()) {
	    if ($record->get('datak') == "") {
		$dataStruct['code'] = $record->get('kod');
		$dataStruct['name'] = $record->get('naimk');
		array_push($array,$dataStruct);
	    } 
	}

	unlink("SOUN1.dbf");
	return json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}