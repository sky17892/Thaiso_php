<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/item.info.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<?php if ($default['de_rel_list_use']) { ?>
<?php /* ---------- 관련상품 시작 ---------- */ ?>
<section id="sit_rel">
    <h2>สินค้าที่คล้ายกัน</h2>
    <?php echo $rel_list; ?>
</section>
<?php /* ---------- 관련상품 끝 ---------- */ ?>
<?php } ?>

<?php /* ---------- 상품 정보 시작 ---------- */ ?>
<section id="sit_inf">
    <h2 class="h-hidden">ข้อมูลสินค้า</h2>
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs">
				<li class="active"><a href="#sit_inf">รายละเอียดสินค้า</a></li>
				<li ><a href="#sit_use">รีวิว <span class="item_use_count">0</span></a></li>
				<li ><a href="#sit_qa">สอบถามข้อมูลสินค้า <span class="item_qa_count">0</span></a></li>
				<li ><a href="#sit_dvr">ข้อมูลการจัดส่ง</a></li>
				<li ><a href="#sit_ex">ข้อมูลการขอเปลี่ยนสินค้า</a></li>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>


	<DIV class="thai">
	<?php echo conv_content($it['it_9_subj'], 1); ?>
	</DIV><br>
	<center>
	<button id="moreBtn">ซ่อน</button>
	<div class="thai2">
		<?php if ($it['it_explan']) { // 상품 상세설명 ?>
		<h3 class="h-hidden">คำอธิบายรายละเอียดของสินค้า</h3>
<style type="text/css">
	#sit_inf_explan img{width:100%;max-width:800px}
</style>
		<div id="sit_inf_explan">
			<?php echo conv_content($it['it_explan'], 1); ?>
		</div>
		<?php } ?>
	</div></center>
</section>
<style type="text/css">
	#moreBtn {padding:5px 20px;border:1px solid #ddd;border-radius:10px;margin-bottom:20px}
</style>
<script>
    // Get references to the button and the .thai2 div
    const moreBtn = document.getElementById('moreBtn');
    const thai2Div = document.querySelector('.thai2');

    // Add click event listener to toggle visibility of .thai2 div
    moreBtn.addEventListener('click', function() {
        // Toggle visibility by changing display style
        if (thai2Div.style.display === 'block' || thai2Div.style.display === '') {
            thai2Div.style.display = 'none';
            moreBtn.textContent = 'ดูเพิ่มเติม'; // Change button text to "Hide"
        } else {
            thai2Div.style.display = 'block';
            moreBtn.textContent = 'ซ่อน'; // Change button text back to "See more"
        }
    });
</script>
<?php /* ---------- 상품 정보 끝 ---------- */ ?>

<?php /* ---------- 사용후기 시작 ---------- */ ?>
<section id="sit_use">
    <h2 class="h-hidden">รีวิวการใช้งาน</h2>
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs">
				<li><a href="#sit_inf">รายละเอียดสินค้า</a></li>
				<li  class="active"><a href="#sit_use">รีวิว <span class="item_use_count">0</span></a></li>
				<li ><a href="#sit_qa">สอบถามข้อมูลสินค้า <span class="item_qa_count">0</span></a></li>
				<li ><a href="#sit_dvr">ข้อมูลการจัดส่ง</a></li>
				<li ><a href="#sit_ex">ข้อมูลการขอเปลี่ยนสินค้า</a></li>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>

    <div id="itemuse"><?php include_once($skin_dir.'/itemuse.php'); ?></div>
</section>
<?php /* ---------- 사용후기 끝 ---------- */ ?>

<?php /* ---------- 상품문의 시작 ---------- */ ?>
<section id="sit_qa">
    <h2 class="h-hidden">สอบถามเกี่ยวกับสินค้า</h2>
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs">
				<li><a href="#sit_inf">รายละเอียดสินค้า</a></li>
				<li ><a href="#sit_use">รีวิว <span class="item_use_count">0</span></a></li>
				<li  class="active"><a href="#sit_qa">สอบถามข้อมูลสินค้า <span class="item_qa_count">0</span></a></li>
				<li ><a href="#sit_dvr">ข้อมูลการจัดส่ง</a></li>
				<li ><a href="#sit_ex">ข้อมูลการขอเปลี่ยนสินค้า</a></li>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>
    <div id="itemqa"><?php include_once($skin_dir.'/itemqa.php'); ?></div>
</section>
<?php /* ---------- 상품문의 끝 ---------- */ ?>

<?php if ($default['de_baesong_content']) { // 배송정보 내용이 있다면 ?>
<?php /* ---------- 배송정보 시작 ---------- */ ?>
<section id="sit_dvr">
    <h2 class="h-hidden">ข้อมูลการจัดส่ง</h2>
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs">
				<li><a href="#sit_inf">รายละเอียดสินค้า</a></li>
				<li ><a href="#sit_use">รีวิว <span class="item_use_count">0</span></a></li>
				<li ><a href="#sit_qa">สอบถามข้อมูลสินค้า <span class="item_qa_count">0</span></a></li>
				<li  class="active"><a href="#sit_dvr">ข้อมูลการจัดส่ง</a></li>
				<li ><a href="#sit_ex">ข้อมูลการขอเปลี่ยนสินค้า</a></li>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>

    <?php echo conv_content($default['de_baesong_content'], 1); ?>
</section>
<?php /* ---------- 배송정보 끝 ---------- */ ?>
<?php } ?>

<?php if ($default['de_change_content']) { // 교환/반품 내용이 있다면 ?>
<?php /* ---------- 교환/반품 시작 ---------- */ ?>
<section id="sit_ex">
    <h2 class="h-hidden">การเปลี่ยน/คืนสินค้า</h2>
        <div class="pg-anchor-in">
            <ul class="nav nav-tabs">
				<li><a href="#sit_inf">รายละเอียดสินค้า</a></li>
				<li ><a href="#sit_use">รีวิว <span class="item_use_count">0</span></a></li>
				<li ><a href="#sit_qa">สอบถามข้อมูลสินค้า <span class="item_qa_count">0</span></a></li>
				<li ><a href="#sit_dvr">ข้อมูลการจัดส่ง</a></li>
				<li  class="active"><a href="#sit_ex">ข้อมูลการขอเปลี่ยนสินค้า</a></li>
            </ul>
            <div class="tab-bottom-line"></div>
        </div>

    <?php echo conv_content($default['de_change_content'], 1); ?>
</section>
<?php /* ---------- 교환/반품 끝 ---------- */ ?>
<?php } ?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script>
$('.pg-anchor-in a').on('click', function(e) {
    e.stopPropagation();
    var scrollTopSpace;
    if (window.innerWidth >= 992) {
        scrollTopSpace = 90;
    } else {
        scrollTopSpace = 70;
    }
    var tabLink = $(this).attr('href');
    var offset = $(tabLink).offset().top;
    $('html, body').animate({scrollTop : offset - scrollTopSpace}, 500);
    return false;
});

$(window).on("load", function() {
    $("#sit_inf_explan").viewimageresize2();
});
</script>