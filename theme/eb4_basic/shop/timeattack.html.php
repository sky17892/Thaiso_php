<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/member/member_list.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid-theme.min.css" type="text/css" media="screen">',0);
?>

<style>
.admin-member-list .new-member-photo {position:relative;overflow:hidden;width:26px;height:26px;border:1px solid #c5c5c5;background:#fff;padding:1px;margin:0 auto;text-align:center;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-member-list .new-member-photo i {width:22px;height:22px;font-size:12px;line-height:22px;background:#b5b5b5;color:#fff;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-member-list .new-member-photo img {-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.btn-ex {float:right;padding:10px;margin-left:10px}

</style>
<div class="admin-member-list">
    <div class="adm-headline adm-headline-btn" style="overflow:hidden">
        <h3>�߰��Ȼ�ǰ</h3>
        <?php if (!$wmode) { ?>
		<div id="target_file_wrap">
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=manage&pid=car_form" class="btn-e btn-e-red "><i class="fas fa-plus"></i> ��ü����</a>
        </div>
		<?php } ?>
    </div>
    <?php if (G5_IS_MOBILE) { ?>
    <p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! �¿콺ũ�� ���� (<i class="fas fa-arrows-alt-h"></i>)</p>
    <?php } ?>

    <div id="member-list"></div>

    <?php if (!$wmode) { ?>
    <div class="margin-top-20">
    </div>
    <?php } ?>
</div>

<?php /* ������ */ ?>
<?php echo eb_paging($eyoom['paging_skin']);?>
<div class="margin-bottom-20"></div>

<div class="modal fade admin-iframe-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">��</button>
                <h4 class="modal-title">��ǰ����</h4>
            </div>
            <div class="modal-body">
                <iframe id="modal-iframe" width="100%" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn-e btn-e-lg btn-e-dark" type="button"><i class="fas fa-times"></i> �ݱ�</button>
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
        monthNames: ['�� 1��','�� 2��','�� 3��','�� 4��','�� 5��','�� 6��','�� 7��','�� 8��','�� 9��','�� 10��','�� 11��','�� 12��'],
        monthNamesShort: ['1��','2��','3��','4��','5��','6��','7��','8��','9��','10��','11��','12��'],
        dayNamesMin: ['��','��','ȭ','��','��','��','��'],
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
        monthNames: ['�� 1��','�� 2��','�� 3��','�� 4��','�� 5��','�� 6��','�� 7��','�� 8��','�� 9��','�� 10��','�� 11��','�� 12��'],
        monthNamesShort: ['1��','2��','3��','4��','5��','6��','7��','8��','9��','10��','11��','12��'],
        dayNamesMin: ['��','��','ȭ','��','��','��','��'],
        onSelect: function(selectedDate){
            $('#fr_date').datepicker('option', 'maxDate', selectedDate);
        }
    });
});

!function () {
    var db = {
        deleteItem: function (deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1)
        },
        insertItem: function (insertingClient) {
            this.clients.push(insertingClient)
        },
        loadData  : function (filter) {
            return $.grep(this.clients, function (client) {
                return !(filter.üũ && !(client.üũ.indexOf(filter.üũ) > -1) || filter.���̵� && !(client.���̵�.indexOf(filter.���̵�) > -1) || filter.�̸� && !(client.�̸�.indexOf(filter.�̸�) > -1) )
            })
        },
        updateItem: function (updatingClient) {}
    };

// ��ȣ	�̹���	���	���з�	������	��ǰ��	��ǰ��	��Ż��	�Ⱓ	�����	��Ÿ�ȳ�

    window.db    = db,
    db.clients   = [
        <?php for ($i=0; $i<count((array)$list); $i++) { ?>
        {
            �̹���: "<?php echo $list[$i]['image']; ?>",
            
            ��ǰ: "<?php echo $list[$i]['ca_name']; ?> <?php echo ($list[$i]['it_name']); ?> ",
            ����: "<?php echo number_format($list[$i]['stock']); ?>���� ",
            
            �۾�: "<?php echo $list[$i]['btn_add_timesale']; ?>",
        },
        <?php } ?>
    ]
}();

$(function() {
    $("#member-list").jsGrid({
        filtering      : false,
        editing        : false,
        sorting        : false,
        paging         : true,
        autoload       : true,
        controller     : db,
        deleteConfirm  : "������ �����Ͻðڽ��ϱ�?\n�ѹ� ������ �����ʹ� �����Ҽ� �����ϴ�.",
        pageButtonCount: 5,
        pageSize       : <?php echo $config['cf_page_rows']; ?>,
        width          : "100%",
        height         : "auto",
        fields         : [
            { name: "�̹���", type: "text", align: "center", width: 120 },
            { name: "��ǰ", type: "text", align: "center", width: 100 },
            { name: "����", type: "text", align: "center", width: 80 },
            
            { name: "�۾�", type: "text", align: "left", width: 80 },
        ]
    });

    var $chk = $(".jsgrid-table th:first-child");
    if ($chk.text() == 'üũ') {
        var html = '<label for="chkall" class="checkbox"><input type="checkbox" name="chkall" id="chkall" value="1" onclick="check_all(this.form)"><i></i></label>';
        $chk.html(html);
    }

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
    if (today == "����") {
        document.getElementById("fr_date").value = "<?php echo G5_TIME_YMD; ?>";
        document.getElementById("to_date").value = "<?php echo G5_TIME_YMD; ?>";
    } else if (today == "����") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
    } else if (today == "�̹���") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.($date_term + 6).' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "�̹���") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "������") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
    } else if (today == "������") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "��ü") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}

    function delete_ts(it_id) {
        //if (confirm("�ڷḦ ���� �����Ͻðڽ��ϱ�?")) {
            location.href = "<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=timesale_update&it_id="+it_id+"&idx=<?php echo $ts_id?>&w=dc";
       // }
    }
</script>

    <?php /* ---------- ���λ�ǰ ���� ---------- */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="adm-edit-btn btn-edit-mode" style="margin-top:-25px;display:none">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> ������ ��ǰ���� ����</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="ae-btn-r" title="��â ����">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    <?php } ?>

    <?php if($default['de_type5_list_use']) { ?>
    <section style="display:none">
        <div class="main-heading">
            <h2><a href="<?php echo shop_type_url(5); ?>"><strong>???????????????????????????????</strong></a></h2>
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
    <?php /* ---------- ���λ�ǰ �� ---------- */ ?>