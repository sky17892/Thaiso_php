<?php
/**
 * @file    /adm/eyoom_admin/core/shop/couponlist.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400800";

$action_url1 = G5_ADMIN_URL . '/?dir=shop&amp;pid=couponlist_delete&amp;smode=1';

auth_check_menu($auth, $sub_menu, "r");

$sql_common = " from {$g5['g5_shop_coupon_table']} ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "cp_no";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$k = 0;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    switch($row['cp_method']) {
        case '0':
            $row3 = get_shop_item($row['cp_target'], true);
            $cp_method = '개별상품할인';
            $cp_target = get_text($row3['it_name']);
            break;
        case '1':
            $sql3 = " select ca_name from {$g5['g5_shop_category_table']} where ca_id = '{$row['cp_target']}' ";
            $row3 = sql_fetch($sql3);
            $cp_method = '카테고리할인';
            $cp_target = get_text($row3['ca_name']);
            break;
        case '2':
            $cp_method = '주문금액할인';
            $cp_target = '주문금액';
            break;
        case '3':
            $cp_method = '배송비할인';
            $cp_target = '배송비';
            break;
    }

    // 쿠폰사용회수
    $sql = " select count(*) as cnt from {$g5['g5_shop_coupon_log_table']} where cp_id = '{$row['cp_id']}' ";
    $tmp = sql_fetch($sql);
    $used_count = $tmp['cnt'];

    $list[$i] = $row;

    $list[$i]['cp_method'] = $cp_method;
    $list[$i]['cp_target'] = $cp_target;
    $list[$i]['used_count'] = $used_count;

    $list_num = $total_count - ($page - 1) * $rows;
    $list[$i]['num'] = $list_num - $k;
    $k++;
}

/**
 * 페이징
 */
$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';
$frm_submit .= ' <input type="submit" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;
$frm_submit .= '</div>';