<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

<header id="hd">
    <?php if ((!$bo_table || $w == 's' ) && defined('_INDEX_')) { ?><h1><?php echo $config['cf_title'] ?></h1><?php } ?>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>


    <div id="hd_wr">
        <div id="logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/mobile_logo_img" alt="<?php echo $config['cf_title']; ?> 메인"></a></div>
        <?php include_once(G5_THEME_MSHOP_PATH.'/category.php'); // 분류 ?>
             <div id="hd_sch">
                <button type="button" class="btn_close"><i class="fa fa-times"></i></button>
                <div class="hd_sch_wr">
                    <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">
                
                    <div class="sch_inner">
                        <h2>상품 검색</h2>
                        <label for="sch_str" class="sound_only">상품명<strong class="sound_only"> 필수</strong></label>
                        <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="sch_str" required placeholder="검색어를 입력해주세요">
                        <button type="submit"  class="sch_submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only"> 검색</span></button>
                    </div>
                    </form>
                     <?php
                    $save_file = G5_DATA_PATH.'/cache/theme/jelly/keyword.php';
                    if(is_file($save_file))
                        include($save_file);

                    if(!empty($keyword)) {
                    ?>
                    <div id="ppl_word">
                        <h3>인기검색어</h3>
                        <ol class="slides">
                        <?php
                        $seq = 1;
                        foreach($keyword as $word) {
                        ?>
                            <li><a href="<?php echo G5_SHOP_URL; ?>/search.php?q=<?php echo urlencode($word); ?>"><?php echo get_text($word); ?></a></li>
                        <?php
                            $seq++;
                        }
                        ?>
                        </ol>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div id="hd_btn">

                <button type="button" id="btn_cate"><i class="fa fa-bars"></i><span class="sound_only">분류열기</span></button>
                <button type="button" id="btn_sch"><i class="fa fa-search"></i><span class="sound_only">검색열기</span></button>
                <a href="<?php echo G5_SHOP_URL; ?>/cart.php" id="btn_cartop"><i class="fa fa-shopping-cart"></i><span class="sound_only">장바구니</span><span class="cart-count"><?php echo get_boxcart_datas_count(); ?></span></a>
            </div>
        </div>

        <script>
        function search_submit(f) {
            if (f.q.value.length < 2) {
                alert("검색어는 두글자 이상 입력하십시오.");
                f.q.select();
                f.q.focus();
                return false;
            }

            return true;
        }
        </script>
        
   </div>

    <?php if ($is_admin) { ?><div class="hd_admin"><a href="<?php echo G5_ADMIN_URL; ?>" target="_blank">관리자</a> <a href="<?php echo G5_THEME_ADM_URL ?>" target="_blank">테마관리</a></div> <?php } ?>
    <script>
    $( document ).ready( function() {
        var jbOffset = $( '#hd_wr' ).offset();
        $( window ).scroll( function() {
            if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '#hd_wr' ).addClass( 'fixed' );
            }
            else {
                $( '#hd_wr' ).removeClass( 'fixed' );
            }
        });
    });

    $("#btn_cate").on("click", function() {
        $("#category").show();
    });

    $(".menu_close").on("click", function() {
        $(".menu").hide();
    });
     $(".cate_bg").on("click", function() {
        $(".menu").hide();
    });

     $(".btn_ol").on("click", function() {
        $(".ol").show();
    });

     $(".ol .btn_close").on("click", function() {
        $(".ol").hide();
    });

    $("#btn_sch").on("click", function() {
        $("#hd_sch").show();
    });

     $("#hd_sch .btn_close").on("click", function() {
        $("#hd_sch").hide();
    });
   </script>
</header>

<div id="container" class="container">
    <?php if (!defined('_INDEX_')) { ?><h1 id="container_title"><?php echo $g5['title'] ?></h1><?php } ?>
