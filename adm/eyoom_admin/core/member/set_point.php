<?php
/*
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
CREATE TABLE g5_monthly_point_settlement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    month TINYINT NOT NULL,
    settlement_date DATETIME DEFAULT NULL,
    is_settled BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/

// 기간검색이 있다면
//echo "f1:" . $fr_date . "</br>";
if(!$fr_date) $fr_date = G5_TIME_YMD;
//echo "f2:" . $fr_date . "</br>";
//if(!$to_date) $to_date = G5_TIME_YM;
$dyear = substr($fr_date,0,4);
$dmonth = substr($fr_date,5,2);
$dday = substr($fr_date,8,2);

$sub_menu = "200130";

$action_url1 = G5_ADMIN_URL . '/?dir=member&amp;pid=point_list_delete&amp;smode=1';
$action_url2 = G5_ADMIN_URL . '/?dir=member&amp;pid=point_update&amp;smode=1';

auth_check_menu($auth, $sub_menu, 'r');

$sql_common = " from {$g5['point_table']} po";

$sql_search = " where (po.po_rel_table = '@bonus' and po_content='".$fr_date."') ";

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id':
            $sql_search .= " (po.{$sfl} = '{$stx}') ";
            break;
        default:
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

//if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
//if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

if ($fr_date && $to_date) {
    $sql_search .= " and po_datetime between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
    $qstr .= "&amp;fr_date={$fr_date}&amp;to_date={$to_date}";
}

$po_type = clean_xss_tags($_GET['po_type']);
if (!$po_type || $po_type == 'all') {
    $po_type = 'all';
    $po_type_all = 'checked';
} else {
    if ($po_type == 'in') {
        $po_type_in = 'checked';
        $sql_search .= " and po_point > '0' ";
    } else if ($po_type == 'out') {
        $po_type_out = 'checked';
        $sql_search .= " and po_point < '0' ";
    }
    $qstr .= "&amp;po_type={$po_type}";
}

if (!$sst) {
    $sst  = "po_id";
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
if ($page < 1) {
    $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
}
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select po.*, mb.mb_name, mb.mb_nick, mb.mb_email, mb.mb_homepage, mb.mb_point
            {$sql_common}
            LEFT JOIN {$g5['member_table']} mb ON po.mb_id = mb.mb_id 
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$mb = array();
if ($sfl == 'mb_id' && $stx) {
    $mb = get_member($stx);
}

$po_expire_term = '';
if ($config['cf_point_term'] > 0) {
    $po_expire_term = $config['cf_point_term'];
}

if (strstr($sfl, "mb_id")) {
    $mb_id = $stx;
} else {
    $mb_id = "";
}

if (!(isset($mb['mb_id']) && $mb['mb_id'])) {
    $row2 = sql_fetch(" select sum(po_point) as sum_point from {$g5['point_table']} ");
    $sum_point = $row2['sum_point'];
}

		if($settleMode == 'R') { // 작업 필요 po_rel_table = '@bonus'  insert point 시 po_settle_date 자동처리 // 주문테이블 업데이트 
			//기존 정산내역 삭제 월단위
			$sql = "delete from g5_point where po_rel_table = '@bonus' and po_settle_date = '$fr_date'";
			sql_query($sql);
			
			$sql = "delete from g5_monthly_point_settlement where settle_date = '$fr_date'";
			sql_query($sql);
		}
	//-------------------------------------------------------------------------------  전체 총판 회원 돌면서 다시 정산

	if($settleMode == 'R' || $settleMode == 'X') {
		$chk_date = date('Y-m-d', strtotime('-20 days', strtotime($fr_date)));
		$sqlq = " select * from {$g5['member_table']} where mb_level2 > '0' ";
		$resultq = sql_query($sqlq);
//echo $sqlq."</br>";
		for ($q=0; $rowq=sql_fetch_array($resultq); $q++) {
			// 1. 재정산 시 기존 정산삭제 > 새로운정산 등록 > 해당 총판회원 밸런스 업데이트
			$ds = get_member($rowq['mb_id']);
			$v = intval($ds['mb_level2']);
			$brate = $config['cf_settle_point'.$v];

			//2. 하위회원 목록 돌면서 포인트 등록
			$sqlj = " select * from {$g5['member_table']} where mb_recommend = '".$rowq['mb_id']."'";
			$resultj = sql_query($sqlj);
//echo $sqlj."</br>";
			for ($j=0; $rowj=sql_fetch_array($resultj); $j++) {
				//해당 회원의 매출건 체크  정산일 기준 - 20일
				$sqlx = "select SUM(od_receipt_price) as sum from {$g5['g5_shop_order_table']} where mb_id='".$rowj['mb_id']."' and od_receipt_time like '".$chk_date."%'";
				$od = sql_fetch($sqlx);
				$od_amount = $od['sum'];
//echo $sqlx."</br>";
				if($od_amount > 0) {
					$bonus_point = intval($od_amount * ($brate / 100));
					$po_content = $fr_date; //정산기준일
			//echo ($rowq['mb_id'].",".$bonus_point.",". $po_content.",". '@bonus'.",". $rowq['mb_id'].",". $rowj['mb_id'].",". $expire."</br>");   
			insert_point($rowq['mb_id'], $bonus_point, $po_content, '@bonus', $rowq['mb_id'], $rowj['mb_id'], $expire);   
//echo $sqlx."</br>";
				}
	//**************  일 단위 정산이 필요할 수 도... 사람마다 주문 날짜가 다 다른데
				//해당 매출건 
			}


			//3. 해당 총판회원 합산 포인트 업데이트
		}
	}

$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ($i==0 || ($row2['mb_id'] != $row['mb_id'])) {
        $sql2 = " select mb_id, mb_name, mb_nick, mb_email, mb_homepage, mb_point from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
        $row2 = sql_fetch($sql2);
    }

    $mb_nick = get_sideview($row['mb_id'], $row2['mb_nick'], $row2['mb_email'], $row2['mb_homepage']);

    $link1 = $link2 = '';
    if (!preg_match("/^\@/", $row['po_rel_table']) && $row['po_rel_table']) {
        $link1 = '<a href="'.get_eyoom_pretty_url($row['po_rel_table'], $row['po_rel_id']).'" target="_blank">';
        $link2 = '</a>';
    }

    $expr = '';
    if ($row['po_expired'] == 1) {
        $expr = ' txt_expired';
    }

    $list[$i] = $row;
    $list[$i]['mb_name'] = $row2['mb_name'];
    $list[$i]['mb_nick'] = $row2['mb_nick'];

    if (!preg_match("/^\@/", $row['po_rel_table']) && $row['po_rel_table']) {
        $list[$i]['link'] = true;
    }

    if ($row['po_expired'] == 1) {
        $list[$i]['expire_date'] = substr(str_replace('-', '', $row['po_expire_date']), 2);
    } else {
        $list[$i]['expire_date'] = $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date'];
    }


}

/**
 * 페이징
 */
$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */

/**
 * 정산처리
 */
$btn_submit = ' <input type="submit" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;

$bonus_day = $dyear ."년 ". $dmonth . "월 ". $dday . "일";
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';




// -------------------------------   선택된 날짜가 없다면 오늘 날짜를 기본값으로 설정
$date = $fr_date;
$timestamp = strtotime($date);
$today = date('Y-m-d');

// 한글 요일 배열
$days_korean = ['월', '화', '수', '목', '금', '토', '일'];

// 해당 주의 월요일 날짜 계산
$monday = strtotime('last monday', $timestamp + 86400);
if (date('N', $timestamp) == 1) { // 만약 선택한 날짜가 월요일이라면
    $monday = $timestamp;
}

// 이전/다음 주의 날짜 계산
$prev_week = date('Y-m-d', strtotime('-1 week', $monday));
$next_week = date('Y-m-d', strtotime('+1 week', $monday));

// 월요일부터 일요일까지 7일 배열 생성
$week_dates = [];
for ($i = 0; $i < 7; $i++) {
    $current_day = strtotime("+$i day", $monday);
    $day_date = date('Y-m-d', $current_day);
    $day_name_korean = $days_korean[$i]; // 한글 요일
    $week_dates[] = ['date' => $day_date, 'day_name' => $day_name_korean];
}

// HTML 출력
//$frm_submit .=  '<div style="display: flex; align-items: center; gap: 10px;">';
$frm_submit .=  "<button type='button' class='btn-e btn-e-xs btn-e-gray' onClick=\"go('$prev_week');\">이전 주</button>";

//$frm_submit .=  '<ul style="list-style-type: none; padding: 0; display: flex; gap: 10px;">';
foreach ($week_dates as $day_info) {
    $day_date = $day_info['date'];
    $day_name_korean = $day_info['day_name'];

    // 오늘 이후 날짜는 클릭할 수 없도록 설정

	if ($day_date > $today) {
		$frm_submit .=  " <button type='button' class='btn-e btn-e-xs btn-e-light-gray'>".substr($day_date,5,5)."($day_name_korean)</button>";
	} else {

		//echo("select * from g5_monthly_point_settlement where year='$dyear' and month = '$dmonth' and is_settled = TRUE");
		$chk = sql_fetch("select * from g5_monthly_point_settlement where settle_date = '$day_date' and is_settled = TRUE");

		if($day_date == $fr_date) {
			if($chk['id']) {
				$frm_submit .= ' <input type="button" onClick="goSettleR();" style="font-weight:bold;" value="' . $day_date . ' 정산 재실행" class="btn-e btn-e-md btn-e-blue" accesskey="s">' ;
			} else {
				$frm_submit .= ' <input type="button" onClick="goSettle();" style="font-weight:bold;" value="' . $day_date . ' 정산 실행" class="btn-e btn-e-md btn-e-blue" accesskey="s">' ;
			}
		} else {
			if($chk['id']) {
				$frm_submit .= ' <input type="button" onClick="go(\''.$day_date.'\');" value="' . substr($day_date,5,5) . '('.$day_name_korean.') 정산완료" class="btn-e btn-e-xs btn-e-green" accesskey="s">' ;
			} else {
				$frm_submit .= ' <input type="button" onClick="go(\''.$day_date.'\');" value="' . substr($day_date,5,5) . '('.$day_name_korean.') 미정산" class="btn-e btn-e-xs btn-e-deep-purple" accesskey="s">' ;
			}
		}

		// 선택된 날짜 스타일 적용
		//$style = ($day_date == $date) ? 'font-weight: bold; color: blue;' : '';
		//$frm_submit .=  "<button type='button' class='btn-e btn-e-xs btn-e-green' onClick=\"go('$day_date');\" style='$style'>".substr($day_date,5,5)."($day_name_korean)</button>";
	}
	
	
}
//$frm_submit .=  '</ul>';

$frm_submit .=  " <button type='button' class='btn-e btn-e-xs btn-e-gray' onClick=\"go('".$next_week."');\">다음 주</button>";
//$frm_submit .=  '</div>';

$frm_submit .= '</div>';

// 일정산완료 처리
if($settleMode == 'R' || $settleMode == 'X') {
	$chk = sql_fetch("select * from g5_monthly_point_settlement where settle_date = '$fr_date' and is_settled = TRUE");
	if(!$chk['id']) {
		$sql = "INSERT INTO g5_monthly_point_settlement set settle_date = '$fr_date'";
		$sql .= ", settlement_date = '" . G5_TIME_YMDHIS . "'";
		$sql .= ", is_settled = TRUE";
		$sql .= ", created_at = '" . G5_TIME_YMDHIS . "'";

		sql_query($sql);
		//echo($sql);
	}
}