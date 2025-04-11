<?php
/**
 * @file    /adm/eyoom_admin/core/config/config_form.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "100100";

/**
 * 폼 action URL
 */
$action_url1 = G5_ADMIN_URL . "/?dir=config&pid=config2_form_update&smode=1";

auth_check_menu($auth, $sub_menu, 'r');

if ($is_admin != 'super') {
    alert('최고관리자만 접근 가능합니다.');
}

if (!isset($config['cf_mobile_new_skin'])) {
    sql_query(
        " ALTER TABLE `{$g5['config_table']}`
                    ADD `cf_settle_point1` VARCHAR(255) NOT NULL AFTER `cf_memo_send_point`,
                    ADD `cf_settle_point2` VARCHAR(255) NOT NULL AFTER `cf_settle_point1`,
                    ADD `cf_settle_point3` VARCHAR(255) NOT NULL AFTER `cf_settle_point2` ",
        true
    );
}

// https://github.com/gnuboard/gnuboard5/issues/296 이슈처리
$sql = " select * from {$g5['config_table']} limit 1";
$config = sql_fetch($sql);

if (!$config['cf_faq_skin']) {
    $config['cf_faq_skin'] = "basic";
}
if (!$config['cf_mobile_faq_skin']) {
    $config['cf_mobile_faq_skin'] = "basic";
}


if(!$config['cf_faq_skin']) $config['cf_faq_skin'] = "basic";
if(!$config['cf_mobile_faq_skin']) $config['cf_mobile_faq_skin'] = "basic";

/**
 * 탭메뉴
 */
$pg_anchor = array(
    'anc_cf_basic' => '포인트정산설정',
);

/**
 * SMS 설정
 */
if (!$config['cf_icode_server_ip']) {
    $config['cf_icode_server_ip'] = '211.172.232.124';
}
if (!$config['cf_icode_server_port']) {
    $config['cf_icode_server_port'] = '7295';
}

$userinfo = array('payment' => '');
if ($config['cf_sms_use'] && $config['cf_icode_id'] && $config['cf_icode_pw']) {
    $userinfo = get_icode_userinfo($config['cf_icode_id'], $config['cf_icode_pw']);
}

/**
 * 이윰 관리자모드 테마
 */
$cf_eyoom_admin_theme = get_skin_dir('theme', EYOOM_ADMIN_PATH);

/**
 * 위지윅 에디터
 */
$cf_editor  = get_skin_dir('', G5_EDITOR_PATH);

/**
 * 음성 캡챠
 */
$cf_captcha_mp3 = get_skin_dir('mp3', str_replace(array('recaptcha_inv', 'recaptcha'), 'kcaptcha', G5_CAPTCHA_PATH));

/**
 * _rewrite_config_form.php 영역
 */
{
    $is_use_apache = (stripos($_SERVER['SERVER_SOFTWARE'], 'apache') !== false);

    $is_use_nginx = (stripos($_SERVER['SERVER_SOFTWARE'], 'nginx') !== false);

    $is_use_iis = !$is_use_apache && (stripos($_SERVER['SERVER_SOFTWARE'], 'microsoft-iis') !== false);

    $is_write_file = false;
    $is_apache_need_rules = false;
    $is_apache_rewrite = false;

    if (!($is_use_apache || $is_use_nginx || $is_use_iis)) {    // 셋다 아니면 다 출력시킨다.
        $is_use_apache = true;
        $is_use_nginx = true;
    }

    if ($is_use_nginx) {
        $is_write_file = false;
    }
    
    if ($is_use_apache) {
        $is_write_file = (is_writable(G5_PATH) || (file_exists(G5_PATH . '/.htaccess') && is_writable(G5_PATH . '/.htaccess'))) ? true : false;
        $is_apache_need_rules = check_need_rewrite_rules();
        $is_apache_rewrite = function_exists('apache_get_modules') && in_array('mod_rewrite', apache_get_modules());
    }

    $get_path_url = parse_url(G5_URL);

    $base_path = isset($get_path_url['path']) ? $get_path_url['path'] . '/' : '/';

    $short_url_arrs = array(
        '0' => array('label' => '사용안함', 'url' => G5_URL . '/board.php?bo_table=free&wr_id=123'),
        '1' => array('label' => '숫자', 'url' => G5_URL . '/free/123'),
        //'2' => array('label' => '글 이름', 'url' => G5_URL . '/free/안녕하세요/'),
    );
}

/**
 * 버튼
 */
$frm_submit_fixed = ' <input type="submit" value="적용하기" class="admin-fixed-submit-btn btn-e btn-e-red" accesskey="s">' ;

$frm_submit  = ' <div class="confirm-bottom-btn text-center margin-top-30 margin-bottom-30 m-t-0 m-b-0"> ';
$frm_submit .= ' <input type="submit" value="적용하기" class="btn-e btn-e-lg btn-e-crimson" accesskey="s">' ;
$frm_submit .= '</div>';