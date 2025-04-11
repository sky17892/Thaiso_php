<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

// 관련상품 스킨은 사품을 한줄에 하나만 표시하며 해당 상품에 관련상품이 등록되어 있는 경우 기본으로 7개까지 노출합니다.
?>
<style type="text/css">
	.sct_40 .sct_img {
		text-align: center;
		float: left;
		margin-right: 20px;
		width: 70%;
	}
	.sct_40 .sct_ct_wrap {
		position: relative;
		width: 28%;
		float: right;
	}
	.hal {float:left;height:50px;background:#ff3300;padding:10px;color:#fff;position: relative; border-radius:10px;font-size:20px}
	.hal::after {
	  content: '';
	  position: absolute;
	  bottom: -10px; /* 화살표의 위치 조정 */
	  left: 50%; /* 가운데 정렬 */
	  transform: translateX(-50%); /* 정렬 보정 */
	  border-left: 10px solid transparent; /* 삼각형 왼쪽 */
	  border-right: 10px solid transparent; /* 삼각형 오른쪽 */
	  border-top: 10px solid #ff3300; /* 삼각형 위쪽 (배경색과 동일) */
	}
	.prs {font-size:15px;color:#555;font-weight:normal}
	.pbox{position:relative;text-align:right;font-size:28px;color:#ff3300;font-weight:bold;line-height:1em}
	.sct_basic{font-size:16px;font-weight:normal}
	.btn_s{width:370px;border:3px solid #ff3300;padding:10px;border-radius:80px;margin-top:80px;color:#ff3300;font-size:13pt}
	.pro_img{width:100%}

@media (max-width:500px) {
	.sct_40 .sct_txt {
		font-size: 12px;
		margin: 0px 0;
		padding-bottom: 0px;
	}
	.sct_40 .sct_img {
		text-align: center;
		float: left;
		margin-right: 10px;
		width: 55%;
	}
	.sct_40 .sct_ct_wrap {
		position: relative;
		width: 40%;
		float: right;
	}
	.sct_40 .sct_txt a {
		font-weight: 600;
		font-size: 10px;
		line-height: 1em;
	}
	.hal {float:left;height:20px;background:#ff3300;padding:5px;color:#fff;position: absolute; border-radius:10px;font-size:10px;left:0;top:15px}
	.hal::after {
	  content: '';
	  position: abspx; /* 화살표의 위치 조정 */
	  left: 50%; /olute;
	  bottom: -5* 가운데 정렬 */
	  transform: translateX(-50%); /* 정렬 보정 */
	  border-left: 5px solid transparent; /* 삼각형 왼쪽 */
	  border-right: 5px solid transparent; /* 삼각형 오른쪽 */
	  border-top: 10px solid #ff3300; /* 삼각형 위쪽 (배경색과 동일) */
	  display:none;
	}
	.prs {font-size:10px;color:#555;font-weight:normal}
	.pbox{position:relative;text-align:right;font-size:10px;color:#ff3300;font-weight:bold;line-height:1em}
	.sct_basic{font-size:10px;font-weight:normal}
    .btn_s {
        width: 100%;
        border: 1px solid #ff3300;
        padding: 1px;
        border-radius: 80px;
        margin-top: 10px;
        color: #ff3300;
        font-size: 9pt;
    }
	.pro_img{width:100%}
}
</style>
<!-- 상품진열 40 시작 { -->
<?php
$i = 0;

$this->view_star = (method_exists($this, 'view_star')) ? $this->view_star : true;

foreach((array) $list as $row){
    if( empty($row) ) continue;

    $item_link_href = shop_item_url($row['it_id']);     // 상품링크
    $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';     //사용자후기 평균별점
    $list_mod = $this->list_mod;    // 분류관리에서 1줄당 이미지 수 값 또는 파일에서 지정한 가로 수
    $is_soldout = is_soldout($row['it_id'], true);   // 품절인지 체크

    $classes = array();

    $classes[] = 'col-row-'.$list_mod;

    if( $i && ($i % $list_mod == 0) ){
        $classes[] = 'row-clear';
    }
    
    $i++;   // 변수 i 를 증가

    if ($i == 1) {
        if ($this->css) {
            echo "<ul class=\"{$this->css}\">\n";
        } else {
            echo "<ul class=\"sct sct_40\">\n";
        }
    }

    echo "<li class=\"sct_li ".implode(' ', $classes)."\" data-css=\"nocss\" style=\"height:auto\">\n";
	echo "<div class=\"sct_img\">\n";

    if ($this->href) {
        echo "<a href=\"{$item_link_href}\">\n";
    }

    if ($this->view_it_img) {
        //echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_img1']))."\n";
      echo "<img src=/data/item/";
      echo stripslashes($row['it_img2'])."\n";
      echo " class=pro_img>";
   }

    if ($this->href) {
        echo "</a>\n";
    }
    

	echo "<div class=\"cart-layer\"></div>\n";
	
	if ($this->view_it_icon) {
        // 품절
        if ($is_soldout) {
            echo '<span class="shop_icon_soldout"><span class="soldout_txt">SOLD OUT</span></span>';
        }
    }
    echo "</div>\n";
	
	echo "<div class=\"sct_ct_wrap\">\n";
    
	// 사용후기 평점표시
	if ($this->view_star && $star_score) {
        echo "<div class=\"sct_star\"><span class=\"sound_only\">고객평점</span><img src=\"".G5_SHOP_URL."/img/s_star".$star_score.".png\" alt=\"별점 ".$star_score."점\" class=\"sit_star\"></div>\n";
    }
	
    if ($this->view_it_id) {
        //echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
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

            echo "<div class=pbox>\n";

			if($row['it_cust_price'] > 0) $sale_per=ceil(((get_price($row)-$row['it_cust_price'])/$row['it_cust_price'])*100).'%'; else $sale_per="0%";
			if ($this->view_it_cust_price && $row['it_cust_price']) {
	        echo "<div class='hal'>$sale_per</div> <div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
			echo display_price(get_price($row), $row['it_tel_inq'])."\n";
			echo "<br><strike class=prs>".display_price($row['it_cust_price'])."</strike> \n";
            echo "</div>\n";
            echo "<a href=\"{$item_link_href}\">\n<button class=btn_s>상품상세보기</button></a>";
        }
        

} 
    echo "<div class=\"sct_bottom\" style=display:none>\n";

        if ($this->view_it_cust_price || $this->view_it_price) {

            echo "<div class=\"sct_cost\">\n";
            if ($this->view_it_price) {
                echo display_price(get_price($row), $row['it_tel_inq'])."\n";
            }
            if ($this->view_it_cust_price && $row['it_cust_price']) {
                echo "<span class=\"sct_dict\">".display_price($row['it_cust_price'])."</span>\n";
            }
            echo "</div>\n";
        }
        
        // 위시리스트 + 공유 버튼 시작
        echo "<div class=\"sct_op_btn\">\n";
        echo "<button type=\"button\" class=\"btn_wish\" data-it_id=\"{$row['it_id']}\"><span class=\"sound_only\">위시리스트</span><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i></button>\n";
        if ($this->view_sns) {
            echo "<button type=\"button\" class=\"btn_share\"><span class=\"sound_only\">공유하기</span><i class=\"fa fa-share-alt\" aria-hidden=\"true\"></i></button>\n";
        }
        
        echo "<div class=\"sct_sns_wrap\">";
        if ($this->view_sns) {
            $sns_top = $this->img_height + 10;
            $sns_url  = $item_link_href;
            $sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
            echo "<div class=\"sct_sns\">";
            echo "<h3>SNS 공유</h3>";
            echo get_sns_share_link('facebook', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/facebook.png');
            echo get_sns_share_link('twitter', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/twitter.png');
            echo "<button type=\"button\" class=\"sct_sns_cls\"><span class=\"sound_only\">닫기</span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></button>";
            echo "</div>\n";
        }
        echo "<div class=\"sct_sns_bg\"></div>";
        echo "</div></div>\n";
        // 위시리스트 + 공유 버튼 끝
	
    echo "</div>";

        if ($this->view_it_icon) {
            //echo "<div class=\"sit_icon_li\">".item_icon($row)."</div>\n";
        }

	echo "</div>\n";
	
    echo "</li>\n";
}

if ($i >= 1) echo "</ul>\n";

if ($i === 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>
<!-- } 상품진열 40 끝 -->

<script>
//SNS 공유
$(function (){
	$(".btn_share").on("click", function() {
		$(this).parent("div").children(".sct_sns_wrap").show();
	});
    $('.sct_sns_bg, .sct_sns_cls').click(function(){
        $('.sct_sns_wrap').hide();
	});
});			
</script>