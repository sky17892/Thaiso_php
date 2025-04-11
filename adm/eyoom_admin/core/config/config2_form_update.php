<?php
/**
 * @file    /adm/eyoom_admin/core/config/config_form_update.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "100100";

check_demo();

auth_check_menu($auth, $sub_menu, 'w');

if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}

check_admin_token();

$sql = " update {$g5['config_table']}
            set cf_settle_point1 = '{$_POST['cf_settle_point1']}',
                cf_settle_point2 = '{$_POST['cf_settle_point2']}',
                cf_settle_point3 = '{$_POST['cf_settle_point3']}',
                cf_settle_point4 = '{$_POST['cf_settle_point4']}',
                cf_settle_point5 = '{$_POST['cf_settle_point5']}',
                cf_settle_point6 = '{$_POST['cf_settle_point6']}',
                cf_settle_point7 = '{$_POST['cf_settle_point7']}',
                cf_settle_point8 = '{$_POST['cf_settle_point8']}',
                cf_settle_point9 = '{$_POST['cf_settle_point9']}',
                cf_settle_point10 = '{$_POST['cf_settle_point10']}' ";
sql_query($sql);
//echo($sql);

//sql_query(" OPTIMIZE TABLE `$g5[config_table]` ");

if( isset($_POST['cf_bbs_rewrite']) ){
    g5_delete_all_cache();
}

run_event('admin_config_form_update');

update_eyoom_rewrite_rules();

alert('설정정보를 정상적으로 적용하였습니다.', G5_ADMIN_URL . '/?dir=config&amp;pid=config_form2', false);