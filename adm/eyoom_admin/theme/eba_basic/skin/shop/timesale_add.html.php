<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/member/member_form.html.php
 idx	ts_title	ts_start	ts_end	ts_memo	use_yn
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<div class="admin-member-form">
    <div class="adm-headline">
        <h3>타임어택등록</h3>
    </div>
    <form name="fmember" id="fmember" method="post" action="<?php echo $action_url1; ?>" onsubmit="return fmember_submit(this);" enctype="multipart/form-data" class="eyoom-form">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="idx" value="<?php echo $ts['idx'] ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="lev" value="<?php echo $lev; ?>">
    <input type="hidden" name="cert" value="<?php echo $cert; ?>">
    <input type="hidden" name="open" value="<?php echo $open; ?>">
    <input type="hidden" name="adt" value="<?php echo $adt; ?>">
    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
    <input type="hidden" name="sms" value="<?php echo $sms; ?>">
    <input type="hidden" name="sdt" value="<?php echo $sdt; ?>">
    <input type="hidden" name="fr_date" value="<?php echo $fr_date; ?>">
    <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
    <input type="hidden" name="wmode" value="<?php echo $wmode ?>">
    <input type="hidden" name="token" value="">

    <div class="adm-table-form-wrap margin-bottom-30">
        <header><strong><i class="fas fa-caret-right"></i> 타임어택정보 </strong></header>
        <div class="table-list-eb">
            <?php if (!G5_IS_MOBILE) { ?>
            <div class="table-responsive">
            <?php } ?>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="table-form-th">
                            <label for="ts_title" class="label">제목<?php echo $sound_only ?></label>
                        </th>
                        <td colspan="3">
                            <div <?php if (!G5_IS_MOBILE) { ?>class="inline-group"<?php } ?>>
                                <span>
                                    <label class="input form-width-550px"><input type="text" name="ts_title" value="<?php echo $ts['ts_title']; ?>" id="ts_title" style="width:700px;"></label>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="ts_start" class="label">시작일시<strong class="sound_only">필수</strong></label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <input type="text" name="ts_start" id="ts_start" value="<?php echo $ts['ts_start']; ?>" required required>
                            </label>
                        </td>
                        <th class="table-form-th border-left-th">
                            <label for="mb_nick" class="label">종료일시<strong class="sound_only">필수</strong></label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <input type="text" name="ts_end" id="ts_end" value="<?php echo $ts['ts_end']; ?>" required required>
                            </label>
                        </td>
                    </tr>


                    <tr>
                        <th class="table-form-th">
                            <label for="ts_memo" class="label">메모</label>
                        </th>
                        <td colspan="3">
                            <label for="ts_memo" class="textarea">
                                <textarea name="ts_memo" id="ts_memo" rows="5" style="width:100% !!important"><?php echo $ts['ts_memo']; ?></textarea>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="mb_icon" class="label">사용</label>
                        </th>
                        <td colspan="3">
                            <label for="file" class="input input-file">
                                <label for="use_yn" class="checkbox">
										<input type="checkbox" name="use_yn" id="use_yn" value="1" <?=($ts['use_yn'])?"checked":"" ?>><i></i> 사용
									</label>
                            </label>
                        </td>
                    </tr>

                    
                </tbody>
            </table>
            <?php if (!G5_IS_MOBILE) { ?>
            </div>
            <?php } ?>
        </div>
    </div>

 <div class="text-center margin-top-30 margin-bottom-30">  <input type="submit" value="확인" class="btn-e btn-e-lg btn-e-red" accesskey="s"> <a href="<?php echo G5_ADMIN_URL; ?>/?dir=manage&amp;pid=timesale" class="btn-e btn-e-lg btn-e-dark">목록</a> </div>
    
    </form>
</div>

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/eyoom-form/plugins/jquery-maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/eyoom-form/plugins/jquery-chained/jquery.chained.remote.min.js"></script>


<link rel="stylesheet" href="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<script>


$(function(){
    $('#ts_start').appendDtpicker({
        lang:'ko',
        format:'Y-m-d H:i'
    });
    $('#ts_end').appendDtpicker({
        lang:'ko',
        format:'Y-m-d H:i'
    });
});

</script>


<script>

$(document).ready(function(){
    $('#ts_startx').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd hh:mm:ss',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],

		timeFormat:'HH:mm:ss',
		controlType:'select',
		oneLine:true,
        onSelect: function(selectedDate){
            $('#to_date').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#ts_endc').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#fr_date').datepicker('option', 'maxDate', selectedDate);
        }
    });
});

function fmember_submit(f)
{

    return true;
}
jQuery(function($){
    $("#captcha_key").prop('required', false).removeAttr("required").removeClass("required");

    $("#mb_password").on("keyup", function(e) {
        var $warp = $("#mb_password_captcha_wrap"),
            tooptipid = "mp_captcha_tooltip",
            $span_text = $("<span>", {id:tooptipid, style:"font-size:0.95em;letter-spacing:-0.1em"}).html("비밀번호를 수정할 경우 캡챠를 입력해야 합니다."),
            $parent = $(this).parent(),
            is_invisible_recaptcha = $("#captcha").hasClass("invisible_recaptcha");

        if($(this).val()){
            $warp.show();
            if(! is_invisible_recaptcha) {
                $warp.css("margin-top","1em");
                if(! $("#"+tooptipid).length){ $parent.append($span_text) }
            }
        } else {
            $warp.hide();
            if($("#"+tooptipid).length && ! is_invisible_recaptcha){ $parent.find("#"+tooptipid).remove(); }
        }
    });
});
</script>
