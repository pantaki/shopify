<?php

//header("Location: install.php?shop=" . $_GET['shop']);
//exit();
//
require_once("inc/function.php");
//require_once("inc/ShopifyClient.php");

$requests = $_GET;
$shop = $requests['shop'];
$requests = serialize($requests);
$params = array_diff_key($params, array('hmac' => ''));
ksort($params);
$hmac = $_GET['hmac'];


$access_token = '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';
$orders = shopify_call($access_token, $shop, "/admin/api/2022-01/orders.json?status=any", array(), 'GET');
//$orders = json_decode($orders['response'], JSON_PRETTY_PRINT);
//echo '<pre>';
//print_r($orders);
//echo '</pre>';

//    $export_data[] = array('product', 'line1', 'line2', 'line3', 'line4', 'line5', 'background', 'font', 'character', 'fontColor', 'DATE');
//    foreach ($orders as $order) {
//        foreach ($order as $key => $value) {
//            foreach ($value['line_items'] as $key1 => $value1) {
//                foreach ($value1['properties'] as $key2 => $value2){
//
////                    var_dump($value2[]);
//
//
//                    if ($value2['name'] == 'SKU')          $data_sku   = $value2['value'];
//                    if ($value2['name'] == 'Line 1')       $data_line1 = $value2['value'];
//                    if ($value2['name'] == 'Line 2')       $data_line2 = $value2['value'];
//                    if ($value2['name'] == 'Line 3')       $data_line3 = $value2['value'];
//                    if ($value2['name'] == 'Line 4')       $data_line4 = $value2['value'];
//                    if ($value2['name'] == 'Line 5')       $data_line5 = $value2['value'];
//                    if ($value2['name'] == 'Background')   $data_background = $value2['value'];
//                    if ($value2['name'] == 'Font Style')   $data_font_style = $value2['value'];
//                    if ($value2['name'] == 'Character')    $data_character  = $value2['value'];
//                    if ($value2['name'] == 'Font Color')   $data_font_color = $value2['value'];
//                    if ($value2['name'] == 'Zoom 1')       $data_zoom1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 2')       $data_zoom2 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 3')       $data_zoom3 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 4')       $data_zoom4 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 5')       $data_zoom5 = $value2['value'];
//                    if ($value2['name'] == 'Line 1_1')       $data_line1_1 = $value2['value'];
//                    if ($value2['name'] == 'Line 2_1')       $data_line2_1 = $value2['value'];
//                    if ($value2['name'] == 'Line 3_1')       $data_line3_1 = $value2['value'];
//                    if ($value2['name'] == 'Line 4_1')       $data_line4_1 = $value2['value'];
//                    if ($value2['name'] == 'Line 5_1')       $data_line5_1 = $value2['value'];
//                    if ($value2['name'] == 'Background_1')   $data_background_1 = $value2['value'];
//                    if ($value2['name'] == 'Font_1')         $data_font_1       = $value2['value'];
//                    if ($value2['name'] == 'Character_1')    $data_character_1  = $value2['value'];
//                    if ($value2['name'] == 'Font Color_1')   $data_font_color_1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 1_1')       $data_zoom1_1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 2_1')       $data_zoom2_1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 3_1')       $data_zoom3_1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 4_1')       $data_zoom4_1 = $value2['value'];
//                    if ($value2['name'] == 'Zoom 5_1')       $data_zoom5_1 = $value2['value'];
//                    if ($value2['name'] == 'Leather Case')   $data_leather_case = $value2['value'];
//                    if ($value2['name'] == 'Sheet')          $data_sheet = $value2['value'];
//                }
//
//                $data_item = array($data_sku, $data_line1, $data_line2, $data_line3, $data_line4, $data_line5, $data_background, $data_font_style, $data_character, $data_font_color, $data_zoom1, $data_zoom2, $data_zoom3, $data_zoom4, $data_zoom5, $data_line1_1, $data_line2_1, $data_line3_1, $data_line4_1, $data_line5_1, $data_background_1, $data_font_1, $data_character_1, $data_font_color_1, $data_zoom1_1, $data_zoom2_1, $data_zoom3_1, $data_zoom4_1, $data_zoom5_1, $data_leather_case, $data_sheet);
//
//
//                $export_data[] = $data_item;
//
////                $date_order = strtotime($date_order);
////                if($date_order >= $date_start && $date_order <= $date_end) {
////                    fputcsv($file, $data_item);
////                }
//            }
//
////            $date = strtotime($value['created_at']);
////            $date_order = date('m/d/Y', $date);
//
////            $line_items_count = count($value['line_items']);
////            for ($i = 0; $i < $line_items_count; $i++) {
////                $product_name = $value['line_items'][$i]['name'];
////                $properties_count = count($value['line_items'][$i]['properties']);
////                $data_item = array();
////                $data_item['name'] = $product_name;
////                for ($j = 0; $j < $properties_count; $j++) {
////                    $properties_name = $value['line_items'][$i]['properties'][$j]['name'];
////                    $properties_value = $value['line_items'][$i]['properties'][$j]['value'];
////
////                    if ($properties_name == 'Line 1') $data_item['line1'] = $properties_value;
////                    if ($properties_name == 'Line 2') $data_item['line2'] = $properties_value;
////                    if ($properties_name == 'Line 3') $data_item['line3'] = $properties_value;
////                    if ($properties_name == 'Line 4') $data_item['line4'] = $properties_value;
////                    if ($properties_name == 'Line 5') $data_item['line5'] = $properties_value;
////                    if ($properties_name == 'Background') $data_item['background'] = $properties_value;
////                    if ($properties_name == 'Font Style') $data_item['font-style'] = $properties_value;
////                    if ($properties_name == 'Character')  $data_item['character'] = $properties_value;
////                    if ($properties_name == 'Font Color') $data_item['font-color'] = $properties_value;
////                }
////                $data_item['date'] = $date_order;
////                $export_data[] = $data_item;
////            }
//        }
//    }
//    echo '<pre>';
//    print_r($export_data);
//    echo '</pre>';
//var_dump($export_data);
//    $serialize_order_arr = serialize($export_data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Redesign</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css">

</head>
<body>
<div class="container">
    <div class="details">
        <div class="kiddo-order-export-custom recentOrders">
            <h2>Order Export</h2>
            <div class="daterange">
                <form action="download.php" method="post">
                    <h3>Choose date</h3>
                    <input type="text" class="order-input-field" name="daterange" value="" />
                    <input type="hidden" name="daterange_start" value="" />
                    <input type="hidden" name="daterange_end" value="" />
                    <textarea name='export_order_data' style='display: none;'><?php echo $orders['response'] ?></textarea>
                    <input type="submit" name="export_order" class="btn btn-success kiddo-submit-export-order" value="Export"/>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            showDropdowns: true,
            // minYear: 2005,
            // maxYear: parseInt(moment().format('YYYY'), 10)
        }, cb);

        function cb(start, end) {
            // alert(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('input[name="daterange_start"]').val(start);
            $('input[name="daterange_end"]').val(end);

            // $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    })
    </script>
</body>
</html>

