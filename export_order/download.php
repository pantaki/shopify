<?php


$filename = 'orders.csv';
$export_data = unserialize($_POST['export_order_data']);
$orders = $_POST['export_order_data'];
$orders = json_decode($orders, JSON_PRETTY_PRINT);
$start = ($_POST['daterange_start']) ? $_POST['daterange_start'] : time();
$end = ($_POST['daterange_end']) ? $_POST['daterange_end'] : time();
// file creation
$file = fopen($filename,"w");
$date_start = strtotime($start);
$date_end = strtotime($end);
$date_start = date('m/d/Y', $date_start);
$date_end = date('m/d/Y', $date_end);

$date_start = strtotime($date_start);
$date_end = strtotime($date_end);

$export_name = array('product', 'line1', 'line2', 'line3', 'line4', 'line5', 'background', 'font', 'character', 'fontColor', 'zoom1', 'zoom2', 'zoom3', 'zoom4', 'zoom5', 'line1_1', 'line2_1', 'line3_1', 'line4_1', 'line5_1', 'background_1', 'font_1', 'character_1', 'fontColor_1', 'zoom1_1', 'zoom2_1', 'zoom3_1', 'zoom4_1', 'zoom5_1', 'leather_case', 'sheet');
fputcsv($file, $export_name);
foreach ($orders as $order) {
    foreach ($order as $key => $value) {

        $date = strtotime($value['created_at']);
        $date_order = date('m/d/Y', $date);

        $line_items_count = count($value['line_items']);

        foreach ($value['line_items'] as $key1 => $value1) {

            $data_sku = $data_line1 = $data_line2 = $data_line3 = $data_line4 = $data_line5 = $data_background = $data_font_style = $data_character = $data_font_color = $data_zoom1 = $data_zoom2 = $data_zoom3 = $data_zoom4 = $data_zoom5 = '';
            $data_line1_1 = $data_line2_1 = $data_line3_1 = $data_line4_1 = $data_line5_1 = $data_background_1 = $data_font_1 = $data_character_1 = $data_font_color_1 = $data_zoom1_1 = $data_zoom2_1 = $data_zoom3_1 = $data_zoom4_1 = $data_zoom5_1 = '';
            $data_leather_case = $data_sheet = '';

            foreach ($value1['properties'] as $key2 => $value2){

                if ($value2['name'] == 'SKU')            $data_sku   = $value2['value'];
                if ($value2['name'] == 'Line 1')       $data_line1 = $value2['value'];
                if ($value2['name'] == 'Line 2')       $data_line2 = $value2['value'];
                if ($value2['name'] == 'Line 3')       $data_line3 = $value2['value'];
                if ($value2['name'] == 'Line 4')       $data_line4 = $value2['value'];
                if ($value2['name'] == 'Line 5')       $data_line5 = $value2['value'];
                if ($value2['name'] == 'Background')   $data_background = $value2['value'];
                if ($value2['name'] == 'Font Style')   $data_font_style = $value2['value'];
                if ($value2['name'] == 'Character')    $data_character  = $value2['value'];
                if ($value2['name'] == 'Font Color')   $data_font_color = $value2['value'];
                if ($value2['name'] == 'Zoom 1')       $data_zoom1 = $value2['value'];
                if ($value2['name'] == 'Zoom 2')       $data_zoom2 = $value2['value'];
                if ($value2['name'] == 'Zoom 3')       $data_zoom3 = $value2['value'];
                if ($value2['name'] == 'Zoom 4')       $data_zoom4 = $value2['value'];
                if ($value2['name'] == 'Zoom 5')       $data_zoom5 = $value2['value'];
                if ($value2['name'] == 'Line 1_1')       $data_line1_1 = $value2['value'];
                if ($value2['name'] == 'Line 2_1')       $data_line2_1 = $value2['value'];
                if ($value2['name'] == 'Line 3_1')       $data_line3_1 = $value2['value'];
                if ($value2['name'] == 'Line 4_1')       $data_line4_1 = $value2['value'];
                if ($value2['name'] == 'Line 5_1')       $data_line5_1 = $value2['value'];
                if ($value2['name'] == 'Background_1')   $data_background_1 = $value2['value'];
                if ($value2['name'] == 'Font_1')         $data_font_1       = $value2['value'];
                if ($value2['name'] == 'Character_1')    $data_character_1  = $value2['value'];
                if ($value2['name'] == 'Font Color_1')   $data_font_color_1 = $value2['value'];
                if ($value2['name'] == 'Zoom 1_1')       $data_zoom1_1 = $value2['value'];
                if ($value2['name'] == 'Zoom 2_1')       $data_zoom2_1 = $value2['value'];
                if ($value2['name'] == 'Zoom 3_1')       $data_zoom3_1 = $value2['value'];
                if ($value2['name'] == 'Zoom 4_1')       $data_zoom4_1 = $value2['value'];
                if ($value2['name'] == 'Zoom 5_1')       $data_zoom5_1 = $value2['value'];
                if ($value2['name'] == 'Leather Case')   $data_leather_case = $value2['value'];
                if ($value2['name'] == 'Pakage')          $data_sheets = $value2['value'];
            }
            if($data_zoom1 == '') $data_zoom1 = 1.2;

            if(is_numeric($data_sheets)) {
                $data_sheet = $data_sheets;
            } else {

//                if(strpos($data_sheets, 'Sheets') !== false){
//                    $data_sheets = explode("(",$data_sheets);
//                    $data_sheet = explode(" ",$data_sheets[1])[0];
//                }

                if (strpos($data_sheets, 'Sheets') !== false) {
                    preg_match('/(\d) Sheets/', $data_sheets, $matches);
                    $data_sheet = $matches[1];
                }

            }


            $date_order1 = strtotime($date_order);
            if($date_order1 >= $date_start && $date_order1 <= $date_end) {
                $data_item = array($data_sku, $data_line1, $data_line2, $data_line3, $data_line4, $data_line5, $data_background, $data_font_style, $data_character, $data_font_color, $data_zoom1, $data_zoom2, $data_zoom3, $data_zoom4, $data_zoom5, $data_line1_1, $data_line2_1, $data_line3_1, $data_line4_1, $data_line5_1, $data_background_1, $data_font_1, $data_character_1, $data_font_color_1, $data_zoom1_1, $data_zoom2_1, $data_zoom3_1, $data_zoom4_1, $data_zoom5_1, $data_leather_case, $data_sheet);
//                $export_name[] = $data_item;
                fputcsv($file, $data_item);
            }
        }
    }
}



fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

// deleting file
unlink($filename);
exit();
