<?php
$link = mysqli_connect('localhost', 'dbpt10', 'dbpadmint10!', 'dbpt10');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$query = "select isPublic from toilet";
$result = mysqli_query($link, $query);
// print_r($result);
$row_num = mysqli_num_rows($result); //게시판 총 레코드 수
$list = 5; //한 페이지에 보여줄 개수
$block_ct = 5; //블록당 보여줄 페이지 개수

$page_num = ceil($row_num/$list); //총 페이지
$block_num = ceil($page_num/$block_ct); //총 블럭
$nowBlock = ceil($page/$block_ct); //현재 페이지가 위차한 블록 번호

$block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
$block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
if ($block_end > $total_page) {
    $block_end = $total_page;
} //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
$total_block = ceil($total_page/$block_ct); //블럭 총 개수
$start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

$prevBlock = $nowBlock-1;
$nextBlock = $nowBlock+1;



$query2 = "select isPublic, toilet_name, road_addr, isUnisex, m_d_toilet, w_d_toilet, m_k_toilet, w_k_toilet, open_time from toilet limit {$start_num}, {$list}";
$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$toilet_info = '';
while ($row = mysqli_fetch_array($result2)) {
    $toilet_info .= '<tr>';
    $toilet_info .= '<td>'.$row['isPublic'].'</td>';
    $toilet_info .= '<td>'.$row['toilet_name'].'</td>';
    $toilet_info .= '<td>'.$row['road_addr'].'</td>';
    $toilet_info .= '<td>'.$row['isUnisex'].'</td>';
    $toilet_info .= '<td>'.$row['m_d_toilet'].'</td>';
    $toilet_info .= '<td>'.$row['w_d_toilet'].'</td>';
    $toilet_info .= '<td>'.$row['m_k_toilet'].'</td>';
    $toilet_info .= '<td>'.$row['w_k_toilet'].'</td>';
    $toilet_info .= '<td>'.$row['open_time'].'</td>';
    $toilet_info .= '</tr>';
}

if (isset($_GET['city']) && isset($_GET['gu'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['city']);
    $filtered_gu = mysqli_real_escape_string($link, $_GET['gu']);
    // $query3 = "select isPublic, toilet_name, road_addr, isUnisex, m_d_toilet, m_d_urinal, w_d_toilet, open_time from toilet WHERE  limit {$start_num}, {$list}";
    $query3 =   "select isPublic, toilet_name, road_addr, isUnisex, m_d_toilet, w_d_toilet, m_k_toilet, w_k_toilet, open_time from toilet where regexp_like(road_addr, '{$filtered_gu}') limit {$start_num}, {$list}";
    $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
    $toilet_info = '';
    while ($row = mysqli_fetch_array($result3)) {
        $toilet_info .= '<tr>';
        $toilet_info .= '<td>'.$row['isPublic'].'</td>';
        $toilet_info .= '<td>'.$row['toilet_name'].'</td>';
        $toilet_info .= '<td>'.$row['road_addr'].'</td>';
        $toilet_info .= '<td>'.$row['isUnisex'].'</td>';
        $toilet_info .= '<td>'.$row['m_d_toilet'].'</td>';
        $toilet_info .= '<td>'.$row['w_d_toilet'].'</td>';
        $toilet_info .= '<td>'.$row['m_k_toilet'].'</td>';
        $toilet_info .= '<td>'.$row['w_k_toilet'].'</td>';
        $toilet_info .= '<td>'.$row['open_time'].'</td>';
        $toilet_info .= '</tr>';
    }
} elseif (isset($_GET['city'])) {
    // 특별시 선택할 때
    $filtered_id = mysqli_real_escape_string($link, $_GET['city']);
    // $query3 = "select isPublic, toilet_name, road_addr, isUnisex, m_d_toilet, m_d_urinal, w_d_toilet, open_time from toilet WHERE  limit {$start_num}, {$list}";
    $query3 = "select isPublic, toilet_name, road_addr, isUnisex, m_d_toilet, w_d_toilet,m_k_toilet,w_k_toilet,open_time from toilet where regexp_like(road_addr, {$filtered_id}) limit {$start_num}, {$list}";

    $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
    $city_info = '';

    while ($row = mysqli_fetch_array($result3)) {
        $city_info .= '<tr>';
        $city_info .= '<td>'.$row['isPublic'].'</td>';
        $city_info .= '<td>'.$row['toilet_name'].'</td>';
        $city_info .= '<td>'.$row['road_addr'].'</td>';
        $city_info .= '<td>'.$row['isUnisex'].'</td>';
        $city_info .= '<td>'.$row['m_d_toilet'].'</td>';
        $city_info .= '<td>'.$row['w_d_toilet'].'</td>';
        $city_info .= '<td>'.$row['m_k_toilet'].'</td>';
        $city_info .= '<td>'.$row['w_k_toilet'].'</td>';
        $city_info .= '<td>'.$row['open_time'].'</td>';
        $city_info .= '</tr>';
    }
}

// 우측 상단 테이블
$link1 = mysqli_connect('localhost', 'dbpt10', 'dbpadmint10!', 'dbpt10');

if (isset($_GET['page1'])) {
    $page1 = $_GET['page1'];
} else {
    $page1 = 1;
}
$q1 = "SELECT isPublic from toilet";
$res1 = mysqli_query($link1, $q1);
// print_r($res1);
$row1 = mysqli_num_rows($res1); //게시판 총 레코드 수
$list1 = 14; //한 페이지에 보여줄 개수
$block_cnt = 5; //블록당 보여줄 페이지 개수

$page_num1 = ceil($row1/$list1); //총 페이지
$block_num1 = ceil($page_num1/$block_cnt); //총 블럭
$nowBlock1 = ceil($page1/$block_cnt); //현재 페이지가 위차한 블록 번호

$block_num1 = ceil($page1/$block_cnt); // 현재 페이지 블록 구하기
$block_start1 = (($block_num1 - 1) * $block_cnt) + 1; // 블록의 시작번호
$block_end1 = $block_start1 + $block_cnt - 1; //블록 마지막 번호

$total_page1 = ceil($row1 / $list1); // 페이징한 페이지 수 구하기
if ($block_end1 > $total_page1) {
    $block_end1 = $total_page1;
} //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
$total_block1 = ceil($total_page1/$block_cnt); //블럭 총 개수
$start_num1= ($page1-1) * $list1; //시작번호 (page-1)에서 $list1를 곱한다.

$prevBlock1 = $nowBlock1-1;
$nextBlock1 = $nowBlock1+1;
$region = '서울';

$map = $_GET['map'];


$display_01 = "style=\"display: block;\"";
$display_02 = "style=\"display: none;\"";
$display_03 = "style=\"display: none;\"";
$display_04 = "style=\"display: none;\"";
$display_05 = "style=\"display: none;\"";
$display_06 = "style=\"display: none;\"";
$display_07 = "style=\"display: none;\"";
$display_08 = "style=\"display: none;\"";
$display_09 = "style=\"display: none;\"";
$display_10 = "style=\"display: none;\"";
$display_11 = "style=\"display: none;\"";
$display_12 = "style=\"display: none;\"";
$display_13 = "style=\"display: none;\"";
$display_14 = "style=\"display: none;\"";
$display_15 = "style=\"display: none;\"";
$display_16 = "style=\"display: none;\"";
$display_17 = "style=\"display: none;\"";
$img_1 = "src=\"./images/map_1_off.png\"";
$img_2 = "src=\"./images/map_2_off.png\"";
$img_3 = "src=\"./images/map_3_off.png\"";
$img_4 = "src=\"./images/map_4_off.png\"";
$img_5 = "src=\"./images/map_5_off.png\"";
$img_6 = "src=\"./images/map_6_off.png\"";
$img_7 = "src=\"./images/map_7_off.png\"";
$img_8 = "src=\"./images/map_8_off.png\"";
$img_9 = "src=\"./images/map_9_off.png\"";
$img_10 = "src=\"./images/map_10_off.png\"";
$img_11= "src=\"./images/map_11_off.png\"";
$img_12= "src=\"./images/map_12_off.png\"";
$img_13= "src=\"./images/map_13_off.png\"";
$img_14= "src=\"./images/map_14_off.png\"";
$img_15= "src=\"./images/map_15_off.png\"";
$img_16= "src=\"./images/map_16_off.png\"";
$img_17= "src=\"./images/map_17_off.png\"";


switch ($map) {
  case '01':
  $region = '서울';
  $display_01 = "style=\"display: block;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_on.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '02':
  $region = '인천';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: block;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_on.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";

  break;
  case '03':
  $region = '경기';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: block;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_on.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '04':
  $region = '강원';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: block;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_on.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '05':
  $region = '충청남도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: block;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_on.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '06':
  $region = '경상북도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: block;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_on.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '07':
  $region = '대전';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: block;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_on.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '08':
  $region = '대구';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: block;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_on.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '09':
  $region = '전라북도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: block;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_on.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '10':
  $region = '울산';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: block;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_on.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '11':
  $region = '경상남도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: block;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_on.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '12':
  $region = '부산';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: block;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_on.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '13':
  $region = '충청북도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: block;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_on.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '14':
  $region = '세종';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: block;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_on.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '15':
  $region = '전라남도';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: block;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_on.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '16':
  $region = '제주';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: block;\"";
  $display_17 = "style=\"display: none;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_on.png\"";
  $img_17= "src=\"./images/map_17_off.png\"";
  break;
  case '17':
  $region = '광주';
  $display_01 = "style=\"display: none;\"";
  $display_02 = "style=\"display: none;\"";
  $display_03 = "style=\"display: none;\"";
  $display_04 = "style=\"display: none;\"";
  $display_05 = "style=\"display: none;\"";
  $display_06 = "style=\"display: none;\"";
  $display_07 = "style=\"display: none;\"";
  $display_08 = "style=\"display: none;\"";
  $display_09 = "style=\"display: none;\"";
  $display_10 = "style=\"display: none;\"";
  $display_11 = "style=\"display: none;\"";
  $display_12 = "style=\"display: none;\"";
  $display_13 = "style=\"display: none;\"";
  $display_14 = "style=\"display: none;\"";
  $display_15 = "style=\"display: none;\"";
  $display_16 = "style=\"display: none;\"";
  $display_17 = "style=\"display: block;\"";
  $img_1 = "src=\"./images/map_1_off.png\"";
  $img_2 = "src=\"./images/map_2_off.png\"";
  $img_3 = "src=\"./images/map_3_off.png\"";
  $img_4 = "src=\"./images/map_4_off.png\"";
  $img_5 = "src=\"./images/map_5_off.png\"";
  $img_6 = "src=\"./images/map_6_off.png\"";
  $img_7 = "src=\"./images/map_7_off.png\"";
  $img_8 = "src=\"./images/map_8_off.png\"";
  $img_9 = "src=\"./images/map_9_off.png\"";
  $img_10 = "src=\"./images/map_10_off.png\"";
  $img_11= "src=\"./images/map_11_off.png\"";
  $img_12= "src=\"./images/map_12_off.png\"";
  $img_13= "src=\"./images/map_13_off.png\"";
  $img_14= "src=\"./images/map_14_off.png\"";
  $img_15= "src=\"./images/map_15_off.png\"";
  $img_16= "src=\"./images/map_16_off.png\"";
  $img_17= "src=\"./images/map_17_on.png\"";
  break;
}

$q2 = "SELECT toilet_name from toilet where addr like '$region%' limit {$start_num1}, {$list1}";
$res2 = mysqli_query($link1, $q2) or die(mysqli_error($link1));
$toilet_info1 = '';
$toilet_info1 .= '<tr>';
while ($row1 = mysqli_fetch_array($res2)) {
    $toilet_info1 .= '  <td style="height:40px; text-align:center; font-size:15px;
  border-right:1px solid #c8c8c8; border-bottom:1px solid #c8c8c8;">
  <a href="#">'.$row1['toilet_name'].'</td>';
    $row1 = mysqli_fetch_array($res2);
    $toilet_info1 .= '  <td style="height:40px; text-align:center; font-size:15px;
  border-right:1px solid #c8c8c8; border-bottom:1px solid #c8c8c8;">
  <a href="#">'.$row1['toilet_name'].'</td>';
    $toilet_info1 .= '</tr>';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>

  table.list-table {
    border-collapse: collapse;
    text-align: center;
    line-height: 1;
  }
  table.list-table thead th {
    /* border-top: 1px solid #787878; */
    padding: 10px;
    font-weight: bold;
    vertical-align: center;
    color: black;
    border-bottom: 2px solid #288C28;
    text-align: center;
  }
  table.list-table tbody th {
    width: 150px;
    padding: 10px;
    font-weight: bold;
    vertical-align: center;
    border-bottom: 1px solid #ccc;
    background: #f3f6f7;
    text-align: center;
  }
  table.list-table td {
    color: #787878;
    padding: 10px;
    vertical-align: center;
    border-bottom: 1px solid #ccc;\
    text-align: center;
  }
  </style>
</head>

<body>
  <style>
  .subContent { position: relative; width: 1200px; margin: 0 auto;}
  .subContent.subMain {width:100%;}
  .sub { width:100%;}
  .sub:after {
    display:block; content:""; clear:both;
  }

  .center {
    border:1px solid #ddd;
    width:100%;
    margin-bottom:10px;
    height:600px
  }

  .center-block {
    display: block;
    margin-left: auto;
    margin-right: auto
  }

  .mapsearch {
    width:100%;
    border:#c3c3c3 1px solid;
    display: block;
    position: relative;
    overflow: hidden;
    background: url("images/img_002.png") no-repeat scroll 0 0 transparent;
    background-color:rgba(241, 241, 240, 1); box-sizing:border-box;
  }

  .mapsearch .linkbanners {
    width:440px;
    display: block;
    overflow: hidden;
    float: right;
    margin:80px 20px;
  }

  .mapsearch .linkbanners h2 {
    display: block;
    position: relative;
    overflow: hidden;
    font-size:24px; color:#02ad02;
    font-weight: 700;
    background: url("images/img_001.png") no-repeat scroll 0 -99px transparent;
    padding:0 0 10px 30px;
    min-height:57px;
  }

  .mapsearch .linkbanners .txt_01 {
    width:439px;
    height:376px;
    display: block;
    float: left;
    overflow: hidden;
    background:#fff;
    border:#c3c3c3 1px solid;
  }

  .mapsearch .linkbanners .txt_01 ul li {
    width:200px;
    height:60px;
    background-color:#fff;
    float: left;
    margin:2px 0 0 11px;
    border:#d3d3d3 1px solid;
    font-size: 0;
    line-height: 0;
    text-indent: -9999px;
  }

  .sub_title_wrap {
    text-align:center;
    margin-bottom:25px;
  }
  .sub_title_wrap h2 {
    text-align:center;
    font-size:38px; color:#000;
    margin:0;
    line-height:1;
    font-family: 'Nanum Gothic Bold';
  }
  .sub_title_wrap > span {
    display:block;
    margin-top:25px;
    font-size:16px;
    color:#666;
    line-height:1.5;
  }
  .sub_title_wrap > span.desc_type2 {
    margin-top:10px;
    font-size:14px;
  }
  .alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f
  }
  a{
    text-decoration: none;
    margin: 0px;
    padding: 0px;
    border: 0px;
  }
  .search{
    text-align: center;
  }
  #search{
    text-align:center;
  }

  .search1{
    display:inline-block;zoom:1;.display:inline;
  }
  </style>

  <article class="subContent" id="contList">
    <section class="sub">
      <div class="sub_title_wrap">
        <h2> 공중화장실 안내</h2>
        <div class="alert alert-info" role="alert" id="alert" style="margin-top: 20px;">
          본 사이트에서 제공하는 공중화장실은 공공데이터 포털 개방자료 활용, 자세한 내용 및 원본은 각 지자체 홈페이지를 참고하시기 바랍니다.
        </div>
      </div>

      <div  class="center" id = "viewToilet">
        <div class="mapsearch">
          <!--서울특별시-->
          <a href="?map=01" id="map_btn_01" style="position:absolute; left:162px; top:76px; z-index:99;">
            <img <?= $img_1 ?> id="local_01" name="local_01" alt="서울특별시">
          </a>
          <div id="map_01" class="linkbanners" <?= $display_01 ?>>
            <h2>서울특별시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>
              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=01&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=01&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=01&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--인천-->

          <a href="?map=02" id="map_btn_02" style="position:absolute; left:64px; top:107px; z-index:99;">
            <img <?= $img_2 ?> id="local_02" alt="인천">
          </a>
          <div id="map_02" class="linkbanners" <?= $display_02 ?>>
            <h2>인천광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <?=$toilet_info1?>
                </tbody>
              </table>
              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=02&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=02&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=02&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--경기도-->
          <a href="?map=03" id="map_btn_03"  style="position:absolute; left:153px; top:40px; z-index:98;">
            <img <?= $img_3 ?> id="local_03" alt="경기도">
          </a>
          <div id="map_03" class="linkbanners" <?= $display_03 ?>>
            <h2>경기도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=03&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=03&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=03&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--강원도-->
          <a href="?map=04" id="map_btn_04" style="position:absolute; left:238px; top:5px;">
            <img <?= $img_4 ?> id="local_04" alt="강원도">
          </a>
          <div id="map_04" class="linkbanners" <?= $display_04 ?>>
            <h2>강원도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>
              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=04&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=04&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=04&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--충남-->
          <a href="?map=05" id="map_btn_05"  style="position:absolute; left:134px; top:171px; z-index:98;">
            <img <?= $img_5 ?> id="local_05" alt="충남">
          </a>
          <div id="map_05" class="linkbanners" <?= $display_05 ?>>
            <h2>충청남도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=05&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=05&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=05&age=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--경북-->
          <a href="?map=06" id="map_btn_06" style="position:absolute; left:287px; top:181px; z-index:98;">
            <img <?= $img_6 ?>  id="local_06" alt="경북">
          </a>
          <div id="map_06" class="linkbanners" <?= $display_06 ?>>
            <h2>경상북도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=06&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=06&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=06&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--대전-->
          <a href="?map=07" id="map_btn_07" style="position:absolute; left:192px; top:214px; z-index:99;">
            <img <?= $img_7 ?> id="local_07" alt="대전">
          </a>
          <div id="map_07" class="linkbanners" <?= $display_07 ?>>
            <h2>대전광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=07&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=07&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=07&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--대구-->
          <a href="?map=08" id="map_btn_08" style="position:absolute; left:298px; top:282px; z-index:99;">
            <img <?= $img_8 ?> id="local_08" alt="대구">
          </a>
          <div id="map_08" class="linkbanners" <?= $display_08 ?>>
            <h2>대구광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=08&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=08&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=08&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--전북-->
          <a href="?map=09" id="map_btn_09" style="position:absolute; left:151px; top:275px; z-index:98;">
            <img <?= $img_9 ?> id="local_09" alt="전북">
          </a>
          <div id="map_09" class="linkbanners" <?= $display_09 ?>>
            <h2>전라북도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=09&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=09&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=09&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--울산-->
          <a href="?map=10" id="map_btn_10"style="position:absolute; left:362px; top:332px; z-index:99;">
            <img <?= $img_10 ?> id="local_10" alt="울산">
          </a>
          <div id="map_10" class="linkbanners" <?= $display_10 ?>>
            <h2>울산광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=10&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=10&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=10&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--경남-->
          <a href="?map=11" id="map_btn_11"  style="position:absolute; left:255px; top:310px; z-index:98;">
            <img <?= $img_11 ?> id="local_11" alt="경남">
          </a>
          <div id="map_11" class="linkbanners" <?= $display_11 ?>>
            <h2>경상남도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=11&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=11&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=11&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--부산-->
          <a href="?map=12" id="map_btn_12" style="position:absolute; left:370px; top:385px; z-index:99;">
            <img <?= $img_12 ?> id="local_12" alt="부산">
          </a>
          <div id="map_12" class="linkbanners" <?= $display_12 ?>>
            <h2>부산광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=12&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=12&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=12&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--충북-->
          <a href="?map=13" id="map_btn_13" style="position:absolute; left:240px; top:160px; z-index:98;">
            <img <?= $img_13 ?> id="local_13" alt="충북">
          </a>
          <div id="map_13" class="linkbanners" <?= $display_13 ?>>
            <h2>충청북도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=13&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=13&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=13&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--세종특별시-->
          <a href="?map=14" id="map_btn_14" style="position:absolute; left:56px; top:248px; z-index:99;">
            <img <?= $img_14 ?> id="local_14" alt="세종특별자치시">
          </a>
          <div id="map_14" class="linkbanners" <?= $display_14 ?>>
            <h2>세종특별자치시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=14&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=14&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=14&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--전라남도-->
          <a href="?map=15" id="map_btn_15" style="position:absolute; left:89px; top:349px; z-index:98;">
            <img <?= $img_15 ?> id="local_15" alt="전라남도">
          </a>
          <div id="map_15" class="linkbanners" <?= $display_15 ?>>
            <h2>전라남도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=15&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=15&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=15&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--제주도-->
          <a href="?map=16" id="map_btn_16" style="position:absolute; left:103px; top:495px; z-index:98;">
            <img <?= $img_16 ?> id="local_16" alt="제주특별자치도">
          </a>
          <div id="map_16" class="linkbanners" <?= $display_16 ?>>
            <h2>제주특별자치도</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=16&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=16&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=16&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>

          <!--광주-->
          <a href="?map=17" id="map_btn_17" style="position:absolute; left:130px; top:340px; z-index:99;">
            <img <?= $img_17 ?> id="local_17" alt="광주">
          </a>
          <div id="map_17" class="linkbanners" <?= $display_17 ?>>
            <h2>광주광역시</h2>
            <div class="txt_01">
              <table style="width:100%;">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <tbody>
                  <tr>
                    <?=$toilet_info1?>
                  </tr>
                </tbody>
              </table>

              <div id="mapPage" style="text-align:center;margin:15px 0 0 0;">
                <?php
                if ($page1<= 1) { //만약 page가 1보다 크거나 같다면
                  echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                } else {
                    echo "<a href='?map=17&page1=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                for ($i=$block_start1; $i<=$block_end1; $i++) {
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if ($page1== $i) { //만약 page가 $i와 같다면
                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                  } else {
                      echo "<span style=\"margin-left:5px\"><a href='?map=17&page1=$i'>[$i]</a></span>"; //아니라면 $i
                  }
                }
                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                } else {
                    $next = $page1+ 1; //next변수에 page + 1을 해준다.
                  echo "<a href='?map=17&page1=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
    <br/><br/><br/>
    <div id = "search">
      <div class="search1">
        <form action="index_search.php" method="GET"> 지역 검색
          <select onchange="categoryChange(this)" name="city">
            <option value="Every">전체</option>
            <option value="서울특별시" name ="서울특별시" >서울특별시</option>
            <option value="부산광역시" name ="부산광역시">부산광역시</option>
            <option value="대구광역시" name ="대구광역시">대구광역시</option>
            <option value="인천광역시" name ="인천광역시">인천광역시</option>
            <option value="광주광역시" name ="광주광역시">광주광역시</option>
            <option value="대전광역시"name ="대전광역시">대전광역시</option>
            <option value="울산광역시"name ="울산광역시">울산광역시</option>
            <option value="세종특별자치시"name ="세종특별자치시">세종특별자치시</option>
            <option value="경기도"name ="경기도">경기도</option>
            <option value="강원도"name ="강원도">강원도</option>
            <option value="충청북도"name ="충청북도">충정북도</option>
            <option value="충청남도"name ="충청남도">충청남도</option>
            <option value="전라북도"name ="전라북도">전라북도</option>
            <option value="전라남도"name ="전라남도">전라남도</option>
            <option value="경상북도"name ="경상북도">경상북도</option>
            <option value="경상남도"name ="경상남도">경상남도</option>
            <option value="제주특별자치도"name ="제주특별자치도">제주특별자치도</option>
          </select>
          <select id="area" name="gu">
            <option value="Every">전체</option>
          </select> 장애인용 화장실
          <input type="checkbox" name="disabled" value="disabled">
          <input type="submit" value="검색">
        </form>
      </div>
      <div class="search1" > <a href="index.php"><Button>초기화</Button></a></div>
    </div>
    <div>
      <table class="list-table" align = center>
        <thead>
          <tr>
            <th>구분</th>
            <th>이름</th>
            <th>주소</th>
            <th>남녀공용</th>
            <th>장애인용변기(남)</th>
            <th>장애인용변기(여)</th>
            <th>어린이용변기(남)</th>
            <th>어린이용변기(여)</th>
            <th>개방시간</th>
          </tr>
        </thead>
        <tbody>
          <?= $toilet_info ?>
        </tbody>
      </table>
      <!---페이징 넘버 --->
      <div id="page_num" class="search">
        <?php
        if ($page <= 1) { //만약 page가 1보다 크거나 같다면
          echo "<span class='fo_re'>처음</span>"; //처음이라는 글자에 빨간색 표시
        } else {
            echo "<a href='?page=1'> 처음 </a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
        }
        if ($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값
        } else {
            $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
          echo "<a href='?page=$pre'> 이전 </a>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
        }
        for ($i=$block_start; $i<=$block_end; $i++) {
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
          if ($page == $i) { //만약 page가 $i와 같다면
            echo "<span class='fo_re'>[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
          } else {
              echo "<a href='?page=$i'>[$i]</a>"; //아니라면 $i
          }
        }
        if ($block_num >= $total_block) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
        } else {
            $next = $page + 1; //next변수에 page + 1을 해준다.
          echo "<a href='?page=$next'> 다음 </a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
        }
        if ($page >= $total_page) { //만약 page가 페이지수보다 크거나 같다면
          echo "<span class='fo_re'> 마지막 </span>"; //마지막 글자에 긁은 빨간색을 적용한다.
        } else {
            echo "<a href='?page=$total_page'> 마지막 </a>"; //아니라면 마지막글자에 total_page를 링크한다.
        }
        ?>
      </div>
    </div>
  </div>
</article>
</body>
</html>
<script>
function categoryChange(e) {

  var every = ["전체"];
  var Seoul = ["강남구","강동구","강북구","강서구","관악구","광진구","구로구","금천구","노원구","도봉구","동대문구","동작구","마포구","서대문구","서초구","성동구","성북구","송파구","양천구","영등포","구용산구","은평구","종로구","중구","중랑구"];
  var Busan = ["강서구","금정구","남구","동구","동래구","진구","북구","사상구","사하구","서구","수영구","연제구","영도구","중구","해운대구"];
  var Daegu = ["남구","달서구","동구","북구","서구","수성구","중구"];
  var Incheon = ["계양구","남동구","동구","미추홀구","부평구","서구","연수구","중구","강화군","옹진군"];
  var Gwangju = ["광산구","남구","동구","북구","서구"];
  var Daejeon = ["대덕구","동구","서구","유성구","중구"];
  var Ulsan = ["남구","동구","북구","중구","울주군"];
  var Sejong = ["조치원읍","금남면","부강면","소정면","연기면","연동면","연서면","장군면","전동면","전의면","고운동","다정동","대평동","도담동","보람동","소담동","새롬동","아름동","종촌동","한솔동"];
  var Gyeonggi = ["고양시","과천시","광명시","광주시","구리시","군포시","김포시","남양주시","동두천시","부천시","성남시","수원시","시흥시","안산시","안성시","안양시","양주시","여주시","오산시","용인시","의왕시","의정부시","이천시","파주시","평택시","포천시","하남시","화성시",
  "가평군","양평군","연천군"];
  var Gangwon = ["강릉시","동해시","삼척시","속초시","원주시","춘천시","태백시","고성군","양구군","양양군","영월군","인제군","정선군","철원군","평창군","홍천군","화천군","횡성군"];
  var Chungbuk = ["제천시","청주시","충주시","괴산군","단양군","보은군","영동군","옥천군","음성군","증평군","진천군"];
  var Chungnam = ["계룡시","공주시","논산시","당진시","보령시","서산시","아산시","천안시","금산군","부여군","서천군","예산군","청양군","태안군","홍성군"];
  var Jeonbuk = ["군산시","김제시","남원시","익산시","전주시","정읍시","고창군","무주군","부안군","순창군","완주군","임실군","장수군","진안군"];
  var Jeonnam = ["광양시","나주시","목포시","순천시","여수시","강진군","고흥군","곡성군","구례군","담양군","무안군","보성군","신안군","영광군","영암군","도군장","성군장","흥군진","도군함","평군해","남군화","순군"];
  var GyeongBuk = ["경산시","경주시","구미시","김천시","문경시","상주시","안동시","영주시","영천시","포항시","고령군","군위군","봉화군","성주군","영덕군","영양군","예천군","울릉군","울진군","의성군","청도군","청송군","칠곡군"];
  var Gyeongnam = ["거제시","김해시","밀양시","사천시","양산시","진주시","창원시","통영시","거창군","고성군","남해군","산청군","의령군","창녕군","하동군","함안군","함양군","합천군",];
  var Jeju = ["제주시","서귀포시"];
  var target = document.getElementById("area");

  if(e.value == "서울특별시") var d = Seoul;
  else if(e.value == "부산광역시") var d = Busan;
  else if(e.value == "대구광역시") var d = Daegu;
  else if(e.value == "인천광역시") var d = Incheon;
  else if(e.value == "광주광역시") var d = Gwangju;
  else if(e.value == "대전광역시") var d = Daejeon;
  else if(e.value == "울산광역시") var d = Ulsan;
  else if(e.value == "세종특별자치시") var d = Sejong;
  else if(e.value == "경기도") var d = Gyeonggi;
  else if(e.value == "강원도") var d = Gangwon;
  else if(e.value == "충청북도") var d = Chungbuk;
  else if(e.value == "충청남도") var d = Chungnam;
  else if(e.value == "전라북도") var d = Jeonbuk;
  else if(e.value == "전라남도") var d = Jeonnam;
  else if(e.value == "경상북도") var d = GyeongBuk;
  else if(e.value == "경상남도") var d = Gyeongnam;
  else if(e.value == "제주특별자치도") var d = Jeju;
  else if(e.value == "Every") var d = every;

  target.options.length = 0;

  for (x in d) {
    var opt = document.createElement("option");
    opt.value = d[x];
    // opt.name = d[x];
    opt.innerHTML = d[x];
    target.appendChild(opt);
  }
}
</script>
