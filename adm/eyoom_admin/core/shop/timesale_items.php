<?php
/**
 * @file    /adm/eyoom_admin/core/member/member_list.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "200100";

$action_url1 = G5_ADMIN_URL . '/?dir=shop&amp;pid=member_list_update&amp;smode=1';

auth_check_menu($auth, $sub_menu, 'r');

if ($wmode) {
    $qstr .= "&amp;wmode=1";
}

$sql_common = " from g5_shop_item as a "; 

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


// 기간검색이 있다면
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

if ($sdt == 'mb_datetime') {
    $sdt_target = 'mb_datetime';
} else if ($sdt == 'mb_today_login') {
    $sdt_target = 'mb_today_login';
}

if ($hope_car_name) {
    $sql_search .= " and car_name like '%{$hope_car_name}%' ";
    $qstr .= "&amp;hope_car_name={$hope_car_name}";
}

if ($sdt_target && $fr_date && $to_date) {
    $sql_search .= " and $sdt_target between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
    $qstr .= "&amp;sdt={$sdt_target}&amp;fr_date={$fr_date}&amp;to_date={$to_date}";
}

// 최고관리자가 아니라면 자신 레벨보다 낮은 레벨의 회원만 출력
if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "it_name";
    $sod = "asc";
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
//echo($sql);
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $list[$i] = $row;
    $list[$i]['bg'] = 'bg'.($i%2);

	$chk = sql_fetch("select * from g5_timeattack_items where it_id = '" . $row['it_id'] . "' and ts_id = '" . $ts_id . "' ");
	if($chk['it_id']) 
		$list[$i]['btn_add_timesale'] = "<a href='javascript:;' onClick=alert('이미 추가됨!'); class='btn-e btn-e-red btn-e-xs'>추가된상품</a>";
	else
		$list[$i]['btn_add_timesale'] = "<a href='javascript:;' onClick=add_ts('".$row['it_id']."','".$ts_id."'); class='btn-e btn-e-blue btn-e-xs'>선택</a>";
	
    $list[$i]['image'] = str_replace("\"","'",get_it_image($row['it_id'], 160, 160));
    $list[$i]['it_name'] = preg_replace('/\r\n|\r|\n/', '', $row['it_name']);



    $list_num = $total_count - ($page - 1) * $rows;
    $list[$i]['num'] = $list_num - $k;
    $k++;
}

/**
 * 페이징
 */
$qstr .= "&ts_id=$ts_id";
$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';
$frm_submit .= ' <input type="submit" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;
$frm_submit .= '</div>';
