<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/config/config_form.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/remodal/remodal.css">', 11);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/remodal/remodal-default-theme.css">', 12);
add_javascript('<script src="'.G5_JS_URL.'/remodal/remodal.js"></script>', 10);

/**
 * 페이지 경로 설정
 */
$fm_pid = 'config_form';
$g5_title = '기본환경설정';
$g5_page_path = '<li class="breadcrumb-item"><a href="'.correct_goto_url(G5_ADMIN_URL).'">Home</a></li><li class="breadcrumb-item active" aria-current="page">환경설정</li><li class="breadcrumb-item active" aria-current="page">'.$g5_title.'</li>';

$frm_eba_submit  = ' <div class="confirm-fixed-btn"> ';
$frm_eba_submit .= ' <input type="submit" value="적용하기" class="btn-e btn-e-md btn-e-crimson" accesskey="s">' ;
$frm_eba_submit .= '</div>';
$frm_submit .= $frm_eba_submit;
?>

<style>
.cf_cert_hide {display:none}
.cf_tr_hide {display:none}
.icode_old_version th{background-color:#FFFCED !important}
.icode_json_version th{background-color:#F6F1FF !important}
@media (max-width: 1199px) {
    .pg-anchor-in .nav-tabs li:nth-child(10) a {border-bottom:0}
}
</style>

<div class="admin-board-form">
    <form name="fconfigform" id="fconfigform" method="post" onsubmit="return fconfigform_submit(this);" class="eyoom-form">
    <input type="hidden" name="token" id="token" value="">
    <input type="hidden" name="eba_theme" id="eba_theme" value="<?php echo $config['cf_eyoom_admin_theme']; ?>">

    <div class="pg-anchor">
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($pg_anchor as $anc_id => $anc_name) { ?>
                <li role="presentation">
                    <a href="javasecipt:void(0);" class="anchor-menu <?php echo $anc_id; ?>" id="<?php echo $anc_id; ?>_tab" data-bs-toggle="tab" data-bs-target="#<?php echo $anc_id; ?>"><?php echo $anc_name; ?></a>
                </li>
            <?php } ?>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>
    </div>
    
    <div class="tab-content">
        <?php /* 홈페이지 기본환경 설정 : 시작 */ ?>
        <div class="tab-pane show active" id="anc_cf_basic" role="tabpanel" aria-labelledby="anc_cf_basic_tab">
            <div class="adm-form-table m-b-20">


<?php for ($i=1; $i<=5; $i++) { ?>
                <div class="adm-form-tr-wrap">
                    <div class="adm-form-tr tr-l">
                        <div class="adm-form-td td-l">
                            <label for="cf_settle_point1" class="label">총판<?php echo $i ?>등급<strong class="sound_only">필수</strong></label>
                        </div>
                        <div class="adm-form-td td-r">
                            <label class="input max-width-250px">
                                <i class="icon-append">%</i>
                                <input type="text" name="cf_settle_point<?php echo $i ?>" value="<?php echo $config['cf_settle_point'.$i]; ?>" id="cf_settle_point1" class="text-end" required>
                            </label>
                            <div class="note"><strong>Note:</strong> 월 포인트 정산 (주문액 %)</div>
                        </div>
                    </div>
                    <div class="adm-form-tr tr-r">
                        <div class="adm-form-td td-l">
                            <label for="cf_settle_point2" class="label">총판<?php echo ($i+5) ?>등급<strong class="sound_only">필수</strong></label>
                        </div>
                        <div class="adm-form-td td-r">
                            <label class="input max-width-250px">
                                <i class="icon-append">%</i>
                                <input type="text" name="cf_settle_point<?php echo ($i+5) ?>" value="<?php echo $config['cf_settle_point'.($i+5)]; ?>" id="cf_settle_point2" class="text-end" required>
                            </label>
                            <div class="note"><strong>Note:</strong> 월 포인트 정산 (주문액 %)</div>
                        </div>
                    </div>
                </div>
<?php } ?>




                
                
            </div>
        </div>
        <?php /* 홈페이지 기본환경 설정 : 끝 */ ?>
    </div>

    <?php echo $frm_submit; ?>

    </form>
</div>

<script>
$(function() {
    // 기본환경 탭 우선 active 적용
    $(".anc_cf_basic").addClass('active');

    $("#cf_captcha").on("change", function(){
        if ($(this).val() == 'recaptcha' || $(this).val() == 'recaptcha_inv') {
            $("[class^='kcaptcha_']").hide();
        } else {
            $("[class^='kcaptcha_']").show();
        }
    }).trigger("change");
});

function fconfigform_submit(f) {
    f.action = "<?php echo $action_url1; ?>";
    return true;
}

<?php if (G5_IS_MOBILE) { ?>
$(function() {
    $(".adm-table-form-wrap td").removeAttr('colspan');
});
<?php } ?>
</script>

