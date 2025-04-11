<?php
/**
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
 * Eyoom Admin Skin File
 * @file    ~/theme/THEME_NAME/skin/member/member_list.html.php
 */
//error_reporting( E_ALL );
//ini_set( "display_errors", 1 );
if (!defined('_EYOOM_IS_ADMIN_')) exit;

/**
 * 페이지 경로 설정
 */
$fm_pid = 'member_list';
$g5_title = '포인트정산관리';
$g5_page_path = '<li class="breadcrumb-item"><a href="'.correct_goto_url(G5_ADMIN_URL).'">Home</a></li><li class="breadcrumb-item active" aria-current="page">포인트정산</li><li class="breadcrumb-item active" aria-current="page">'.$g5_title.'</li>';
?>

<div class="admin-member-list">
    <div class="adm-headline">
        <h3>포인트정산</h3>
        <?php if (0) { //!$wmode) { ?>
        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=stock&pid=goods_delivery" class="btn-e btn-e-md btn-e-crimson adm-headline-btn m-l-5"><i class="las la-plus m-r-7"></i><span>월정산</span></a>
        <?php } ?>
        <?php if (0) { //$config['cf_admin'] == $member['mb_id'] && !$wmode) { ?>
        <div class="excel-download">
            <a href="javascript:void(0);" onclick="settle_excel_download();" class="btn-e btn-e-md btn-e-indigo adm-headline-btn">엑셀다운로드</a>
        </div>
        <?php } ?>
    </div>

    <form id="fsearch" name="fsearch" method="get" class="eyoom-form" onsubmit="fsearch_submit(this);">
    <input type="hidden" name="dir" value="<?php echo $dir; ?>" id="dir">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>" id="pid">
    <input type="hidden" name="sst" id="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" id="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="wmode" value="<?php echo $wmode; ?>">
    <input type="hidden" name="settleMode" id="settleMode" value="-">
    <input type="hidden" name="smode" value="">
    
    <?php if (G5_IS_MOBILE) { ?>
    <a class="collapse-search-btn btn-e btn-e-sm btn-e-dark m-b-20" data-bs-toggle="collapse" href="#collapse-search-box"><i class="fas fa-search m-r-7"></i><span>검색 조건 열기</span></a>
    <?php } ?>
    <div id="collapse-search-box" class="<?php if (G5_IS_MOBILE) { ?>panel-collapse collapse<?php } ?> m-b-20">
        <div class="adm-form-table adm-search-box m-b-20">
            
            <div class="adm-form-tr-wrap">
                <div class="adm-form-tr tr-r">
                    <div class="adm-form-td td-l">
                        <label class="label">정산기준</label>
                    </div>
                    <div class="adm-form-td td-r">
                        <div class="inline-group">
                            <span>
                                <label class="input max-width-150px">
                                    <input type="text" id="fr_date" name="fr_date" value="<?php echo $fr_date; ?>" maxlength="10" autocomplete="off">
                                </label>
                            </span>
                            <!--<span> - </span>
                            <span>
                                <label class="input max-width-150px">
                                    <input type="text" id="to_date" name="to_date" value="<?php echo $to_date; ?>" maxlength="10" autocomplete="off">
                                </label>
                            </span>-->
                            <span class="search-btns">
                                <!--<button type="button" onclick="javascript:set_date('이번달');" class="btn-e btn-e-xs btn-e-gray">이번달</button>
                                <button type="button" onclick="javascript:set_date('지난달');" class="btn-e btn-e-xs btn-e-gray">지난달</button>
                                <button type="button" onclick="javascript:set_date('올해');" class="btn-e btn-e-xs btn-e-gray">올해</button>
                                <button type="button" onclick="javascript:set_date('전체');" class="btn-e btn-e-xs btn-e-gray">전체</button>-->
                            </span>

                            <span class="search-btns" style="padding-left:30px;">
<?php echo $btn_submit; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="confirm-bottom-btn">
            <?php echo $frm_submit;?>
        </div>
    </div>

    </form>

    <form name="fpointlist" id="fpointlist" method="post" action="<?php echo $action_url1; ?>" onsubmit="return fpointlist_submit(this);" class="eyoom-form">
    <input type="hidden" name="sst" id="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" id="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="token" value="">

    <div class="m-b-5">
        <div class="float-start f-s-13r">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=<?php echo $dir; ?>&amp;pid=<?php echo $pid; ?>">[전체목록]</a><span class="m-l-10 m-r-10 text-light-gray">|</span>전체 <?php echo number_format($total_count); ?>건
            <!--<?php if (isset($mb['mb_id']) && $mb['mb_id']) { ?>
            <span class="m-l-7">(<?php echo $mb['mb_id']; ?> 님 포인트 합계 : <?php echo number_format($mb['mb_point']); ?>점)</span>
            <?php } else { ?>
            <span class="m-l-7">(전체 합계 <?php echo number_format($sum_point); ?>점)</span>
            <?php } ?>-->
        </div>
        <div class="float-end xs-float-start">
            <label for="sort_list" class="select width-200px">
                <select name="sort_list" id="sort_list" onchange="sorting_list(this.form, this.value);">
                    <option value="">:: 정렬방식선택 ::</option>
                    <option value="mb_id|asc" <?php if ($sst=='mb_id' && $sod=='asc') echo 'selected'; ?>>회원아이디 정방향 (↓)</option>
                    <option value="mb_id|desc" <?php if ($sst=='mb_id' && $sod=='desc') echo 'selected'; ?>>회원아이디 역방향 (↑)</option>
                    <option value="po_content|asc" <?php if ($sst=='po_content' && $sod=='asc') echo 'selected'; ?>>포인트 내용 정방향 (↓)</option>
                    <option value="po_content|desc" <?php if ($sst=='po_content' && $sod=='desc') echo 'selected'; ?>>포인트 내용 역방향 (↑)</option>
                    <option value="po_point|asc" <?php if ($sst=='po_point' && $sod=='asc') echo 'selected'; ?>>포인트 정방향 (↓)</option>
                    <option value="po_point|desc" <?php if ($sst=='po_point' && $sod=='desc') echo 'selected'; ?>>포인트 역방향 (↑)</option>
                    <option value="po_datetime|asc" <?php if ($sst=='po_datetime' && $sod=='asc') echo 'selected'; ?>>일시 정방향 (↓)</option>
                    <option value="po_datetime|desc" <?php if ($sst=='po_datetime' && $sod=='desc') echo 'selected'; ?>>일시 역방향 (↑)</option>
                </select><i></i>
            </label>
        </div>
        <div class="clearfix"></div>
    </div>

    <p class="text-end f-s-13r m-b-5 text-gray visible-xs">Note! 좌우 스크롤 (<i class="las la-arrows-alt-h"></i>)</p>

    <div class="table-list-eb">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="width-40px">
                            <label for="chkall" class="sound_only">전체선택</label>
                            <label class="checkbox adm-table-check"><input type="checkbox" name="chkall" id="chkall" value="1" onclick="check_all(this.form)"><i></i></label>
                        </th>
                        <th>회원아이디</th>
                        <th>이름</th>
                        <th>하위회원</th>
                        <th>포인트내용</th>
                        <th>포인트</th>
                        <th>일시</th>
                        <th>만료일</th>
                        <th>포인트합</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i<count((array)$list); $i++) { ?>
                    <tr>
                        <th>
                            <label class="checkbox adm-table-check">
                                <input type="checkbox" name="chk[]" id="chk_<?php echo $i; ?>" value="<?php echo $i; ?>"><i></i>
                            </label>
                            <input type="hidden" name="mb_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['mb_id']; ?>" id="mb_id_<?php echo $i; ?>">
                            <input type="hidden" name="po_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['po_id']; ?>" id="po_id_<?php echo $i; ?>">
                        </th>
                        <td><?php echo $list[$i]['mb_id']; ?></td>
                        <td><?php echo $list[$i]['mb_name']; ?></td>
                        <td><?php echo $list[$i]['mb_nick']; ?></td>
                        <td><?php if ($list[$i]['link']) { ?><a href="<?php echo get_eyoom_pretty_url($list[$i]['po_rel_table'],$list[$i]['po_rel_id']); ?>" target="_blank"><span><?php echo $list[$i]['po_content']; ?></span></a><?php } else { ?><span><?php echo $list[$i]['po_content']; ?></span><?php } ?></td>
                        <td><?php echo number_format($list[$i]['po_point']); ?></td>
                        <td><?php echo $list[$i]['po_datetime']; ?></td>
                        <td><?php echo $list[$i]['expire_date']; ?></td>
                        <td><?php echo number_format($list[$i]['po_mb_point']); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(count((array)$list) == 0) { ?>
                    <tr>
                        <td colspan="9" class="text-center text-light-gray"><i class="fas fa-exclamation-circle"></i> 출력할 내용이 없습니다.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-start">
        <input type="submit" name="act_button" value="선택삭제" class="btn-e btn-e-xs btn-e-dark" onclick="document.pressed=this.value">
    </div>

    </form>

    <?php /* 페이지 */ ?>
    <?php // echo eb_paging($eyoom['paging_skin']);?>

    <?php if (!$wmode) { ?>
    <div class="m-t-20">
        <div class="cont-text-bg">
            <p class="bg-info"><i class="fas fa-info-circle"></i>  .</p>
        </div>
    </div>
    <?php } ?>
</div>

<div class="modal fade admin-iframe-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-700">정보 수정</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <iframe id="modal-iframe" width="100%" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-e btn-e-lg btn-e-dark" data-bs-dismiss="modal">닫기<i class="fas fa-times m-l-5"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
function goSettleR() {
	$("#settleMode").val('R');
	if(confirm("재정산을 실행하시겠습니까?")) {
		$("#fsearch").submit();
	}
}

function goSettle() {
	$("#settleMode").val('X');
	if(confirm("정산을 실행하시겠습니까?")) {
		$("#fsearch").submit();
	}
}

function go(d) {
	$("#fr_date").val(d);
	$("#fsearch").submit();
}

<?php if (!$wmode) { ?>
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

window.closeModal = function(){
    $('.admin-iframe-modal').modal('hide');
};
<?php } ?>

$(document).ready(function(){

    $('#fr_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '◁',
        nextText: '▷',
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
        prevText: '◁',
        nextText: '▷',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#fr_date').datepicker('option', 'maxDate', selectedDate);
        }
    });

    <?php if ($wmode) { ?>
    $(".set_mbid").click(function() {
        var mb_id = $(this).attr('data-mb-id');
        $('#mb_id', parent.document).val(mb_id);
        window.parent.closeModal();
    });
    <?php } ?>
});

function sorting_list(f, str) {
    var sort = str.split('|');

    $("#sst").val(sort[0]);
    $("#sod").val(sort[1]);

    if (sort[0] && sort[1]) {
        f.action = "<?php echo G5_ADMIN_URL; ?>/?dir=<?php echo $dir; ?>&pid=<?php echo $pid; ?>";
        f.submit();
    }
}

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
        document.getElementById("fr_date").value = "<?php echo date('Y-m', G5_SERVER_TIME); ?>";
        //document.getElementById("to_date").value = "<?php echo date('Y-m', G5_SERVER_TIME); ?>";
 //   } else if (today == "이번달") {
 //       document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
 //       document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "지난달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m', strtotime('-1 Month', $last_term)); ?>";
        //document.getElementById("to_date").value = "<?php echo date('Y-m', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "올해") {
        document.getElementById("fr_date").value = "<?php echo date('Y-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-12', strtotime('-1 Month', $last_term)); ?>";
 //   } else if (today == "지난주") {
//        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
//        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
//    } else if (today == "지난달") {
//        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
//        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "전체") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}

function fsearch_submit (f) {
    f.dir.value = '<?php echo $dir; ?>';
    f.pid.value = '<?php echo $pid; ?>';
    f.smode.value = '';
    f.submit();
}

<?php if ($config['cf_admin'] == $member['mb_id']) { ?>
function member_excel_download() {
    f = document.fsearch;
    f.dir.value = 'member';
    f.pid.value = 'member_excel_download';
    f.smode.value = 1;
    f.submit();
}
<?php } ?>

<?php 	if($settleMode == 'R' || $settleMode == 'X') { ?>
	alert("정산(재정산)이 완료되었습니다!");
	$("#settleMode").val('');
        f.submit();
<?php 	} ?>
</script>