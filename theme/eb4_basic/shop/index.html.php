<?php
/**
 * theme file : /theme/THEME_NAME/shop/index.html.php
 */
if (!defined('_EYOOM_')) exit;
?>
<style type="text/css">
	.nu{max-width:1310px;margin:0 auto}
	.ban01{width:100%;max-width:490px;float:left}
	.ban{float:right;max-width:820px}
	.ban li{float:left}
	.ban picture img{border:0px solid #ddd;margin:1px;max-width:265px;max-height:230px !important}
	.ebb-basic-wrap-1730718829,.ebb-basic-wrap-1730718864,.ebb-basic-wrap-1730718881{margin-bottom:0px !important}
	.ebb-basic-in {
		position: relative;
		overflow: hidden;
		border-radius: 0px !important;
	}
	 .m_view{display:none}

	@media (max-width:576px) {
		.pc_view{display:none}
		.m_view{display:block}
		.basic-body {
			position: relative;
			padding: 0px 0;
		}
		#sit_inf_explan img{width:100%}
	}
</style>



<?php /* ---------- 쇼핑몰 메인 EB 슬라이더 시작 ---------- */ ?>
<div class="shop-main-slider-top pc_view">
    <?php /* EB슬라이더 - basic */ ?>
    <?php echo eb_slider('1526428620'); ?>
</div>
<?php /* ---------- 쇼핑몰 메인 EB 슬라이더 끝 ---------- */ ?>
<?php /* ---------- 쇼핑몰 메인 EB 슬라이더 시작 ---------- */ ?>
<div class="m_view">
    <?php /* EB슬라이더 - basic */ ?>
  <?php echo eb_slider('1730999982'); ?>

<table id="n_btn">
	<Tr>
		<td><a href="/shop/timeattack.php"><img src="/img/m_ico01.png"><br>타임어택</a></td>
		<td><a href="/shop/list.php?ca_id=f0"><img src="/img/m_ico11.png"><br>고객PICK</a></td>
		<td><a href="/shop/list.php?ca_id=d0"><img src="/img/m_ico03.png"><br>패션 준비중</a></td>
	</tr>
	<tr>
		<td><a href="/shop/list.php?ca_id=10"><img src="/img/m_ico02.png"><br>뷰티</a></td>
		<td><a href="/shop/list.php?ca_id=20"><img src="/img/m_ico18.png"><br>생활용품</a></td>
		<td><a href="/shop/list.php?ca_id=30"><img src="/img/m_ico14.png"><br>청소/욕실</a></td>
	</tr>
	<tr>
		<td><a href="/shop/list.php?ca_id=40"><img src="/img/m_ico04.png"><br>건강/영양제</a></td>
		<td><a href="/shop/list.php?ca_id=50"><img src="/img/m_ico06.png"><br>식품</a></td>
		<td><a href="/shop/list.php?ca_id=60"><img src="/img/m_ico09.png"><br>홈인테리어</a></td>
	</tr>
	<tr>
		<td><a href="/shop/list.php?ca_id=70"><img src="/img/m_ico08.png"><br>반려동물</a></td>
		<td><a href="/shop/list.php?ca_id=80"><img src="/img/m_ico10.png"><br>공구/디지털</a></td>
		<td><a href="/shop/list.php?ca_id=90"><img src="/img/m_ico12.png"><br>수납/정리</a></td>
	</tr>
	<tr>
		<td><a href="/shop/list.php?ca_id=a0"><img src="/img/m_ico13.png"><br>스포츠/레저</a></td>
		<td><a href="/shop/list.php?ca_id=b0"><img src="/img/m_ico07.png"><br>주방용품</a></td>
		<td><a href="/shop/list.php?ca_id=c0"><img src="/img/m_ico05.png"><br>위생용품/의료용품</a></td>
	</tr>
</table>
<div style="background:url(/img/today.png) center bottom;text-align:center;padding:15px 0px 30px;color:#fff;margin-bottom:20px;text-shadow:1px 1px 10px #000;font-family: 'Tenada';font-size:20px">TODAY PICK</div>
</div>

<style type="text/css">
	.ebs-shop-basic-wrap-1730999982 {
		position: relative;
		margin-bottom: 0px;
	}
	#n_btn td{font-size:9pt;width:20%;text-align:center;padding:5px;border:1px solid #ddd}
	#n_btn td:hover{background:#fafafa}
	#n_btn td img{width:40%;}
	.bar_line {height:10px;background:#ddd;width:100%;margin-bottom:20px;display:none}
	.main-heading h2 img{display:none}
@media (max-width:500px) {
	.bar_line {height:10px;background:#ddd;width:100%;margin-bottom:20px;display:block}
	.main-heading h2 {
		position: relative;
		text-align: left;
		font-size: 14pt;
		margin: 0 0 30px;
	}
	.main-heading h2 img{display:block}
	.main-heading h2:after {
		content: "";
		position: absolute;
		bottom: -10px;
		left: 50%;
		display: block;
		width: 20px;
		height: 2px;
		margin-left: -10px;
		background: #fff;
	}
}
</style>

<?php /* ---------- 쇼핑몰 메인 EB 슬라이더 끝 ---------- */ ?>
<style type="text/css">
	@font-face {
		font-family: 'Tenada';
		src: url('https://fastly.jsdelivr.net/gh/projectnoonnu/noonfonts_2210-2@1.0/Tenada.woff2') format('woff2');
		font-weight: normal;
		font-style: normal;
	}
	.ban li{width:33.3%}
	.ban li img{width:100%}
</style>
<div class="nu">
	<div class="ban01"><?php echo eb_slider('1730684021'); ?></div>
	<div class="ban">
		<ul>
			<li><?php echo eb_banner('1730718829'); ?></li>
			<li><?php echo eb_banner('1730718864'); ?></li>
			<li><?php echo eb_banner('1730718881'); ?></li>
			<li><?php echo eb_banner('1730718898'); ?></li>
			<li><?php echo eb_banner('1730718913'); ?></li>
			<li><?php echo eb_banner('1730718928'); ?></li>
		</ul>
	</div>
</div>



<div style="clear:both;max-width:1400px;margin:0 auto"><br>
    <?php /* ---------- 이벤트박스 시작 ---------- */ ?>
    <?php include_once(EYOOM_THEME_SHOP_SKIN_PATH.'/boxevent.skin.html.php'); // 이벤트 ?>
    <?php /* ---------- 이벤트박스 끝 ---------- */ ?>
	<div class="bar_line">&nbsp;</div>

    <?php /* ---------- 히트상품 시작 ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="새창 열기">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>

    <?php if($default['de_type1_list_use']) { ?>
    <section class="m-b-40" style="padding:0px 20px">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(1); ?>"><img src="/img/mo_01.png" style="float:left;height:24px;margin-right:10px"><strong>타이소 추천 상품</strong></a><a href="/shop/listtype.php?type=1" style="float:right;font-size:10pt"><span>+ 더보기</span></a></h2>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type1_list_skin']);
        $list->set_type(1);
        $list->set_view('it_img', true);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        $list->set_view('star', true);
        echo $list->run();
        ?>
    </section>
    <?php } ?>
    <?php /* ---------- 히트상품 끝 ---------- */ ?>

    <?php /* ---------- 추천상품 시작 ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="새창 열기">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>
	<div class="bar_line">&nbsp;</div>
    <?php if($default['de_type2_list_use']) { ?>
    <section class="m-b-40" style="padding:0px 20px">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(2); ?>"><img src="/img/m_ico01.png" style="float:left;height:24px;margin-right:10px"><strong>타임 어택 최대할인 상품</strong></strong></a> <a href="/shop/timeattack.php" style="float:right;font-size:10pt"><span>+ 더보기</span></a></h2>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type2_list_skin']);
        $list->set_type(2);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        $list->set_view('star', true);
        echo $list->run();
        ?>
    </section>
    <?php } ?>
    <?php /* ---------- 추천상품 끝 ---------- */ ?>
	<div class="bar_line">&nbsp;</div>

    <?php /* ---------- 최신상품 시작 ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="새창 열기">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>

    <?php if($default['de_type3_list_use']) { ?>
    <section class="m-b-40" style="padding:0px 20px">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(3); ?>"><img src="/img/mo_02.png" style="float:left;height:24px;margin-right:10px"><strong>타이소 인기 상품 10</strong></a><a href="/shop/listtype.php?type=3" style="float:right;font-size:10pt"><span>+ 더보기</span></a></h2>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type3_list_skin']);
        $list->set_type(3);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        $list->set_view('star', true);
        echo $list->run();
        ?>
    </section>
    <?php } ?>
    <?php /* ---------- 최신상품 끝 ---------- */ ?>
	<!-- <?php echo eb_slider('1730682644'); ?> -->
	<div class="bar_line">&nbsp;</div>
    <?php /* ---------- 인기상품 시작 ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="새창 열기">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>
	<?php echo eb_banner('1737502462'); ?>
    <?php if($default['de_type4_list_use']) { ?>
    <section class="m-b-40" style="padding:0px 20px">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(4); ?>"><img src="/img/m_ico11.png" style="float:left;height:24px;margin-right:10px"><strong>고객 PICK 상품</strong></a><a href="/shop/list.php?ca_id=f0" style="float:right;font-size:10pt"><span>+ 더보기</span></a></h2>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type4_list_skin']);
        $list->set_type(4);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        $list->set_view('star', true);
        echo $list->run();
        ?>
    </section>
    <?php } ?>
    <?php /* ---------- 인기상품 끝 ---------- */ ?>

    <?php /* ---------- 할인상품 시작 ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;display:none">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="새창 열기">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>

    <?php if($default['de_type5_list_use']) { ?>
    <section style="display:none">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(5); ?>"><strong>ส่งคำขอให้เพิ่มสินค้าที่ต้องการ</strong></a></h2>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type5_list_skin']);
        $list->set_type(5);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        $list->set_view('star', true);
        echo $list->run();
        ?>
    </section>
    <?php } ?>
    <?php /* ---------- 할인상품 끝 ---------- */ ?>
</div>

