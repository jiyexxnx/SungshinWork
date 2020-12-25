<?php

$link = mysqli_connect('localhost', 'root', 'rootroot', 'final');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$q1 = "SELECT isPublic from toilet";
$res1 = mysqli_query($link, $q1);
// print_r($res1);
$row1 = mysqli_num_rows($res1); //게시판 총 레코드 수
$list1 = 14; //한 페이지에 보여줄 개수
$block_cnt = 5; //블록당 보여줄 페이지 개수

$page_num1 = ceil($row1/$list1); //총 페이지
$block_num1 = ceil($page_num1/$block_cnt); //총 블럭
$nowBlock1 = ceil($page/$block_cnt); //현재 페이지가 위차한 블록 번호

$block_num1 = ceil($page/$block_cnt); // 현재 페이지 블록 구하기
$block_start1 = (($block_num1 - 1) * $block_cnt) + 1; // 블록의 시작번호
$block_end1 = $block_start1 + $block_cnt - 1; //블록 마지막 번호

$total_page1 = ceil($row1 / $list1); // 페이징한 페이지 수 구하기
if ($block_end1 > $total_page1) {
    $block_end1 = $total_page1;
} //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
$total_block1 = ceil($total_page1/$block_cnt); //블럭 총 개수
$start_num1= ($page-1) * $list1; //시작번호 (page-1)에서 $list1를 곱한다.

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
$res2 = mysqli_query($link, $q2) or die(mysqli_error($link));
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
<meta charset="utf-8">
<html>

    <head>
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
              /*  background: url("images/img_001.png") no-repeat scroll 0 -99px transparent;*/
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
                    margin: 0px;
                    padding: 0px;
                    border: 0px;
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
                              if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                                echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                              } else {
                                  echo "<a href='?map=01&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                              }
                              for ($i=$block_start1; $i<=$block_end1; $i++) {
                                  //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                              if ($page == $i) { //만약 page가 $i와 같다면
                                echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                              } else {
                                  echo "<span style=\"margin-left:5px\"><a href='?map=01&page=$i'>[$i]</a></span>"; //아니라면 $i
                              }
                              }
                            if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                            } else {
                                $next = $page + 1; //next변수에 page + 1을 해준다.
                              echo "<a href='?map=01&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                                  if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                                    echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                                  } else {
                                      echo "<a href='?map=02&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                                  }
                                  for ($i=$block_start1; $i<=$block_end1; $i++) {
                                      //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                                  if ($page == $i) { //만약 page가 $i와 같다면
                                    echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                                  } else {
                                      echo "<span style=\"margin-left:5px\"><a href='?map=02&page=$i'>[$i]</a></span>"; //아니라면 $i
                                  }
                                  }
                                if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                                } else {
                                    $next = $page + 1; //next변수에 page + 1을 해준다.
                                  echo "<a href='?map=02&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=03&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=03&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=03&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=04&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=04&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=04&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=05&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=05&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=06&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=06&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=06&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=07&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=07&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=07&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=08&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=08&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=08&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=09&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=09&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=09&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=10&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=10&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=10&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=11&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=11&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=11&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=12&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=12&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=12&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=13&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=13&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=13&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=14&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=14&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=14&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=15&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=15&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=15&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=16&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=16&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=16&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
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
                            if ($page <= 1) { //만약 page가 1보다 크거나 같다면
                              echo "<span class='fo_re' style=\"margin-left:5px\">처음</span>"; //처음이라는 글자에 빨간색 표시
                            } else {
                                echo "<a href='?map=17&page=1'>처음</a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                            }
                            for ($i=$block_start1; $i<=$block_end1; $i++) {
                                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if ($page == $i) { //만약 page가 $i와 같다면
                              echo "<span style=\"margin-left:5px\">[$i]</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            } else {
                                echo "<span style=\"margin-left:5px\"><a href='?map=17&page=$i'>[$i]</a></span>"; //아니라면 $i
                            }
                            }
                          if ($block_num1 >= $total_block1) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                          } else {
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<a href='?map=17&page=$next'> 다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                          }
                        ?>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
