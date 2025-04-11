<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/list.30.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
.product-list-10 {margin-left:-10px;margin-right:-10px;font-size:.9375rem}
.product-list-10:after {content:"";display:block;clear:both}
.product-list-10 .item-list-wrap {padding:10px;width:20%;float:left}
.product-list-10 .item-list-wrap:nth-child(5n+1) {clear:left}
.product-list-10 .item-list {position:relative;-webkit-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out}
.product-list-10 .product-img {position:relative;overflow:hidden;border-radius:7px;margin-bottom:10px;background:#fff}
.product-list-10 .product-img-in {position:relative;overflow:hidden;width:100%}
.product-list-10 .product-img-in:before {content:"";display:block;padding-top:100%;background:#fff}
.product-list-10 .product-img-in .first-img {display:block}
.product-list-10 .product-img-in .second-img {display:none}
.product-list-10 .item-list:hover {border-color:#757575}
.product-list-10 .item-list:hover .product-img-in .second-img {display:block}
.product-list-10 .product-img-in img {display:block;max-width:100%;height:auto;position:absolute;top:0;left:0;right:0;bottom:0}
.product-list-10 .product-img-in .discount-percent {position:absolute;top:-40px;left:-40px;width:80px;height:80px;padding-top:57px;text-align:center;background:#ab0000;color:#fff;font-style:italic;font-size:.75rem;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);transform:rotate(-45deg)}
.product-list-10 .product-description .product-description-in {position:relative;overflow:hidden;padding:0 0 10px}
.product-list-10 .product-description .product-name {position:relative;overflow:hidden;margin:10px 0 5px;font-size:1.125rem;font-weight:700;line-height:1.4;height:48px}
.product-list-10 .product-description .product-name a {color:#000}
.product-list-10 .product-description .product-name a:hover {text-decoration:underline}
.product-list-10 .product-description .title-price {font-size:1.125rem;font-weight:700;color:#ab0000}
.product-list-10 .product-description .line-through {font-size:.9375rem;color:#959595;text-decoration:line-through;margin-left:7px;font-weight:400}
.product-list-10 .product-description .product-id {color:#757575;display:block;font-size:.8125rem;margin-top:10px}
.product-list-10 .product-description .product-info {position:relative;overflow:hidden;height:38px;color:#959595;font-size:.8125rem;margin-top:10px}
.product-list-10 .product-description .product-sns {position:relative;height:30px;margin-top:10px}
.product-list-10 .product-description .product-sns ul {position:absolute;top:0;right:0;margin:0;padding:0;list-style:none}
.product-list-10 .product-description .product-sns ul:after {content:"";display:block;clear:both}
.product-list-10 .product-description .product-sns ul li {float:left;margin-left:1px}
.product-list-10 .product-description .product-sns ul li a {display:block;width:28px;height:28px;display:flex;align-items:center;justify-content:center;background:#a5a5a5}
.product-list-10 .product-description .product-sns ul li img {width:12px;height:12px}
.product-list-10 .product-description .product-sns ul li:hover .wish-icon {background:#ab0000}
.product-list-10 .product-description .product-sns ul li:hover .facebook-icon {background:#39558f}
.product-list-10 .product-description .product-sns ul li:hover .twitter-icon {background:#252525}
.product-list-10 .product-description-bottom {position:relative;overflow:hidden;padding:10px 0;border-top:1px solid #e5e5e5}
.product-list-10 .product-description-bottom a:hover {text-decoration:underline;color:#000}
.product-list-10 .product-ratings {width:75px;margin:0;padding:0}
.product-list-10 .product-ratings li {padding:0;float:left;margin-right:0}
.product-list-10 .product-ratings li .rating {color:#a5a5a5;font-size:.8125rem;line-height:normal}
.product-list-10 .product-ratings li .rating-selected {color:#ab0000;font-size:.8125rem}
.product-list-10 .shop-rgba-red {background:#ab0000}
.product-list-10 .shop-rgba-yellow {background:#ff9500}
.product-list-10 .shop-rgba-green {background:#00897b}
.product-list-10 .shop-rgba-purple {background:#8e24aa}
.product-list-10 .shop-rgba-orange {background:#f4511e}
.product-list-10 .shop-rgba-dark {background:#3c3c3e}
.product-list-10 .shop-rgba-default {background:#A6A6A6}
.product-list-10 .rgba-banner-area {position:absolute;top:0;right:0}
.product-list-10 .rgba-banner {height:18px;width:70px;line-height:18px;color:#fff;font-size:.6875rem;text-align:center;font-weight:400;position:relative;text-transform:uppercase;margin-bottom:1px}
.product-list-10 .item-list:hover .product-name a {text-decoration:underline}
.product-type-list .product-list-10 .item-list-wrap {width:50%}
.product-type-list .product-list-10 .item-list-wrap:nth-child(5n+1) {clear:none}
.product-type-list .product-list-10 .item-list-wrap:nth-child(2n+1) {clear:left}
.product-type-list .product-list-10 .product-img {position:absolute;top:0;left:0;overflow:hidden;background:#fff;width:180px}
.product-type-list .product-list-10 .product-description {margin-left:195px;min-height:195px}
@media (max-width:1399px) {
    .product-list-10 .item-list-wrap {width:25%}
    .product-list-10 .item-list-wrap:nth-child(5n+1) {clear:none}
    .product-list-10 .item-list-wrap:nth-child(4n+1) {clear:left}
}
@media (max-width:1199px) {
    .product-list-10 {margin-left:-5px;margin-right:-5px}
    .product-list-10 .item-list-wrap {padding:10px 5px}
}
@media (max-width:991px) {
    .product-list-10 .item-list-wrap {width:33.33333%}
    .product-list-10 .item-list-wrap:nth-child(4n+1) {clear:none}
    .product-list-10 .item-list-wrap:nth-child(3n+1) {clear:left}
    .product-type-list .product-list-10 .item-list-wrap {width:100%;padding:10px 5px}
}
@media (max-width:767px) {
    .product-list-10 {margin-left:-2px;margin-right:-2px}
    .product-list-10 .item-list-wrap {width:50%;padding:10px 2px}
    .product-list-10 .item-list-wrap:nth-child(3n+1) {clear:none}
    .product-list-10 .item-list-wrap:nth-child(2n+1) {clear:left}
    .product-type-list .product-list-10 .item-list-wrap {width:100%;padding:10px 2px}
}
@media (max-width:500px) {
    .product-type-list .product-list-10 .product-img {position:relative;top:inherit;left:inherit;overflow:hidden;background:#fff;width:inherit}
    .product-type-list .product-list-10 .product-description {margin-left:0;min-height:inherit}
}
</style>


<div class="product-list-10">
    <?php for ($i=0; $i<count((array)$list); $i++) { ?>
    <div class="item-list-wrap">
        <div class="item-list">
            <?php if ($list[$i]['href']) { ?>
            <a href="<?php echo $list[$i]['href']; ?>">
            <?php } ?>
                <div class="product-img">
                    <div class="product-img-in">
                        <div class="first-img">
                            <?php echo $list[$i]['it_image']; ?>
                        </div>
                        <?php if ($list[$i]['it_image2']) { ?>
                        <div class="second-img">
                            <?php echo $list[$i]['it_image2']; ?>
                        </div>
                        <?php } ?>
                        <?php if ($this->view_it_icon) { ?>
                        <?php echo $list[$i]['it_icon']; ?>
                        <?php } ?>
                        <?php if($list[$i]['dc_ratio']) { ?>
                        <div class="discount-percent"><?php echo $list[$i]['dc_ratio']; ?>%</div>
                        <?php } ?>
                    </div>
                </div>
            <?php if ($list[$i]['href']) { ?>
            </a>
            <?php } ?>

            <div class="product-description">
                <div class="product-description-in">
                    <h5 class="product-name">
                        <?php if ($list[$i]['href']) { ?>
                        <a href="<?php echo $list[$i]['href']; ?>">
                        <?php } ?>
                        <?php if ($this->view_it_name) { echo stripslashes($list[$i]['it_name']); } ?>
                        <?php if ($list[$i]['href']) { ?>
                        </a>
                        <?php } ?>
                    </h5>

                    <?php if ($this->view_it_cust_price || $this->view_it_price) { ?>
                    <div class="product-price">
                        <?php if ($this->view_it_price) { ?>
                        <span class="title-price">₩ <?php echo $list[$i]['it_tel_inq']; ?></span>
                        <?php } ?>
                        <?php if ($this->view_it_cust_price && $list[$i]['it_cust_price']) { ?>
                        <span class="title-price line-through">₩ <?php echo $list[$i]['it_cust_price']; ?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <?php if ($this->view_it_id) { ?>
                    <span class="product-id"><?php echo stripslashes($list[$i]['it_id']); ?></span>
                    <?php } ?>

                    <?php if ($this->view_it_basic) { ?>
                    <div class="product-info"><?php echo stripslashes($list[$i]['it_basic']); ?></div>
                    <?php } ?>

                    <?php if ($this->view_sns) { ?>
                    <div class="product-sns">
                        <ul>
                            <li><a href="javascript:void(0);" class="wish-icon" onclick="item_wish_for_list(<?php echo $list[$i]['it_id']; ?>);" title="위시리스트"><img src="<?php echo EYOOM_THEME_URL; ?>/image/social/heart-regular.svg" alt=""></a></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $list[$i]['sns_url']; ?>&amp;p=<?php echo $list[$i]['sns_title']; ?>" target="_blank" class="facebook-icon" title="페이스북"><img src="<?php echo EYOOM_THEME_URL; ?>/image/social/facebook-f.svg" alt=""></a></li>
                            <li><a href="https://twitter.com/share?url=<?php echo $list[$i]['sns_url']; ?>&amp;text=<?php echo $list[$i]['sns_title']; ?>" target="_blank" class="twitter-icon" title="엑스(트위터)"><img src="<?php echo EYOOM_THEME_URL; ?>/image/social/x-twitter.svg" alt=""></a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="product-description-bottom">
                <a class="float-start" href="<?php echo G5_SHOP_URL; ?>/itemuselist.php?sfl=a.it_id&stx=<?php echo $list[$i]['it_id']; ?>">리뷰보기</a>
                <ul class="list-inline product-ratings float-end">
                    <li><i class="rating<?php if ($list[$i]['star_score'] > 0) { ?>-selected fas fa-star<?php } else { ?> far fa-star<?php } ?>"></i></li>
                    <li><i class="rating<?php if ($list[$i]['star_score'] > 1) { ?>-selected fas fa-star<?php } else { ?> far fa-star<?php } ?>"></i></li>
                    <li><i class="rating<?php if ($list[$i]['star_score'] > 2) { ?>-selected fas fa-star<?php } else { ?> far fa-star<?php } ?>"></i></li>
                    <li><i class="rating<?php if ($list[$i]['star_score'] > 3) { ?>-selected fas fa-star<?php } else { ?> far fa-star<?php } ?>"></i></li>
                    <li><i class="rating<?php if ($list[$i]['star_score'] > 4) { ?>-selected fas fa-star<?php } else { ?> far fa-star<?php } ?>"></i></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
            <div class="adm-edit-btn btn-edit-mode" style="bottom:0">
                <div class="btn-group">
                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemform&w=u&it_id=<?php echo $list[$i]['it_id']; ?>&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l ae-item-btn"><i class="far fa-edit"></i> 개별상품 설정</a>
                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemform&w=u&it_id=<?php echo $list[$i]['it_id']; ?>" target="_blank" class="ae-btn-r" title="새창 열기">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <?php if (count((array)$list) == 0) { ?>
    <p class="text-center text-gray m-t-100 m-b-100"><i class="fa fa-exclamation-circle"></i> ไม่มีสินค้าในระบบ</p>
    <?php } ?>
</div>