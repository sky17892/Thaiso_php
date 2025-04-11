<?php
//    error_reporting(E_ALL);
//    ini_set('display_errors', '1');
/**
 * core file : /eyoom/core/shop/list.php
 */
if (!defined('_EYOOM_')) exit;
include_once(G5_PATH.'/lib/timeattack.lib.php'); 

// 상품 리스트에서 다른 필드로 정렬을 하려면 아래의 배열 코드에서 해당 필드를 추가하세요.
if( isset($sort) && ! in_array($sort, array('it_name', 'it_sum_qty', 'it_price', 'it_use_avg', 'it_use_cnt', 'it_update_time')) ){
    $sort='';
}

/**
 * 타이틀
 */
$g5['title'] = '타임어택 상품리스트';
include_once(G5_SHOP_PATH.'/_head.php');

/**
 * 스킨 경로
 */
$skin_dir = EYOOM_CORE_PATH.'/'. G5_SHOP_DIR;

/**
 * 네비게이션 스킨
 */
$nav_skin = $skin_dir.'/navigation.skin.php';
if(!is_file($nav_skin)) $nav_skin = G5_SHOP_SKIN_PATH.'/navigation.skin.php';


$ts = sql_fetch("select * from g5_timeattack where ts_end >= '".G5_TIME_YMDHIS."' and ts_start <= '".G5_TIME_YMDHIS."' ");

if($ts['idx']) {
	$sql_common = " from g5_timeattack_items a left join g5_shop_item b on a.it_id = b.it_id";
	$sql_search = " where (a.ts_id = '".$ts['idx']."') ";

	if (!$sst) {
		$sst = "b.it_time";
		$sod = "desc";
	}

	$sql_order = " order by {$sst} {$sod} ";

	$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
	$row = sql_fetch($sql);
	$total_count = $row['cnt'];

	$rows = 32; //$config['cf_page_rows']; select a.* from g5_timeattack_cars a left join g5_shop_item b on a.car_id = b.idx where (b.ts_id = '1') order by a.reg_datetime desc limit 0, 32
	$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
	if ($page < 1) {
		$page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
	}
	$from_record = ($page - 1) * $rows; // 시작 열을 구함

	$sql = " select b.* {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
	//$result = sql_query($sql);
	//echo($sql);


	/**
	 * 리스트 스킨
	 */
	$skin_file = $skin_dir.'/list.10.skin.php';

	if (file_exists($skin_file)) {
		/**
		 * 정렬 스킨
		 */
		$sort_skin = $skin_dir.'/list.sort.skin.php';
		if(!is_file($sort_skin)) $sort_skin = G5_SHOP_SKIN_PATH.'/list.sort.skin.php';

		/**
		 * 상품보기 타입 변경
		 */
		$sub_skin = $skin_dir.'/list.sub.skin.php';
		if(!is_file($sub_skin)) $sub_skin = G5_SHOP_SKIN_PATH.'/list.sub.skin.php';

		/**
		 * 총몇개 = 한줄에 몇개 * 몇줄
		 */
		$items = 5 * 20;

		/**
		 * 페이지가 없으면 첫 페이지 (1 페이지)
		 */
		if ($page < 1) $page = 1;

		/**
		 * 시작 레코드 구함
		 */
		$from_record = ($page - 1) * $items;

		/**
		 * 상품 리스트 정보
		 */
		$list = new timeattack($skin_file, $ca['ca_list_mod'], $ca['ca_list_row'], $ca['ca_img_width'], $ca['ca_img_height']);
		$list->set_query($sql);
		$list->set_type(1);
		$list->set_category('10', 1);
		$list->set_category($ca['ca_id'], 2);
		$list->set_category($ca['ca_id'], 3);
		$list->set_is_page(true);
		$list->set_order_by($order_by);
		$list->set_from_record($from_record);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		$item_list = $list->run();

		/**
		 * where 된 전체 상품수
		 */
		$total_count = $list->total_count;

		/**
		 * 전체 페이지 계산
		 */
		$total_page  = ceil($total_count / $items);
	}

	/**
	 * 페이징
	 */
	//$qstr1 .= 'ca_id='.$ca_id;
	$qstr1 .='&amp;sort='.$sort.'&amp;sortodr='.$sortodr;
	$paging = $eb->set_paging('timeattack', $ca_id, $qstr1);
}

/**
 * 이윰 테마파일 출력
 */
include_once(EYOOM_THEME_SHOP_SKIN_PATH.'/timeattack.skin.html.php');

/**
 * 하단 디자인 출력
 */
if ($ca['ca_include_tail'] && is_include_path_check($ca['ca_include_tail']))
    @include_once($ca['ca_include_tail']);
else
    include_once(G5_SHOP_PATH.'/_tail.php');

echo "\n<!-- {$ca['ca_skin']} -->\n";
