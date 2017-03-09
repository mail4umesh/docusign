<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function import_excel() 
{
//  Include PHPExcel_IOFactory
include 'phpexcel/PHPExcel/IOFactory.php';

$inputFileName = 'excel/contract.xls';

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(4); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
$CI =& get_instance();
?>
<table border="1px">
<?php
//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $highestRow ; $row++){ 
	echo "<tr>";
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . 'B' . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
    //  Insert row data array into your database of choice here
	echo "<td>".$row."</td>"."<td>".$rowData[0][0]."</td>"."<td>".$rowData[0][1]."</td>";
    
    //echo "<td>".$row."</td>"."<td>".$rowData[0][0]."</td>"."<td>".$rowData[0][1]."</td>"."<td>".$rowData[0][2]."</td>"."<td>".$rowData[0][3]."</td>"."<td>".$rowData[0][5]."</td>"."<td>".$rowData[0][5]."</td>"."<td>".$rowData[0][6]."</td>"."<td>".$rowData[0][7]."</td>"."<td>".$rowData[0][8]."</td>"."<td>".$rowData[0][9]."</td>";
	//echo "<td>".$row."</td>"."<td>".$rowData[0][0]."</td>"."<td>".$rowData[0][1]."</td>"."<td>".$rowData[0][2]."</td>"."<td>".$rowData[0][3]."</td>"."<td>".$rowData[0][5]."</td>"."<td>".$rowData[0][5]."</td>"."<td>".$rowData[0][6]."</td>"."<td>".$rowData[0][7]."</td>";
    /*$table_data = array(
                "material"              =>  $rowData[0][0],
                
                "mm20"                  =>  $rowData[0][1],
                "mm30"                  =>  $rowData[0][2],

                "slab_20mm_L"           =>  $rowData[0][3],
                "slab_20mm_w"           =>  $rowData[0][4],

                "slab_30mm_L"           =>  $rowData[0][5],
                "slab_30mm_w"           =>  $rowData[0][6],

                "supplier"              =>  $rowData[0][7],
                
                
            ); */

      /*  $table_data = array(
                "material"              =>  $rowData[0][0],
                
                "mm20_sell"                  =>  $rowData[0][1],
                "mm30_sell"                  =>  $rowData[0][2],

                "mm20_cost"                  =>  $rowData[0][3],
                "mm30_cost"                  =>  $rowData[0][4],


                "slab_20mm_L"           =>  $rowData[0][5],
                "slab_20mm_w"           =>  $rowData[0][6],

                "slab_30mm_L"           =>  $rowData[0][7],
                "slab_30mm_w"           =>  $rowData[0][8],

                "supplier"              =>  $rowData[0][9],
                
                
            ); 
        
*/

        
        $table_data = array(
                "table_name"              =>  "extra",
                
                "table_for"               =>  "contract",
                "name"                    =>  $rowData[0][0],

                "value"                   =>  $rowData[0][1],
                
                
                "updated_at"              =>  date("Y-m-d h:i:s"),                
                
            );
        $CI->db->insert('price_extra', $table_data);


	//echo "<td>"; print_r($rowData); echo "</td>";
	

	
	echo "</tr>";
	
}

?>
</table>
<?php 
}
?>