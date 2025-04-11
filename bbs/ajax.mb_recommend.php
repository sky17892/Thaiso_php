<?php
include_once("./_common.php");
include_once(G5_LIB_PATH."/register.lib.php");

$mb_recommend = isset($_POST["reg_mb_recommend"]) ? trim($_POST["reg_mb_recommend"]) : '';
$mb = sql_fetch( " SELECT * from {$g5['member_table']} where mb_id = '{$mb_recommend}' ");

if ($msg = valid_mb_id($mb_recommend)) {
    die("추천코드는 영문자, 숫자, _ 만 입력하세요.");
}
/*
if (!($msg = exist_mb_code($mb_recommend))) {
    die("입력하신 코드는 존재하지 않는 추천코드 입니다.");
}
*/
    $sql = " select count(*) as cnt from `{$g5['member_table']}` where mb_id = '$mb_recommend' ";
    $row = sql_fetch($sql);
    if (!$row['cnt'])
		die("입력하신 코드는 존재하지 않는 추천코드 입니다.");
