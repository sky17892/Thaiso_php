<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<div id="display_pay_button" class="btn_confirm" style="display:none">
    <input type="button" value="สั่งซื้อ" class="btn_submit" onclick="forderform_check(this.form);"/>
    <a href="javascript:history.go(-1);" class="btn01">ยกเลิก</a>
</div>
<div id="display_pay_process" style="display:none">
    <img src="<?php echo G5_URL; ?>/shop/img/loading.gif" alt="">
    <span>กำลังดำเนินการสั่งซื้อ กรุณารอสักครู่</span>
</div>

<script>
document.getElementById("display_pay_button").style.display = "" ;
</script>
