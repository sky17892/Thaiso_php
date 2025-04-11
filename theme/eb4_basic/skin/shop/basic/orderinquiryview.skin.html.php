<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/orderinquiryview.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

/**
 * LG 현금영수증 JS
 */
if($od['od_pg'] == 'lg') {
    if($default['de_card_test']) {
        echo '<script language="JavaScript" src="'.SHOP_TOSSPAYMENTS_CASHRECEIPT_TEST_JS.'"></script>'.PHP_EOL;
    } else {
        echo '<script language="JavaScript" src="'.SHOP_TOSSPAYMENTS_CASHRECEIPT_REAL_JS.'"></script>'.PHP_EOL;
    }
}
?>

<style>
.shop-steps {position:relative;margin-bottom:30px}
.shop-steps .step-indicator {border-collapse:separate;display:table;margin-left:0;position:relative;table-layout:fixed;vertical-align:middle}
.shop-steps .step-indicator li {display:table-cell;float:none;padding:0;width:1%}
.shop-steps .step-indicator li:before {background-color:#d5d5d5;content:"";display:block;height:1px;position:relative;top:40px}
.shop-steps .step-indicator li:first-child:before {left:50%}
.shop-steps .step-indicator li:last-child:before {right:50%}
.shop-steps .step-indicator .step {background-color:#fff;border:5px solid #e5e5e5;color:#e5e5e5;font-size:1.875rem;width:80px;height:80px;line-height:70px;border-radius:50% !important;margin:0 auto;position:relative;z-index:1}
.shop-steps .step-indicator .caption {box-sizing:border-box;color:#e5e5e5;padding:10px 5px;font-size:.9375rem;font-weight:700}
.shop-steps .step-indicator .active .step {border-color:#252525;color:#252525}
.shop-steps .step-indicator .active .caption {color:#252525}
.shop-steps .step-indicator .complete .step {border-color:#b5b5b5;color:#b5b5b5}
.shop-steps .step-indicator .complete .caption {color:#b5b5b5}
.shop-steps .step-indicator .incomplete .step {border-color:#b5b5b5;color:#b5b5b5}
.shop-steps .step-indicator .incomplete .caption {color:#b5b5b5}
.shop-steps .step-indicator .inactive .caption {color:#b5b5b5}
.shop-steps .alarm-marker .alarm-point {top:15px;right:15px}
.shop-steps .alarm-marker .alarm-effect {top:5px;right:5px}
.shop-cart .shop-cart-li-wrap, .shop-cart .table-list-eb .td-item-name ul, .shop-cart .shop-cart-li-wrap .li-opt ul {padding:0;list-style:none}
@media (max-width:576px) {
    .shop-steps .step-indicator li:before {top:30px}
    .shop-steps .step-indicator .step {border:3px solid #e5e5e5;font-size:20px;width:60px;height:60px;line-height:54px}
    .shop-steps .step-indicator .caption {font-size:.875rem}
    .shop-steps .alarm-marker .alarm-point {top:10px;right:10px}
    .shop-steps .alarm-marker .alarm-effect {top:0px;right:0px}
}
.shop-order-inquiry-view .order-num-box {background:#454545;border-left:4px solid #000;padding:15px;font-size:1.125rem;color:#c5c5c5;margin-bottom:30px}
.shop-order-inquiry-view .order-num-box strong {margin-left:10px;color:#fff}
.shop-order-inquiry-view .table-list-eb .table {margin-bottom:10px}
.shop-order-inquiry-view .table-list-eb td img {display:block;max-width:100%;height:auto}
.shop-order-inquiry-view .table-list-eb .td-img {text-align:center}
.shop-order-inquiry-view .table-list-eb .td-img .td-img-box {display:inline-block;overflow:hidden;width:80px;height:80px}
.shop-order-inquiry-view .order-view-payment {position:relative;border:1px solid #e5e5e5;margin-top:30px}
.shop-order-inquiry-view .order-view-member-area {position:relative;margin-right:370px}
.shop-order-inquiry-view .order-view-member-area .headline-short {margin-bottom:40px}
.shop-order-inquiry-view .order-view-payment-area {position:absolute;top:0;right:0;width:370px;height:100%;border-left:1px solid #e5e5e5;background:#fafafa;padding:20px 15px}
.shop-order-inquiry-view .order-view-member-area .order-view-member-box {padding:20px 15px;border-bottom:1px solid #e5e5e5}
.shop-order-inquiry-view .order-view-member-area .order-view-member-box .order-view-title {position:relative;margin:-20px -15px 30px;padding:25px 15px;border-bottom:1px solid #e5e5e5;background:#fafafa}
.shop-order-inquiry-view .order-view-member-area .order-view-member-box .order-view-title h5 {font-size:1.125rem;line-height:1}
.shop-order-inquiry-view .order-view-member-area .order-view-member-box .order-view-title h5:after {content:"";display:block;position:absolute;top:-1px;left:-1px;width:0;height:0;border-top:20px solid #5c6bc0;border-right:20px solid transparent}
.shop-order-inquiry-view .state-explan-box {position:relative;display:none}
.shop-order-inquiry-view .state-explan-box .table-list-eb .table {margin-bottom:0}
.shop-order-inquiry-view .payment-info-box {position:relative;overflow:hidden;clear:both;padding:15px;border:1px solid #e5e5e5;margin-top:-1px;background:#fff;text-align:right;color:#757575}
.shop-order-inquiry-view .payment-info-box span {float:left}
.shop-order-inquiry-view .payment-info-box strong {color:#000}
.shop-order-inquiry-view .payment-info-total {position:relative;overflow:hidden;border:1px solid #000;margin-bottom:20px}
.shop-order-inquiry-view .payment-info-total h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
.shop-order-inquiry-view .payment-info-total-box {position:relative;overflow:hidden;clear:both;padding:15px;border-bottom:1px solid #555;background:#353535;text-align:right;color:#fff}
.shop-order-inquiry-view .payment-info-total-box:last-child {border-bottom:0}
.shop-order-inquiry-view .payment-info-total-box span {float:left}
.shop-order-inquiry-view .payment-info-total-box strong {color:#fff}
.shop-order-inquiry-view .total-box-in-wrap {position:relative;border:1px solid #ab0000;background:#fff;padding:5px 0;margin-top:5px}
.shop-order-inquiry-view .total-box-in-box {position:relative;overflow:hidden;clear:both;padding:5px 10px;text-align:right;color:#757575}
.shop-order-inquiry-view .total-box-in-box span {float:left}
.shop-order-inquiry-view .total-box-in-box strong {color:#000}
#sod_cancel_pop {display:none;position:relative}
#sod_fin_cancelfrm form {padding:0}
.shop-order-inquiry-view .order-payment-cancel h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
.shop-order-inquiry-view .order-payment-cancel button {height:50px;line-height:50px;border:1px solid #959595;font-size:.9375rem;font-weight:700;width:100%;background:#fff;color:#757575}
.shop-order-inquiry-view .order-payment-cancel #sod_fin_cancelfrm {display:block;position:relative;top:inherit;left:inherit;width:100%;margin:20px 0 0;padding:0;background:none;box-shadow:0 0 0 #fff;border:0 none}
.shop-order-inquiry-view #sod_fin_test {padding:0;margin-top:20px}
@media (max-width:991px) {
    .shop-order-inquiry-view .order-view-member-area {margin-right:0}
    .shop-order-inquiry-view .order-view-payment-area {position:relative;top:inherit;right:inherit;width:100%;height:auto;border-left:0;border-top:1px solid #e5e5e5;background:#fafafa}
}
</style>

<div class="shop-steps">
    <ol class="list-inline text-center step-indicator">
        <li class="complete">
            <div class="step"><span class="fas fa-hand-pointer"></span></div>
            <div class="caption">การเลือกผลิตภัณฑ์</div>
        </li>
        <li class="complete">
            <div class="step"><i class="fas fa-shopping-basket"></i></div>
            <div class="caption">ตะกร้าสินค้า</div>
        </li>
        <li class="complete">
            <div class="step"><i class="fas fa-credit-card"></i></div>
            <div class="caption">สั่งซื้อ/ชำระเงิน</div>
        </li>
        <li class="active">
            <div class="step">
                <div class="alarm-marker">
                    <span class="alarm-effect"></span>
                    <span class="alarm-point"></span>
                </div>
                <i class="fas fa-check"></i>
            </div>
            <div class="caption">คำสั่งซื้อเสร็จสมบูรณ์</div>
        </li>
    </ol>
</div>

<div class="shop-order-inquiry-view">
    <div class="order-num-box">
        หมายเลขคำสั่งซื้อ <strong><?php echo $od_id; ?></strong>
    </div>
    <div class="sod-fin-list">
        <div class="headline-short"><h4><strong>สินค้าที่สั่งซื้อ</strong></h4></div>
        <p class="text-end f-s-13r m-b-5 text-gray visible-xs">Note! 좌우 스크롤 (<i class="fas fa-arrows-alt-h"></i>)</p>
        <div class="table-list-eb">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2" class="tbd-r" style="border-bottom:1px solid #212529">รูปภาพ</th>
                            <th colspan="7" id="th_itname" class="text-start">ชื่อสินค้า</th>
                        </tr>
                        <tr>
                            <th id="th_itopt" class="text-start">ชื่อของตัวเลือก</th>
                            <th id="th_itqty" class="width-100px tbd-both">จำนวน</th>
                            <th id="th_itprice" class="width-100px">ราคาขาย</th>
                            <th id="th_itsum" class="width-100px tbd-both">ผลรวม</th>
                            <th id="th_itpt" class="width-100px">พอยท์</th>
                            <th id="th_itpt" class="width-100px tbd-both">ค่าจัดส่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i<$order_count; $i++) { ?>
                        <?php foreach ($order[$i]['option'] as $k => $opt) { ?>
                        <?php if ($k==0) { ?>
                        <tr>
                            <td rowspan="<?php echo $order[$i]['rowspan']; ?>" class="td-img tbd-r"><a href="./item.php?it_id=<?php echo $order[$i]['it_id']; ?>" class="td-img-box"><?php echo $order[$i]['image']; ?></a></td>
                            <td headers="th_itname" colspan="7"><a href="./item.php?it_id=<?php echo $order[$i]['it_id']; ?>"><strong><?php echo $order[$i]['it_name']; ?></strong></a></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td headers="th_itopt" class="text-gray"><?php echo get_text($opt['ct_option']); ?></td>
                            <td headers="th_itqty" class="text-center tbd-both"><?php echo number_format($opt['ct_qty']); ?></td>
                            <td headers="th_itprice" class="text-center"><?php echo number_format($opt['opt_price']); ?></td>
                            <td headers="th_itsum" class="text-center tbd-both"><?php echo number_format($opt['sell_price']); ?></td>
                            <td headers="th_itpt" class="text-center"><?php echo number_format($opt['point']); ?></td>
                            <td headers="th_itpt" class="text-center tbd-both"><?php echo number_format($opt['ct_send_cost']); ?></td>
                            <!-- <td headers="th_itst" class="text-center"><strong class="text-crimson"><?php echo $opt['ct_status']; ?></span></td> -->
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-end m-b-10">
            <button type="button" id="state_explan_open" class="btn-e btn-e-dark">ดูข้อมูลสถานะ</button>
        </div>
        <div id="state_explan_box" class="state-explan-box">
            <div class="table-list-eb">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>สถานะ</th>
                            <th>설명</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">주문</th>
                            <td>주문이 접수 되었습니다.</td>
                        </tr>
                        <tr>
                            <th class="text-center">입금</th>
                            <td>입금(결제)이 완료 되었습니다.</td>
                        </tr>
                        <tr>
                            <th class="text-center">준비</th>
                            <td>상품 준비 중 입니다.</td>
                        </tr>
                        <tr>
                            <th class="text-center">배송</th>
                            <td>상품 배송 중 입니다.</td>
                        </tr>
                        <tr>
                            <th class="text-center">완료</th>
                            <td>상품 배송이 완료 되었습니다.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="order-view-payment">
        <div class="order-view-member-area">
            <div class="order-view-member-box">
                <div class="order-view-title"><h5><strong>ข้อมูลการชำระเงิน/การจัดส่ง</strong></h5></div>
                <div class="table-list-eb">
                    <table class="table">
                        <tbody>
                            <tr class="tbd-t">
                                <th class="tbd-r width-80px">หมายเลขคำสั่งซื้อ</th>
                                <td><?php echo $od_id; ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">วันที่และเวลาในการสั่งซื้อ</th>
                                <td><?php echo $od['od_time']; ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">วิธีการชำระเงิน</th>
                                <td><?php echo check_pay_name_replace($od['od_settle_case'], $od, 1); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">จำนวนเงินที่ชำระ</th>
                                <td class="ws-normal"><?php echo $od_receipt_price; ?></td>
                            </tr>
                            <?php if($od['od_receipt_price'] > 0) { ?>
                            <tr>
                                <th class="tbd-r">วันและเวลาชำระเงิน</th>
                                <td><?php echo $od['od_receipt_time']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if($app_no_subj && trim($app_no)) { // 승인번호, 휴대폰번호, 거래번호 ?>
                            <tr>
                                <th class="tbd-r"><?php echo $app_no_subj; ?></th>
                                <td><?php echo $app_no; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if($disp_bank) { // 계좌정보 ?>
                            <tr>
                                <th class="tbd-r">ชื่อผู้โอนเงิน</th>
                                <td><?php echo get_text($od['od_deposit_name']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">หมายเลขบัญชีที่โอนเงิน</th>
                                <td><?php echo get_text($od['od_bank_account']); ?></td>
                            </tr>
                            <?php } ?>
                            <?php if($disp_receipt) { // 영수증 ?>
                            <tr>
                                <th class="tbd-r">ใบเสร็จ</th>
                                <td>
                                    <?php if(isset($hp_receipt_script) && $hp_receipt_script) { ?>
                                    <a href="javascript:;" onclick="<?php echo $hp_receipt_script; ?>">영수증 출력</a>
                                    <?php } ?>

                                    <?php if(isset($card_receipt_script) && $card_receipt_script) { ?>
                                    <a href="javascript:;" onclick="<?php echo $card_receipt_script; ?>">영수증 출력</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if ($od['od_receipt_point'] > 0) { // พอยท์사용 ?>
                            <tr>
                                <th class="tbd-r">พอยท์사용</th>
                                <td><?php echo display_point($od['od_receipt_point']); ?></td>
                            </tr>
                            <?php } ?>
                            <?php if ($od['od_refund_price'] > 0) { // 환불 금액 ?>
                            <tr>
                                <th class="tbd-r">จำนวนเงินคืน</th>
                                <td><?php echo display_price($od['od_refund_price']); ?></td>
                            </tr>
                            <?php } ?>
                            <?php if ($default['de_taxsave_use']) { // 현금영수증 ?>
                            <?php if ($misu_price == 0 && $od['od_receipt_price'] && ($od['od_settle_case'] == '무통장' || $od['od_settle_case'] == '계좌이체' || $od['od_settle_case'] == '가상계좌')) { // 미수금이 없고 현금일 경우에만 현금영수증을 발급 할 수 있습니다. ?>
                            <tr>
                                <th class="tbd-r">현금영수증</th>
                                <td>
                                    <?php if ($od['od_cash']) { ?>
                                    <a href="javascript:;" onclick="<?php echo $cash_receipt_script; ?>" class="btn_frmline">현금영수증 확인하기</a>
                                    <?php } else if (shop_is_taxsave($od)) { ?>
                                    <a href="javascript:;" onclick="window.open('<?php echo G5_SHOP_URL; ?>/taxsave.php?od_id=<?php echo $od_id; ?>', 'taxsave', 'width=550,height=400,scrollbars=1,menus=0');" class="btn_frmline">현금영수증을 발급하시려면 클릭하십시오.</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="order-view-member-box">
                <div class="order-view-title"><h5><strong>ผู้สั่งซื้อ</strong></h5></div>
                <div class="table-list-eb">
                    <table class="table">
                        <tbody>
                            <tr class="tbd-t">
                                <th class="tbd-r width-80px">ชื่อ</th>
                                <td><?php echo get_text($od['od_name']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">หมายเลขโทรศัพท์</th>
                                <td><?php echo get_text($od['od_tel']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">โทรศัพท์มือถือ</th>
                                <td><?php echo get_text($od['od_hp']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">ที่อยู่</th>
                                <td class="ws-normal"><?php echo get_text(sprintf("(%s%s)", $od['od_zip1'], $od['od_zip2']).' '.print_address($od['od_addr1'], $od['od_addr2'], $od['od_addr3'], $od['od_addr_jibeon'])); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">E-mail</th>
                                <td><?php echo get_text($od['od_email']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="order-view-member-box">
                <div class="order-view-title"><h5><strong>ผู้ที่รับสินค้า</strong></h5></div>
                <div class="table-list-eb">
                    <table class="table">
                        <tbody>
                            <tr class="tbd-t">
                                <th class="tbd-r width-80px">ชื่อ</th>
                                <td><?php echo get_text($od['od_b_name']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">หมายเลขโทรศัพท์</th>
                                <td><?php echo get_text($od['od_b_tel']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">โทรศัพท์มือถือ</th>
                                <td><?php echo get_text($od['od_b_hp']); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">ที่อยู่</th>
                                <td class="ws-normal"><?php echo get_text(sprintf("(%s%s)", $od['od_b_zip1'], $od['od_b_zip2']).' '.print_address($od['od_b_addr1'], $od['od_b_addr2'], $od['od_b_addr3'], $od['od_b_addr_jibeon'])); ?></td>
                            </tr>
                            <tr>
                                <th class="tbd-r">ที่อยู่ภาพ</th>
                                <td class="ws-normal">
								
                    <?php 
$mb_address_path = G5_DATA_PATH.'/order/'.$od_id.'/'.$od['order_address_image'];
$mb_address_url = G5_DATA_URL.'/order/'.$od_id.'/'.$od['order_address_image'];
					
					if ( file_exists($mb_address_path)) {  ?>
                    <img src="<?php echo $mb_address_url ?>" alt="주소이미지첨부" class="float-start m-r-10">
                    <div class="clearfix"></div>
                    <?php }  ?>
								
								
								
								</td>
                            </tr>
                            <?php if ($default['de_hope_date_use']) { ?>
                            <tr>
                                <th class="tbd-r">희망배송일</th>
                                <td><?php echo substr($od['od_hope_date'],0,10).' ('.get_yoil($od['od_hope_date']).')' ;?></td>
                            </tr>
                            <?php } ?>
                            <?php if ($od['od_memo']) { ?>
                            <tr>
                                <th class="tbd-r">전하실 말씀</th>
                                <td class="ws-normal"><?php echo conv_content($od['od_memo'], 0); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="order-view-member-box bd-bottom-0">
                <div class="order-view-title"><h5><strong>ข้อมูลการจัดส่ง</strong></h5></div>
				<font size="" color="#ff3300">ㆍเมื่อคลิกหมายเลขติดตามพัสดุ จะถูกคัดลอก</font>
                <div class="table-list-eb">
                    <table class="table">

                        <tbody>
                            <?php if ($od['od_invoice'] && $od['od_delivery_company']) { ?>
                            <tr style="background:#fafafa">
                                <td style="text-align:Center !important" colspan=2><?php echo $od['od_delivery_company']; ?> <?php echo get_delivery_inquiry($od['od_delivery_company'], $od['od_invoice'], 'dvr_link'); ?></td>
							</tr>
							<tr>
								 <th class="td-border">운송장번호</th>
                                <td class="td-border" style="text-align:Center !important">
								<span id="invoice" style="cursor: pointer; color: blue;" onclick="copyToClipboard()"><?php echo $od['od_invoice']; ?></span>
<script>
function copyToClipboard() {
    var text = document.getElementById("invoice").innerText;
    
    navigator.clipboard.writeText(text).then(function() {
        alert("운송장 번호가 복사되었습니다: " + text);
    }).catch(function(err) {
        console.error("복사 실패:", err);
    });
}
</script>	
                                </td>
							</tr>
							<tr>
								<th>배송일시</th>
                                <td style="text-align:Center !important"><?php echo $od['od_invoice_time']; ?> <br><button onclick="goToPage()" style="border:1px solid #ddd;padding:5px 10px">택배 배송조회</button>
							
<script>
function goToPage() {
    window.open("https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=%EC%9A%B4%EC%86%A1%EC%9E%A5%EC%A1%B0%ED%9A%8C", "_blank");
}
</script>
								</td>
                            </tr>
                            <?php } else { ?>
                            <tr>
                                <td colspan="3" class="text-center ws-normal"><span class="text-gray"><i class="fas fa-exclamation-circle"></i> ยังไม่ได้จัดส่ง หรือยังไม่ได้กรอกข้อมูลการจัดส่ง</span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="order-view-payment-area">
            <div class="m-b-20">
                <div class="payment-info-box">
                    <span>
รวมยอดสั่งซื้อ.</span>
                    <strong><?php echo number_format($od['od_cart_price']); ?></strong>₩
                </div>
                <?php if($od['od_cart_coupon'] > 0) { ?>
                <div class="payment-info-box">
                    <span>개별상품 쿠폰할인</span>
                    <strong><?php echo number_format($od['od_cart_coupon']); ?></strong>₩
                </div>
                <?php } ?>
                <?php if($od['od_coupon'] > 0) { ?>
                <div class="payment-info-box">
                    <span>주문금액 쿠폰할인</span>
                    <strong><?php echo number_format($od['od_coupon']); ?></strong>₩
                </div>
                <?php } ?>
                <?php if ($od['od_send_cost'] > 0) { ?>
                <div class="payment-info-box">
                    <span>ค่าจัดส่ง</span>
                    <strong><?php echo number_format($od['od_send_cost']); ?></strong>₩
                </div>
                <?php } ?>
                <?php if($od['od_send_coupon'] > 0) { ?>
                <div class="payment-info-box">
                    <span>ค่าจัดส่ง 쿠폰할인</span>
                    <strong><?php echo number_format($od['od_send_coupon']); ?></strong>₩
                </div>
                <?php } ?>
                <?php if ($od['od_send_cost2'] > 0) { ?>
                <div class="payment-info-box">
                    <span>ค่าจัดส่งเพิ่มเติม</span>
                    <strong><?php echo number_format($od['od_send_cost2']); ?></strong>₩
                </div>
                <?php } ?>
                <?php if ($od['od_cancel_price'] > 0) { ?>
                <div class="payment-info-box">
                    <span>ยกเลิกจำนวน</span>
                    <strong><?php echo number_format($od['od_cancel_price']); ?></strong>₩
                </div>
                <?php } ?>
                <div class="payment-info-box">
                    <span>รวม</span>
                    <strong><b class="text-crimson"><?php echo number_format($tot_price); ?></b></strong>₩
                </div>
                <div class="payment-info-box">
                    <span>รับพอยท</span>
                    <strong><?php echo number_format($tot_point); ?></strong>₩
                </div>
            </div>

            <div class="payment-info-total">
                <h2>ยอดชำระเงิน</h2>
                <div class="payment-info-total-box">
                    <span>
ยอดซื้อทั้งหมด</span>
                    <strong><?php echo display_price($tot_price); ?></strong>
                </div>
                <?php
                if ($misu_price > 0) {
                echo '<div class="payment-info-total-box">';
                echo '<span>미결제액</span>'.PHP_EOL;
                echo '<strong>'.display_price($misu_price).'</strong>';
                echo '</div>';
                }
                ?>
                <div id="alrdy" class="payment-info-total-box">
                    <span>
จำนวนเงินที่ชำระ</span>
                    <strong><?php echo $wanbul; ?></strong>
                    <?php if( $od['od_receipt_point'] ){    //พอยท์로 결제한 내용이 있으면 ?>
                    <div class="total-box-in-wrap">
                        <div class="total-box-in-box"><span>- การชำระเงินพอยท์</span><strong><?php echo number_format($od['od_receipt_point']); ?>point</strong></div>
                        <div class="total-box-in-box"><span>- จ่ายจริง</span><strong><?php echo number_format($od['od_receipt_price']); ?>₩</strong></div>
                    </div>
                    <?php } ?>
                </div>
            </div>


            <div class="order-payment-cancel">
                <?php
                // 취소한 내역이 없다면
                if ($cancel_price == 0) {
                    if ($custom_cancel) {
                ?>
                <button type="button" class="sod_fin_c_btn">
ยกเลิกคำสั่งซื้อ</button>

                <div id="sod_cancel_pop">
                    <div id="sod_fin_cancelfrm">
                        <h2>주문취소</h2>
                        <form method="post" action="<?php echo G5_SHOP_URL; ?>/orderinquirycancel.php" onsubmit="return fcancel_check(this);" class="eyoom-form">
                        <input type="hidden" name="od_id"  value="<?php echo $od['od_id']; ?>">
                        <input type="hidden" name="token"  value="<?php echo $token; ?>">

                        <label for="cancel_memo" class="sound_only">취소사유</label>
                        <label class="input required-mark">
                            <input type="text" name="cancel_memo" id="cancel_memo" required size="40" maxlength="100" placeholder="취소사유">
                        </label>
                        <input type="submit" value="확인" class="btn-e btn-e-xl btn-e-dark btn-e-block m-t-10">
                        </form>
                    </div>
                </div>
                <script>	
                $(function (){
                    $(".sod_fin_c_btn").on("click", function() {
                        $("#sod_cancel_pop").show();
                    });
                    $(".sod_cls_btn").on("click", function() {
                        $("#sod_cancel_pop").hide();
                    });		
                });
                </script>
                <?php
                    }
                } else {
                ?>
                <div class="cont-text-bg">
                    <p class="bg-danger"><i class="fas fa-exclamation-circle"></i> 주문 취소, 반품, 품절된 내역이 있습니다.</p>
                </div>
                <?php } ?>
            </div>

            <div class="order-payment-cancel">
                <?php
                // ยกเลิก한 내역이 없다면
                if ($cancel_price == 0) {
                    if ($custom_cancel) {
                ?>
                <button type="button" class="sod_fin_c_btn" style="display:none;">주문 ยกเลิก하기</button>

                <div id="sod_cancel_pop" style="display:none;">
                    <div id="sod_fin_cancelfrm">
                        <h2>주문ยกเลิก</h2>
                        <form method="post" action="<?php echo G5_SHOP_URL; ?>/orderinquirycancel.php" onsubmit="return fcancel_check(this);" class="eyoom-form">
                        <input type="hidden" name="od_id"  value="<?php echo $od['od_id']; ?>">
                        <input type="hidden" name="token"  value="<?php echo $token; ?>">

                        <label for="cancel_memo" class="sound_only">ยกเลิก사유</label>
                        <label class="input required-mark">
                            <input type="text" name="cancel_memo" id="cancel_memo" required size="40" maxlength="100" placeholder="ยกเลิก사유">
                        </label>
                        <input type="submit" value="확인" class="btn-e btn-e-xl btn-e-dark btn-e-block m-t-10">
                        </form>
                    </div>
                </div>
                <script>	
                $(function (){
                    $(".sod_fin_c_btn").on("click", function() {
                        $("#sod_cancel_pop").show();
                    });
                    $(".sod_cls_btn").on("click", function() {
                        $("#sod_cancel_pop").hide();
                    });		
                });
                </script>
                <?php
                    }
                } else {
                ?>
                <div class="cont-text-bg">
                    <p class="bg-danger"><i class="fas fa-exclamation-circle"></i> 주문 ยกเลิก, 반품, 품절된 내역이 있습니다.</p>
                </div>
                <?php } ?>
            </div>

            <?php if ($od['od_settle_case'] == '가상계좌' && $od['od_misu'] > 0 && $default['de_card_test'] && $is_admin && $od['od_pg'] == 'kcp') {
            preg_match("/\s{1}([^\s]+)\s?/", $od['od_bank_account'], $matchs);
            $deposit_no = trim($matchs[1]);
            ?>
            <div class="cont-text-bg m-t-20 m-b-20">
                <p class="bg-info"><i class="fas fa-info-circle"></i> 관리자가 가상계좌 테스트를 한 경우에만 보입니다.</p>
            </div>
            <form method="post" action="http://devadmin.kcp.co.kr/Modules/Noti/TEST_Vcnt_Noti_Proc.jsp" target="_blank" class="eyoom-form">
            <div class="headline-short"><h5><strong>모의입금처리</strong></h5></div>
            <label for="e_trade_no" class="label">KCP 거래번호</label>
            <label class="input m-b-10">
                <input type="text" name="e_trade_no" value="<?php echo $od['od_tno']; ?>">
            </label>
            <label for="deposit_no" class="label">입금계좌</label>
            <label class="input m-b-10">
                <input type="text" name="deposit_no" value="<?php echo $deposit_no; ?>">
            </label>
            <label for="req_name" class="label">입금자명</label>
            <label class="input m-b-10">
                <input type="text" name="req_name" value="<?php echo $od['od_deposit_name']; ?>">
            </label>
            <label for="noti_url" class="label">입금통보 URL</label>
            <label class="input m-b-10">
                <input type="text" name="noti_url" value="<?php echo G5_SHOP_URL; ?>/settle_kcp_common.php">
            </label>
            <div id="sod_fin_test" class="btn_confirm">
                <input type="submit" value="입금통보 테스트" class="btn-e btn-e-xl btn-e-navy btn-e-block">
            </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<script>
$(function() {
    $("#state_explan_open").on("click", function() {
        var $explan = $("#state_explan_box");
        if($explan.is(":animated"))
            return false;

        if($explan.is(":visible")) {
            $explan.slideUp(200);
            $("#state_explan_open").text("상태설명보기");
        } else {
            $explan.slideDown(200);
            $("#state_explan_open").text("상태설명닫기");
        }
    });

    $("#state_explan_close").on("click", function() {
        var $explan = $("#state_explan_box");
        if($explan.is(":animated"))
            return false;

        $explan.slideUp(200);
        $("#state_explan_open").text("상태설명보기");
    });
});

function fcancel_check(f) {
    if(!confirm("주문을 정말 ยกเลิก하시겠습니까?"))
        return false;

    var memo = f.cancel_memo.value;
    if(memo == "") {
        alert("ยกเลิก사유를 입력해 주십시오.");
        return false;
    }

    return true;
}
</script>