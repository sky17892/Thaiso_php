<?php
/**
 * @file    /adm/eyoom_admin/core/config/config_form.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "100100";

/**
 * 폼 action URL
 */
$action_url1 = G5_ADMIN_URL . "/?dir=shop&pid=timesale_update&smode=1";

if($_GET['w'] == 'u') {
	$ts = sql_fetch("select * from g5_timeattack where idx = '$idx'");
}

/**
 * 버튼
 */
$frm_submit_fixed = ' <input type="submit" value="확인" class="admin-fixed-submit-btn btn-e btn-e-red" accesskey="s">' ;

$frm_submit  = ' <div class="text-center margin-top-30 margin-bottom-30"> ';
$frm_submit .= ' <input type="submit" value="확인" class="btn-e btn-e-lg btn-e-red" accesskey="s">' ;
$frm_submit .= ' <a href="' . G5_URL . '" class="btn-e btn-e-lg btn-e-dark">메인으로</a> ';
$frm_submit .= '</div>';