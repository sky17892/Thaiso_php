<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
?>
<style>
	.smt_30 li {display:flex;border-bottom:1px solid #ddd}
	.smt_30 .sct_img {width:70%;height:auto;max-height:250px;overflow:hidden}
	.sct_cnt2{width:30%;float:left}
	.sct_txt{font-size:22pt}
	.sct_price {color:#ff3300;font-size:15pt !important}
	.sct_dict {color:#777;font-weight:normal;font-size:10pt}
	.smt_30 .sct_txt a {
		display: block;
		font-size: 1em;
		color: #000;
		max-height: 103px;
		overflow: visible;
		text-overflow: unset;
		list-style: none;
	}
	.sct_price_wrap{text-align:Right;line-height:1em;padding-top:10px}
	.sct_percent{background:#ff3300;color:#fff;position:relative;padding:5px 20px;border-radius:30px;float:left;margin-top:0px}

.btns {
    display: block;
    border: 2px solid #ff3300;
    color: #ff3300;
    background: #f1f1f1;
    margin: 10px 0px;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 12pt;
    width: 100%;
}
@media (max-width:420px) {
	.smt_30 li {display:flex}
	.smt_30 .sct_img {width:50%;height:auto;max-height:250px;overflow:hidden}
	.sct_cnt2{width:50%;float:left}
	.sct_txt{font-size:10pt}
	.sct_price {color:#ff3300;font-size:9pt !important}
	.sct_dict {color:#777;font-weight:normal;font-size:8pt;margin-top:-5px}
	.sct_percent{background:#ff3300;color:#fff;position:relative;padding:5px 20px;border-radius:30px;float:left;margin-top:0px;font-size:8pt}

.btns {
    display: block;
    border: 2px solid #ff3300;
    color: #ff3300;
    background: #f1f1f1;
    margin: 10px 0px;
    padding: 5px 20px;
    border-radius: 30px;
    font-size: 12pt;
    width: 100%;
}
}
</style>

<!-- 상품진열 50 시작 { -->
<?php
$i=0;
foreach((array) $list as $row){

    if( empty($row) ) continue;
    $i++;
    
    $item_link_href = shop_item_url($row['it_id']);
    $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';

    $sct_last = '';
    if($i>1 && $i%$this->list_mod == 0)
        $sct_last = ' sct_last'; // 줄 마지막
    if ($i == 1) {
        if ($this->css) {
            echo "<ul class=\"{$this->css}\">\n";
        } else {
            echo "<ul id=\"smt_{$this->type}\" class=\"smt_30\">\n";
        }
    }
    echo "<li class=\"sct_li sct_li_{$i}\">\n";
    if ($this->href) {
        echo "<div class=\"sct_img\"><a href=\"{$item_link_href}\">\n";
    }
    if ($this->view_it_img) {
        echo get_it_image2($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
    }
    if ($this->href) {
        echo "</a></div>\n";
    }
	
	
	echo "<div class=\"sct_cnt2\">\n"; 
	
	// 사용후기 평점표시
	if ($this->view_star && $star_score) {
        echo "<span class=\"sound_only\">고객평점</span><img src=\"".G5_SHOP_URL."/img/s_star".$star_score.".png\" alt=\"별 ".$star_score."개\" class=\"sit_star\" width=\"100\">\n";
    }
       
    if ($this->href) {
        echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\">\n";
    }
    if ($this->view_it_name) {
        echo stripslashes($row['it_name'])."\n";
    }
    if ($this->href) {
        echo "</a></div>\n";
    }
if ($this->view_it_cust_price || $this->view_it_price) {
    echo "<div class=\"sct_cost2\">\n";

    // 소비자가와 판매가가 모두 있는 경우
    if ($this->view_it_cust_price && $row['it_cust_price'] && $this->view_it_price) {
		$cust_price = (int)$row['it_cust_price'];
		$sale_price = (int)get_price($row);
		$discount_percent = round((($cust_price - $sale_price) / $cust_price) * 100);

		echo "<div class=\"sct_price_wrap\">\n";
		echo "<span class=\"sct_percent\">{$discount_percent}%</span>\n";
		echo "<span class=\"sct_price\"><b>".number_format($sale_price)."₩</b></span><br>\n";
		echo "<span class=\"sct_dict\"><s>".number_format($cust_price)."₩</s></span>\n";
		echo "<a href=\"{$item_link_href}\"><button class=\"btns\">ดูสินค้า</button></a>\n";
		echo "</div>\n";

    } else {
        // 단일 가격만 표시할 경우
        if ($this->view_it_cust_price && $row['it_cust_price']) {
            echo "<span class=\"sct_dict\">".display_price($row['it_cust_price'])."</span>\n";
        }
        if ($this->view_it_price) {
            echo "<span class=\"sct_price\">".display_price(get_price($row), $row['it_tel_inq'])."</span>\n";
        }
    }

    echo "</div>\n";
    }
	echo "</div>\n";
    echo "</li>\n";
}
if ($i >= 1) echo "</ul>\n";
if($i == 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>

<script>
$(document).ready(function(){
	$('.smt_30').bxSlider({
	    minSlides: 4,
	    maxSlides: 4,
	    mode: 'vertical',
	    pager:false
	});
});
</script>
<!-- } 상품진열 50 끝 -->