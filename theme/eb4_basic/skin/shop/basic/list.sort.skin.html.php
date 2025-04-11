<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/list.sort.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/sly/tab_scroll_category.css" type="text/css" media="screen">',0);
?>
<style type="text/css">
		#tab-category {display:block}
		#tab-category2 {display:none}
	@media (max-width:500px) {
		#tab-category {display:none}
		#tab-category2 {display:block}
	}
</style>
<div class="tab-scroll-category">
    <div class="scrollbar">
        <div class="handle">
            <div class="mousearea"></div>
        </div>
    </div>
    <div id="tab-category">
        <div class="category-list">
            <span <?php if ($_GET['sort'] == 'it_update_time' && $_GET['sortodr'] == 'desc') { ?>class="active"<?php } else if (!$_GET['sort']) { ?>class="active"<?php } ?>>
                <a href="<?php echo $sct_sort_href; ?>it_update_time&amp;sortodr=desc">เรียงตามลำดับการลงทะเบียนล่าสุด</a>
            </span>
            <span <?php echo $_GET['sort'] == 'it_sum_qty' && $_GET['sortodr'] == 'desc' ? 'class="active"':''; ?>>
                <a href="<?php echo $sct_sort_href; ?>it_sum_qty&amp;sortodr=desc">เรียงตามจำนวนการขายมากที่สุด</a>
            </span>
            <span <?php echo $_GET['sort'] == 'it_price' && $_GET['sortodr'] == 'asc' ? 'class="active"':''; ?>>
                <a href="<?php echo $sct_sort_href; ?>it_price&amp;sortodr=asc">เรียงตามราคาต่ำสุด</a>
            </span>
            <span <?php echo $_GET['sort'] == 'it_price' && $_GET['sortodr'] == 'desc' ? 'class="active"':''; ?>>
                <a href="<?php echo $sct_sort_href; ?>it_price&amp;sortodr=desc">เรียงตามราคาสูงสุด</a>
            </span>
            <span <?php echo $_GET['sort'] == 'it_use_avg' && $_GET['sortodr'] == 'desc' ? 'class="active"':''; ?>>
                <a href="<?php echo $sct_sort_href; ?>it_use_avg&amp;sortodr=desc">เรียงตามคะแนนสูงสุด</a>
            </span>
            <span <?php echo $_GET['sort'] == 'it_use_cnt' && $_GET['sortodr'] == 'desc' ? 'class="active"':''; ?>>
                <a href="<?php echo $sct_sort_href; ?>it_use_cnt&amp;sortodr=desc">เรียงตามจำนวนรีวิวมากที่สุด</a>
            </span>
            <span class="fake-span"></span>
        </div>
        <div class="controls">
            <button class="btn prev"><i class="fas fa-caret-left"></i></button>
            <button class="btn next"><i class="fas fa-caret-right"></i></button>
        </div>
    </div>
    <div class="tab-category-divider"></div>
</div>
<div id="tab-category2">
<select title="" onchange="window.open(value,'_self');" style="padding:10px;width:100%;margin-bottom:20px">
    <option value="<?php echo $sct_sort_href; ?>it_update_time&amp;sortodr=desc" selected>เรียงตามลำดับการลงทะเบียนล่าสุด</option>
    <option value="<?php echo $sct_sort_href; ?>it_sum_qty&amp;sortodr=desc">เรียงตามจำนวนการขายมากที่สุด</option>
    <option value="<?php echo $sct_sort_href; ?>it_price&amp;sortodr=asc">เรียงตามราคาต่ำสุด</option>
    <option value="<?php echo $sct_sort_href; ?>it_price&amp;sortodr=desc">เรียงตามราคาสูงสุด</option>
    <option value="<?php echo $sct_sort_href; ?>it_use_avg&amp;sortodr=desc">เรียงตามคะแนนสูงสุด</option>
    <option value="<?php echo $sct_sort_href; ?>it_use_cnt&amp;sortodr=desc">เรียงตามจำนวนรีวิวมากที่สุด</option>
</select>
</div>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sly/vendor_plugins.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sly/sly.min.js"></script>
<script>
$(function() {
    var $frame = $('#tab-category');
    var $wrap  = $frame.parent();
    $frame.sly({
        horizontal: 1,
        itemNav: 'centered',
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        scrollBar: $wrap.find('.scrollbar'),
        scrollBy: 1,
        startAt: $frame.find('.active'),
        speed: 300,
        elasticBounds: 1,
        easing: 'easeOutExpo',
        dragHandle: 1,
        dynamicHandle: 1,
        clickBar: 1,
        prevPage: $wrap.find('.prev'),
        nextPage: $wrap.find('.next')
    });
    var tabWidth = $('#tab-category').width();
    var categoryWidth = $('.category-list').width();
    if (tabWidth < categoryWidth) {
        $('.controls').show();
    }
});
</script>