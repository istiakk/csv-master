<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
        {  
            $this->model = new Model();
        } 
	
	public function invoke()
	{
                if(isset($_GET['export']))
                {
                    $data1 = $_POST['h_array'];
                    $data2= unserialize($data1);
               
                    $filename = "data_export_" . date("Y-m-d H:i:s") . ".csv";
                    
                    $now = gmdate("D, d M Y H:i:s");
                    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
                    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
                    header("Last-Modified: {$now} GMT");

                    // force download  
                    header("Content-Type: application/force-download");
                    header("Content-Type: application/octet-stream");
                    header("Content-Type: application/download");

                    // disposition / encoding on response body
                    header("Content-Disposition: attachment;filename={$filename}");
                    header("Content-Transfer-Encoding: binary");
                    
                    $fp = fopen("php://output", 'w');
                                      
                    fputcsv($fp, array_keys($data2['0']));
                    foreach($data2 AS $values){
                        fputcsv($fp, $values);
                    }
                    fclose($fp);
                    die();
                }
                
		if (!isset($_GET['book']))
		{
			include 'view/booklist.php';
		}
		else
		{
                   // if (file_exists("upload/" . $_FILES["file"]["name"])) {
                   //        echo $_FILES["file"]["name"] . " already exists. ";
                   // }
                   // else {
                        if(isset($_FILES['file']['type'])){
                            $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
                            if(in_array($_FILES['file']['type'],$mimes)){
                               $storagename = $_FILES["file"]["name"];
                               move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
                               $f_nm = $_FILES["file"]["name"];
                               $n = new Controller();
                               $n->readFile($f_nm);
                              // echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
                            } else {
                              die("Sorry, mime type not allowed");
                            }
                        }
                        else
                        {
                            include 'view/booklist.php';
                        }
                  // }
		}
	}
        function readFile($f_nm)
        {
           $csvrows = array_map('str_getcsv', file('upload/'.$f_nm));
           $csvheader = array_shift($csvrows);
          foreach ($csvrows as $row) {
             $csv[] = array_combine($csvheader, $row);
            }
          include 'view/viewbook.php';
        }
        
        function parse_csv_file($file_name) {
	 $data =  $header = array();
        $i = 0;
        $file = fopen($file_name, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            if( $i==0 ) {
                $header = $line;
            } else {
                $data[] = $line;        
            }
            $i++;
        }
        fclose($file);
        foreach ($data as $key => $_value) {
            $new_item = array();
            foreach ($_value as $key => $value) {
                $new_item[ $header[$key] ] =$value;
            }
            $_data[] = $new_item;
        }
        return $_data;
}
        
}

?>