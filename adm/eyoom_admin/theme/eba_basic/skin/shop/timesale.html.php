<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/member/member_list.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

?>

<style>
.admin-member-list .new-member-photo {position:relative;overflow:hidden;width:26px;height:26px;border:1px solid #c5c5c5;background:#fff;padding:1px;margin:0 auto;text-align:center;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-member-list .new-member-photo i {width:22px;height:22px;font-size:12px;line-height:22px;background:#b5b5b5;color:#fff;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-member-list .new-member-photo img {-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.x-btn {float:right;padding:10px;margin-left:10px}
</style>

<div class="admin-member-list">
    <div class="adm-headline adm-headline-btn" style="overflow:hidden">
        <h3>타임어택</h3>
        <?php if (!$wmode) { ?>
		<div id="target_file_wrap">
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=timesale_add" class="btn-e btn-e-green x-btn"><i class="fas fa-plus"></i> 타임어택 등록</a>
        </div>
		<?php } ?>

    </div>

    <form id="fsearch" name="fsearch" method="get" class="eyoom-form">
    <input type="hidden" name="dir" value="<?php echo $dir; ?>" id="dir">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>" id="pid">
    <input type="hidden" name="sst" id="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" id="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="wmode" value="<?php echo $wmode; ?>">


    <?php if (G5_IS_MOBILE) { ?>
    <a class="collapse-search-btn btn-e btn-e-sm btn-e-dark m-b-20" data-bs-toggle="collapse" href="#collapse-search-box"><i class="fas fa-search m-r-7"></i><span>검색 조건 열기</span></a>
    <?php } ?>
    <div id="collapse-search-box" class="<?php if (G5_IS_MOBILE) { ?>panel-collapse collapse<?php } ?> m-b-20">
        <div class="adm-form-table adm-search-box m-b-20">
                    
					
			<div class="adm-form-tr">
                <div class="adm-form-td td-l">
                    <label for="od_settle_case" class="label">날짜검색</label>
                </div>
                <div class="adm-form-td td-r">
                        <div class="inline-group">
                            <span>
                                <label class="input max-width-150px">
                                    <input type="text" id="fr_date" name="fr_date" value="<?php echo $fr_date; ?>" maxlength="10" autocomplete="off">
                                </label>
                            </span>
                            <span> - </span>
                            <span>
                                <label class="input max-width-150px">
                                    <input type="text" id="to_date" name="to_date" value="<?php echo $to_date; ?>" maxlength="10" autocomplete="off">
                                </label>
                            </span>
                            <span class="search-btns">
                                <button type="button" onclick="javascript:set_date('오늘');" class="btn-e btn-e-xs btn-e-gray">오늘</button>
                                <button type="button" onclick="javascript:set_date('어제');" class="btn-e btn-e-xs btn-e-gray">어제</button>
                                <button type="button" onclick="javascript:set_date('이번주');" class="btn-e btn-e-xs btn-e-gray">이번주</button>
                                <button type="button" onclick="javascript:set_date('이번달');" class="btn-e btn-e-xs btn-e-gray">이번달</button>
                                <button type="button" onclick="javascript:set_date('지난주');" class="btn-e btn-e-xs btn-e-gray">지난주</button>
                                <button type="button" onclick="javascript:set_date('지난달');" class="btn-e btn-e-xs btn-e-gray">지난달</button>
                                <button type="button" onclick="javascript:set_date('전체');" class="btn-e btn-e-xs btn-e-gray">전체</button>
                            </span>
                        </div>
                </div>
            </div>
					
        </div>
        
        <div class="confirm-bottom-btn">
            <?php echo $frm_submit;?>
        </div>
    </div>


    <div class="m-b-5">
        <div class="float-start f-s-13r">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=<?php echo $dir; ?>&amp;pid=<?php echo $pid; ?>">[전체목록]</a><span class="m-l-10 m-r-10 text-light-gray">|</span>총회원수 <?php echo number_format($total_count); ?>명<?php if (!$wmode) { ?> 중, <a href="<?php echo G5_ADMIN_URL; ?>/?dir=member&amp;pid=member_list&amp;sst=mb_intercept_date&amp;sod=desc&amp;sfl=<?php echo $sfl; ?>&amp;stx=<?php echo $stx; ?>"><u>차단 <?php echo number_format($intercept_count); ?></u></a>명, <a href="<?php echo G5_ADMIN_URL; ?>/?dir=member&amp;pid=member_list&amp;sst=mb_leave_date&amp;sod=desc&amp;sfl=<?php echo $sfl; ?>&amp;stx=<?php echo $stx; ?>"><u>탈퇴 <?php echo number_format($leave_count); ?></u></a>명<?php } ?>
        </div>
        <div class="float-end xs-float-start">
            <label for="sort_list" class="select width-200px">
                <select name="sort_list" id="sort_list" onchange="sorting_list(this.form, this.value);">
                    <option value="">:: 정렬방식선택 ::</option>
                </select><i></i>
            </label>
        </div>
        <div class="clearfix"></div>
    </div>

    </form>
    <form name="fboardlist" id="fboardlist" action="<?php echo $action_url1; ?>" method="post" onsubmit="return fboardlist_submit(this);" class="eyoom-form">
    <input type="hidden" name="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="lev" value="<?php echo $lev; ?>">
    <input type="hidden" name="cert" value="<?php echo $cert; ?>">
    <input type="hidden" name="open" value="<?php echo $open; ?>">
    <input type="hidden" name="adt" value="<?php echo $adt; ?>">
    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
    <input type="hidden" name="sms" value="<?php echo $sms; ?>">
    <input type="hidden" name="sdt" value="<?php echo $sdt; ?>">
    <input type="hidden" name="fr_date" value="<?php echo $fr_date; ?>">
    <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <p class="text-end f-s-13r m-b-5 text-gray">Note! 좌우 스크롤 (<i class="las la-arrows-alt-h"></i>)</p>
    
    <div class="table-list-eb">
        <div class="table-responsive">
            <table class="table table-bordered">
				<tbody>
				<tr class="jsgrid-header-row">
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:60px;">No</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:300px;">제목</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:160px;">시작일시</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:160px;">종료일시</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:60px;">사용여부</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:80px;">등록상품</th>
					<th class="jsgrid-header-cell jsgrid-align-center" style="width:230px;">메모</th>
					<th class="jsgrid-header-cell set-btn-header jsgrid-align-center" style="width: 120px;">작업</th>
				</tr>
<?php
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list_num = $total_count - ($page - 1) * $rows - $i;
	$ts = sql_fetch("select count(*) as cnt from g5_timesale_items where ts_id='".$row['idx']."'");
?>

	<tr class="jsgrid-filter-row">
		<td class="jsgrid-cell jsgrid-align-right"><?=$list_num?></td>
		<td class="jsgrid-cell"><?=$row['ts_title']?></td>
		<td class="jsgrid-cell jsgrid-align-center "><?=$row['ts_start']?></td>
		<td class="jsgrid-cell jsgrid-align-center"><?=$row['ts_end']?></td>
		<td class="jsgrid-cell jsgrid-align-center"><?=($row['use_yn'])?"Y":"N"?></td>
		<td class="jsgrid-cell jsgrid-align-center"><?=$ts['cnt']?> <a href="javascript:;" onclick="return eb_modal2('<?=G5_URL?>/adm/?dir=shop&pid=timesale_items&ts_id=<?=$row['idx']?>&wmode=1','<?=G5_URL?>/adm/?dir=shop&pid=timesale_list&ts_id=<?=$row['idx']?>&wmode=1');return false;" class='btn-e btn-e-blue btn-e-xs'><u>관리</u></a></td>
		<td class="jsgrid-cell"><?=$row['ts_memo']?></td>
		<td class="jsgrid-cell set-btn-field jsgrid-align-center" style="width: 80px;">
			<a href='<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=timesale_add&w=u&idx=<?php echo $row['idx']; ?>&amp;w=u' class='btn-e btn-e-blue btn-e-xs'>수정</a>
			<a href='javascript:;' onClick="delete_ts('<?=$row['idx']?>');" class='btn-e btn-e-red btn-e-xs'>삭제</a>
		</td>
	</tr>
<?php
}

if($i == 0) echo "<tr><td colspan='8' style='height:50px;text-align:center;'>데이터가 없습니다.</td></tr>";
?>
</table>
	</div>

</div>
</div>


    </form>
</div>
<div class="margin-bottom-20"></div>

<div class="modal fade admin-iframe-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <!--button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button-->
                <h4 class="modal-title" style="color:#fff;">타임어택상품관리</h4>
            </div>
            <div class="modal-body">
                <div style="width:50%;float:left;background:#fafafa;border:1px solid #ddd">
					<iframe id="modal-iframe" width="100%" frameborder="0"></iframe>
				</div>
                <div style="width:50%;float:right;padding-left:15px;">
					<iframe id="modal-iframe2"  name="modaliframe2" width="100%" height="800" frameborder="0" src=""></iframe>
				</div>
            </div>
            <div class="modal-footer" style="clear:both">
                <button data-dismiss="modal" class="btn-e btn-e-lg btn-e-dark" type="button"><i class="fas fa-times"></i> 닫기</button>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/js/jsgrid.js"></script>
<script>
<?php if (!(G5_IS_MOBILE || $wmode)) { ?>
function eb_modal(href) {
    $('.admin-iframe-modal').modal('show').on('hidden.bs.modal', function () {
        $("#modal-iframe").attr("src", "");
        $('html').css({overflow: ''});
    });
    $('.admin-iframe-modal').modal('show').on('shown.bs.modal', function () {
        $("#modal-iframe").attr("src", href);
        $('#modal-iframe').height(parseInt($(window).height() * 0.85));
        $('html').css({overflow: 'hidden'});
    });
    return false;
}

function eb_modal2(href1,href2) {
    $('.admin-iframe-modal').modal('show').on('hidden.bs.modal', function () {
        $("#modal-iframe").attr("src", "");
        $('html').css({overflow: ''});
    });
    $('.admin-iframe-modal').modal('show').on('shown.bs.modal', function () {
        $("#modal-iframe").attr("src", href1);
        $('#modal-iframe').height(parseInt($(window).height() * 0.85));
        $("#modal-iframe2").attr("src", href2);
        $('#modal-iframe2').height(parseInt($(window).height() * 0.85));
        $('html').css({overflow: 'hidden'});
    });
    return false;
}

window.closeModal = function(){
    $('.admin-iframe-modal').modal('hide');
};
<?php } ?>

$(document).ready(function(){
    $('#fr_date').datepicker({
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
            $('#to_date').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#to_date').datepicker({
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

function set_date(today) {
    <?php
    $date_term = date('w', G5_SERVER_TIME);
    $week_term = $date_term + 7;
    $last_term = strtotime(date('Y-m-01', G5_SERVER_TIME));
    ?>
    if (today == "오늘") {
        document.getElementById("fr_date").value = "<?php echo G5_TIME_YMD; ?>";
        document.getElementById("to_date").value = "<?php echo G5_TIME_YMD; ?>";
    } else if (today == "어제") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
    } else if (today == "이번주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.($date_term + 6).' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "이번달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "지난주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
    } else if (today == "지난달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "전체") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}

    function delete_ts(fid) {
        if (confirm("자료를 정말 삭제하시겠습니까?")) {
            location.href = "<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=timesale_update&idx="+fid+"&w=d";
        }
    }
</script>
