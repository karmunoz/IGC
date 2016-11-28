<?PHP
 error_reporting(0);
  $data = $_GET['varA'];
  //PHPExcel_1.8.0_doc\Classes
  function cleanData(&$str)
  {
  	
  	$str = $str['value'];
    $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
  }



  // filename for download
  $filename = "data_" . date('Ymd') . ".xls";

  

  $flag = false;
  foreach($data as $row) {

    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
      
    }

    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
 
  }
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel ; charset=UTF-16LE");
  exit;
?>