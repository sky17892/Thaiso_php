<?php
/**
 * @file    /adm/eyoom_admin/core/member/member_list.php
 * idx	ts_title	ts_start	ts_end	ts_memo	use_yn
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "200100";

$action_url1 = G5_ADMIN_URL . '/?dir=shop&amp;pid=timeattack_list_update&amp;smode=1';

auth_check_menu($auth, $sub_menu, 'r');

if ($wmode) {
    $qstr .= "&amp;wmode=1";
}

$sql_common = " from g5_timeattack as a "; 

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_point':
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'mb_level':
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'mb_tel':
        case 'mb_hp':
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default:
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

// 회원레벨 검색
$lev = isset($_GET['lev']) ? (int) $_GET['lev']: '';
if ($lev) {
    $sql_search .= " and mb_level = '{$lev}' ";
    $qstr .= "&amp;lev={$lev}";
}

// 기간검색이 있다면
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

if ($sdt == 'mb_datetime') {
    $sdt_target = 'mb_datetime';
} else if ($sdt == 'mb_today_login') {
    $sdt_target = 'mb_today_login';
}

if ($sdt_target && $fr_date && $to_date) {
    $sql_search .= " and $sdt_target between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
    $qstr .= "&amp;sdt={$sdt_target}&amp;fr_date={$fr_date}&amp;to_date={$to_date}";
}

// 최고관리자가 아니라면 자신 레벨보다 낮은 레벨의 회원만 출력
if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "ts_end";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) {
    $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
}
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);


/*
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {


    $list[$i] = $row;

    $list[$i]['bg'] = 'bg'.($i%2);

	$list[$i]['car_display'] = "";
	if($row['is_rent'] == 'Y') $list[$i]['car_display'] .= '렌트';
	if($row['is_lease'] == 'Y') $list[$i]['car_display'] .= '리스';
	if($row['is_promotion'] == 'Y') $list[$i]['car_display'] .= '프로모션';
	if($row['is_main_best'] == 'Y') {
		$list[$i]['car_display'] .= '메인-베스트';
		if( $_GET['is_main_best'] != '' ){
			$list[$i]['car_display'] .= '['.$row['main_best_sort'].']';
		}
	}

	//  /data/list/car_img_171_2020121113540
	$img = G5_DATA_URL . "/thumb/100x100@" . str_replace("/data/list/","",$row['car_img']);
	$list[$i]['car_image'] = "<img src='".$img."'>";

	$list[$i]['car_brand'] = "<img src='".G5_URL."/".$row['car_company_logo']."' style='width:40px;'><br/>".$row['car_company']; 

	$list[$i]['car_rent_info'] = nl2br($list[$i]['car_rent_info']);
	$list[$i]['car_rent_info'] = preg_replace('/\r\n|\r|\n/','',$list[$i]['car_rent_info']);


    $list_num = $total_count - ($page - 1) * $rows;
    $list[$i]['num'] = $list_num - $k;
    $k++;
}
*/

/**
 * 페이징
 */
//$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';
$frm_submit .= ' <input type="submit" id="btn_add" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;
$frm_submit .= '</div>';
