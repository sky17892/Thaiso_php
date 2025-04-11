<?php
/**
 * @file    /adm/eyoom_admin/core/config/config_form_update.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$ts_title          = isset($_POST['ts_title']) ? trim($_POST['ts_title']) : '';
$ts_start          = isset($_POST['ts_start']) ? trim($_POST['ts_start']).":00" : '';
$ts_end          = isset($_POST['ts_end']) ? trim($_POST['ts_end']).":00" : '';
$ts_memo          = isset($_POST['ts_memo']) ? trim($_POST['ts_memo']) : '';
$use_yn          = isset($_POST['use_yn']) ? trim($_POST['use_yn']) : '';
$idx          = isset($_POST['idx']) ? trim($_POST['idx']) : '';

$sql_common = "  ts_title = '{$ts_title}',
                 ts_start = '{$ts_start}',
                 ts_end = '{$ts_end}',
                 ts_memo = '{$ts_memo}',
                 use_yn = '{$use_yn}'";

if ($w == '') {
    sql_query(" insert into g5_timeattack set reg_datetime = '" . G5_TIME_YMDHIS . "', {$sql_common} ");
    //echo(" insert into g5_timeattack set reg_datetime = '" . G5_TIME_YMDHIS . "', {$sql_common} ");
} elseif ($w == 'u') {

    $sql = " update g5_timeattack
                set {$sql_common}
                where idx = '{$idx}' ";
    sql_query($sql);

} elseif ($w == 'd') {

    $sql = " delete from g5_timeattack where idx = '{$_GET['idx']}' ";
    sql_query($sql);


} elseif ($w == 'ac') {
	$chk = sql_fetch("select * from g5_timeattack_items where it_id = '" . $_GET['it_id'] . "' and ts_id = '" . $_GET['ts_id'] . "' ");
	if($chk['it_id']) {
		echo "<script>alert('이미 등록된 상품입니다.');location.href='".G5_ADMIN_URL."/?dir=shop&pid=timesale_list&wmode=1&w=u&ts_id=".$_GET['ts_id']."';</script>";
		exit;	
	} else {
		sql_query(" insert into g5_timeattack_items set it_id = '" . $_GET['it_id'] . "', ts_id = '" . $_GET['ts_id'] . "' ");
		//=G5_URL./adm/?dir=shop&pid=timesale_list&wmode=1
		goto_url(G5_ADMIN_URL . '/?dir=shop&amp;pid=timesale_list&wmode=1&amp;'.$qstr.'&amp;w=u&amp;ts_id='.$_GET['ts_id'], false);
	}
} elseif ($w == 'dc') {
    sql_query(" delete from g5_timeattack_items where it_id = '" . $_GET['it_id'] . "' ");
	//=G5_URL./adm/?dir=shop&pid=timesale_list&wmode=1
	goto_url(G5_ADMIN_URL . '/?dir=shop&amp;pid=timesale_list&wmode=1&amp;'.$qstr.'&amp;w=u&amp;ts_id='.$_GET['idx'], false);
} else {
    alert('제대로 된 값이 넘어오지 않았습니다.');
}


$lev = clean_xss_tags(trim($_POST['lev']));
$cert = clean_xss_tags(trim($_POST['cert']));
$open = clean_xss_tags(trim($_POST['open']));
$adt = clean_xss_tags(trim($_POST['adt']));
$mail = clean_xss_tags(trim($_POST['mail']));
$sms = clean_xss_tags(trim($_POST['sms']));
$sdt = clean_xss_tags(trim($_POST['sdt']));
$fr_date = trim($_POST['fr_date']);
$to_date = trim($_POST['to_date']);
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

$qstr .= $wmode ? '&amp;wmode=1': '';
$qstr .= $lev ? '&amp;lev='.$lev: '';
$qstr .= $cert ? '&amp;cert='.$cert: '';
$qstr .= $open ? '&amp;open='.$open: '';
$qstr .= $adt ? '&amp;adt='.$adt: '';
$qstr .= $mail ? '&amp;mail='.$mail: '';
$qstr .= $sms ? '&amp;sms='.$sms: '';
$qstr .= $sdt ? '&amp;sdt='.$sdt: '';
$qstr .= $fr_date ? '&amp;fr_date='.$fr_date: '';
$qstr .= $to_date ? '&amp;to_date='.$to_date: '';


goto_url(G5_ADMIN_URL . '/?dir=shop&amp;pid=timesale&amp;'.$qstr.'&amp;w=u&amp;idx='.$idx, false);