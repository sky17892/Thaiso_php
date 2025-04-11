<?
include_once("./_common.php");
//http://test.kr/j_user.php?code=test
$chuid = "$code";
if ($chuid){
	$mb_code = trim($chuid);
	$mb = sql_fetch( " SELECT * from {$g5['member_table']} where mb_id = '{$mb_code}' ");

   if (!$mb['mb_id']){ // php 7,X 때문에 변수에 ' 넣으셔야 문제가 없습니다.
       alert("ไม่มีโค้ดแนะนำครับ.", G5_URL."/bbs/register.php");
    }

	set_cookie('Cook_chu_id', $chuid, 86400);
	alert("$chuid แนะนำเป็นไอดีนะครับ.", G5_URL."/bbs/register.php");
} else {
	alert("ไม่มีโค้ดแนะนำครับ.\\n\\n".G5_URL."/j_user.php?code=추천코드\\n\\n위의 형식이어야 추천인 혜택이 있습니다.", G5_URL."/bbs/register.php");
}
