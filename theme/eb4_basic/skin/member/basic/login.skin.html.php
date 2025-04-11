<?php
/**
 * skin file : /theme/THEME_NAME/skin/member/basic/login.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/perfect-scrollbar/perfect-scrollbar.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/sweetalert2/sweetalert2.min.css" type="text/css" media="screen">',0);
?>

<style>
.eb-login .login-btn {text-align:center;position:relative;overflow:hidden;width:100%;padding:0}
.eb-login .login-btn .btn-e-lg {width:100%;padding:10px 0;border-radius:5px !important;font-weight:bold;font-size:1rem;background:#2d2d38}
.eb-login .login-btn .btn-e-lg:hover {background:#43434d;border:1px solid #43434d}
.login-box {position:relative;padding:30px 20px}
.login-box a:hover {text-decoration:underline}
.login-box .login-box-in {margin:0 auto;width:500px;height:auto;padding:0}
.login-box .login-box-in .login-form {padding:30px 50px;color:#171C29}
.login-box .login-box-in .login-form-margin-bottom {margin-bottom:20px}
.login-box .login-box-in .login-form h1 {font-size:30px;font-weight:700;text-align:center;margin:0 0 30px}
.login-box .login-box-in .login-form .input input::placeholder {color:#b5b5b5}
.login-box .login-box-in .login-form .input .pv-icon {position:absolute;top:8px;right:45px;cursor:pointer}
.login-box .login-box-in .login-form .input .pv-icon.is-active i {display:none}
.login-box .login-box-in .login-form .input .pv-icon.is-active:after {font-family:'Font Awesome\ 5 Free';content:"\f070";font-weight:900}
.login-box .login-box-in .login-link {text-align:right}
.login-box .login-box-in .login-link a {font-size:.9375rem}
.login-box .login-box-in .login-link a:hover {text-decoration:underline;color:#000}
.login-box .login-box-in .login-link a:before {content:"|";margin-left:7px;margin-right:7px;color:#d5d5d5}
.login-box .login-box-in .login-link a:first-child:before {display:none}
.login-box .login-box-in #sns_login h5 {text-align:center;color:#353535;font-size:.9375rem;margin-bottom:15px}
.login-box .login-box-in .non-members {padding:30px 50px;color:#171C29}
.login-box .login-box-in .non-members .scroll-box-login {position:relative;overflow:hidden;border:1px solid #b5b5b5;padding:10px;height:150px}
.login-box .login-box-in .non-member-order {padding:30px 50px;color:#171C29}
.eyoom-form .btn-e {box-sizing:border-box;-moz-box-sizing:border-box}
@media (max-width: 991px) {
    .login-box .login-box-in .login-form {padding:30px 50px}
    .login-box .login-box-in .non-members {padding:30px 50px}
    .login-box .login-box-in .non-member-order {padding:90px 60px}
}
@media (max-width: 767px) {
    .login-box .login-box-in {height:auto}
    .login-box .login-box-in .login-form {padding:30px 20px;margin-right:0}
    .login-box .login-box-in .login-form-margin-bottom {margin-bottom:10px}
    .login-box .login-box-in .login-form h1 {font-size:30px}
    .login-box .login-box-in .login-sidebar {display:none}
    .login-box .login-box-in .non-members {padding:30px 20px}
    .login-box .login-box-in .non-member-order {padding:40px 20px}
}
@media (max-width: 576px) {
    .login-box {width:100%}
    .login-box .login-box-in {width:100%}
}
</style>

<div class="eb-login">
    <div class="login-content">
        <div class="login-box">
            <div class="login-box-in">
                <div class="login-form">
                    <h1>เข้าสู่ระบบ</h1>
                    <form name="flogin" action="<?php echo $login_action_url;?>" onsubmit="return flogin_submit(this);" method="post" class="eyoom-form">
                    <input type="hidden" name="url" value='<?php echo $login_url; ?>'>
                    <section>
                        <label for="mb_id" class="label">รหัส</label>
                        <label class="input">
                            <i class="icon-append fas fa-user"></i>
                            <input type="text" class="form-control" id="mb_id" name="mb_id" placeholder="ID" required class="frm_input required" size="20" maxLength="20">
                        </label>
                    </section>
                    <div class="login-form-margin-bottom"></div>
                    <section>
                        <label for="mb_password" class="label">รหัสผ่าน</label>
                        <label class="input">
                            <i class="icon-append fas fa-lock"></i>
                            <input type="password" class="form-control" id="mb_password" name="mb_password" placeholder="Password" required class="frm_input required" size="20" maxLength="20">
                            <span class="pv-icon" data-toggle="password" data-target="#mb_password" data-class-active="is-active"><i class="fas fa-eye"></i></span>
                        </label>
                    </section>
                    <div class="login-form-margin-bottom"></div>
                    <label class="checkbox">
                        <input type="checkbox" name="auto_login" id="login_auto_login"><i></i>เข้าสู่ระบบอัตโนมัติ
                    </label>
                    <div class="m-b-20"></div>
                    <div class="login-link m-b-10">
                        <a href="<?php echo G5_BBS_URL; ?>/register.php">สมัครสมาชิก</a>
                        <a href="<?php echo G5_BBS_URL; ?>/password_lost.php?wmode=1" id="ol_password_lost">ค้นหาบัญชีผู้ใช้/รหัสผ่าน</a>
                    </div>
                    <div class="login-btn">
                        <button type="submit" value="เข้าสู่ระบบ" class="btn-e btn-e-dark btn-e-lg btn-block">เข้าสู่ระบบ</button>
                    </div>

                    <?php
                    // 소셜로그인 사용시 소셜로그인 버튼
                    @include_once($eyoom_skin_path['member'].'/social_login.skin.html.php');
                    ?>

                    <div class="text-center m-t-20">
                        <a href="<?php echo G5_URL; ?>">กลับสู่หน้าหลัก</a>
                    </div>
                    </form>
                </div>
            </div>

            <?php /* 쇼핑몰 비회원 구매 시작 */ ?>
            <?php if (isset($default['de_level_sell']) && $default['de_level_sell'] == 1) { ///#1) ?>

            <?php if (preg_match('/orderform.php/',$url)) { ///#2) ?>
            <div class="m-b-30"></div>
            <div class="login-box-in">
                <div class="non-members">
                    <div class="text-center m-b-30"><h4><strong>สั่งซื้อโดยไม่เป็นสมาชิก</strong></h4></div>
                    <div class="cont-text-bg m-b-20">
                        <p class="bg-info f-s-13r"><i class="fas fa-exclamation-circle"></i> หากสั่งซื้อโดยไม่เป็นสมาชิก จะไม่ได้รับคะแนนสะสม</p>
                    </div>

                    <div id="scrollbar" class="scroll-box-login m-b-10">
                      <textarea style="width:100%;border:0px;height:100%">บทที่ 1: กฎทั่วไป
บทที่ 2: สัญญาบริการ
บทที่ 3: หน้าที่ของฝ่ายที่ทำสัญญา
บทที่ 4: การใช้บริการ.
บทที่ 5 การยกเลิกสัญญาและการจำกัดการใช้งาน
บทที่ 6: อื่น ๆ

บทที่ 1 กฎทั่วไป

มาตรา 1 (วัตถุประสงค์)


ข้อกำหนดและเงื่อนไขนี้มีวัตถุประสงค์เพื่อกำหนดเงื่อนไขและขั้นตอนที่เกี่ยวข้องกับบริการทั้งหมด (ต่อไปนี้เรียกว่า "บริการ") ที่จัดหาโดยเว็บไซต์นี้ (ต่อไปนี้เรียกว่า "บริษัท")

มาตรา 2 (นิยาม)


คำจำกัดความของคำศัพท์ที่ใช้ในเงื่อนไขและเงื่อนไขนี้มีดังต่อไปนี้
1. ผู้ใช้: ผู้รับบริการของบริษัทตามเงื่อนไขและเงื่อนไขนี้
2. สัญญาการใช้บริการ : สัญญาที่ทำขึ้นระหว่างบริษัทและผู้ใช้บริการเกี่ยวกับการใช้บริการ
3. การสมัครสมาชิก : กรอกข้อมูลในแบบฟอร์มใบสมัครที่บริษัทจัดหาให้ และเสร็จสิ้นสัญญาบริการโดยยินยอมตามเงื่อนไขและเงื่อนไขนี้
4. สมาชิก : ผู้ที่ลงทะเบียนเป็นสมาชิกโดยให้ข้อมูลส่วนบุคคลที่จำเป็นสำหรับการสมัครสมาชิกในเว็บไซต์ของตน
5. หมายเลขผู้ใช้ (ID) : การรวมตัวอักษรและตัวเลขที่ผู้ใช้เลือกและได้รับการอนุมัติจากบริษัทเพื่อระบุสมาชิกและใช้บริการของสมาชิก (สามารถออก ID ได้เพียง 1 ID ในเลขประจำตัวประชาชน 1 ตัวเท่านั้น)
6. รหัสผ่าน (PASSWORD) : การรวมตัวอักษรและตัวเลขและตัวอักษรพิเศษที่กำหนดโดยผู้ใช้เองเพื่อปกป้องข้อมูลของสมาชิก
7. การใช้สอย : แสดงเจตนาที่จะยกเลิกสัญญาการใช้บริการหลังบริษัทหรือสมาชิกใช้บริการแล้ว

มาตรา 3 (มีผลบังคับและเปลี่ยนแปลงตามเงื่อนไข)


สมาชิกอาจขอถอนตัว (ยกเลิก) หากไม่เห็นด้วยกับเงื่อนไขที่เปลี่ยนแปลง และหากยังคงใช้บริการต่อไปโดยไม่แสดงเจตนาปฏิเสธแม้หลังจาก 7 วันนับจากวันที่เงื่อนไขที่เปลี่ยนแปลงมีผลบังคับใช้ ก็ถือว่าเห็นด้วยกับการเปลี่ยนแปลงเงื่อนไข
① มีผลบังคับใช้โดยการโพสต์บนหน้าจอบริการของข้อตกลงนี้หรือประกาศในบอร์ดประกาศหรือวิธีการอื่น ๆ
② บริษัทสามารถเปลี่ยนแปลงเนื้อหาของข้อตกลงนี้ได้หากเห็นว่าจำเป็น ข้อกำหนดและเงื่อนไขที่เปลี่ยนแปลงจะประกาศบนหน้าจอบริการและหากยังคงใช้บริการต่อไปโดยไม่แสดงเจตนาปฏิเสธแม้หลังจากประกาศ 7 วันจะถือว่าเห็นด้วยกับการเปลี่ยนแปลงข้อกำหนด
③ หากผู้ใช้ไม่เห็นด้วยกับเงื่อนไขที่เปลี่ยนแปลง ผู้ใช้สามารถระงับการใช้บริการและยกเลิกการลงทะเบียนสมาชิก และหากยังคงใช้ต่อไปจะถือว่าเห็นด้วยกับการเปลี่ยนแปลงเงื่อนไขและเงื่อนไขที่เปลี่ยนแปลงจะมีผลเช่นเดียวกับก่อนหน้านี้

มาตรา 4 (กฎบังคับ)

รายการที่ไม่ได้ระบุในเงื่อนไขและเงื่อนไขเหล่านี้เป็นไปตามข้อกำหนดของกรอบการสื่อสารโทรคมนาคมกฎหมายธุรกิจโทรคมนาคมและกฎหมายอื่นๆที่เกี่ยวข้อง

บทที่ 2 สัญญาบริการ

มาตรา 5 (การจัดทำสัญญาใช้สิทธิ)

สัญญาการใช้จะจัดตั้งขึ้นด้วยความยินยอมของบริษัทในการขอใช้ของผู้ใช้และความยินยอมในเงื่อนไขและเงื่อนไขของผู้ใช้

มาตรา 6 (การสมัครใช้สิทธิ)

การสมัครใช้งานสามารถทำได้โดยการบันทึกข้อมูลส่วนบุคคลในแบบฟอร์มการสมัครสมาชิกที่บริษัทร้องขอจากหน้าจอข้อมูลสมาชิกของการบริการ

มาตรา 7 (การยินยอมใช้สิทธิ)


① ในกรณีที่สมาชิกได้ยื่นคำร้องโดยกรอกรายละเอียดทั้งหมดของใบสมัครอย่างถูกต้องแล้ว จะยอมรับคำขอใช้บริการเว้นแต่จะมีกรณีพิเศษ
② ในกรณีที่สอดคล้องกับแต่ละข้อต่อไปนี้อาจไม่ได้รับอนุญาตในการใช้
1. เมื่อคุณไม่ได้ลงชื่อในชื่อจริงของคุณ
2. เมื่อสมัครโดยใช้ชื่อคนอื่น
3. ในกรณีที่เนื้อหาของการสมัครใช้งานถูกบันทึกไว้เป็นเท็จ
4. เมื่อสมัครเพื่อขัดขวางความเป็นอยู่ของสังคมหรือประเพณีอันดีงาม
5. เมื่อข้อกำหนดในการสมัครใช้งานอื่น ๆ ที่บริษัทกำหนดไม่เพียงพอ

มาตรา 8 (การเปลี่ยนแปลงสัญญา)

สมาชิกจะต้องแก้ไขเมื่อรายการที่ระบุไว้มีการเปลี่ยนแปลงเมื่อสมัครและสมาชิกจะต้องรับผิดชอบต่อปัญหาที่เกิดขึ้นจากการไม่แก้ไข


บทที่ 3 หน้าที่ของฝ่ายที่ทำสัญญา
มาตรา 9 (ภาระผูกพันของบริษัท)


บริษัทจะไม่เปิดเผยหรือเผยแพร่ข้อมูลส่วนบุคคลของสมาชิกที่เกี่ยวข้องกับการให้บริการแก่บุคคลที่สามโดยไม่ได้รับความยินยอมจากตนเอง
อย่างไรก็ตามหากมีความต้องการของหน่วยงานของรัฐตามบทบัญญัติของกฎหมายเช่นกฎหมายพื้นฐานการสื่อสารโทรคมนาคมจะไม่ใช้บังคับหากมีวัตถุประสงค์ในการสืบสวนอาชญากรรมหรือหากมีการร้องขอตามขั้นตอนที่กำหนดไว้ในกฎหมายที่เกี่ยวข้องอื่นๆ

มาตรา 10 (หน้าที่ของสมาชิก)


① สมาชิกไม่ควรกระทำดังต่อไปนี้เมื่อใช้บริการ
1. การกระทำในการใช้บัตรประจำตัวของสมาชิกอื่นอย่างไม่เป็นธรรม
2. การทำซ้ำ การเผยแพร่ หรือการให้ข้อมูลที่ได้จากการบริการแก่บุคคลที่สาม
3. การกระทำที่ละเมิดลิขสิทธิ์ของบริษัท ลิขสิทธิ์ของบุคคลที่สาม ฯลฯ
4. การเผยแพร่เนื้อหาที่ละเมิดระเบียบสาธารณะและประเพณีอันดีงาม
5. การกระทำที่ตัดสินอย่างเป็นวัตถุประสงค์ว่าเกี่ยวข้องกับอาชญากรรม
6. การกระทำอื่น ๆ ที่ฝ่าฝืนกฎหมายที่เกี่ยวข้อง
① สมาชิกมีความรับผิดชอบในการบำรุงรักษาเช่นอีเมล กระดานข่าวและเอกสารลงทะเบียนตามความจำเป็น
② สมาชิกไม่สามารถลบหรือเปลี่ยนแปลงวัสดุที่บริษัทจัดหาให้โดยไม่ตั้งใจ
③ สมาชิกต้องไม่ทำการลงทะเบียนเนื้อหาที่ละเมิดสิทธิอื่น ๆ เช่น ลิขสิทธิ์ของบุคคลที่สาม ฯลฯ ในโฮมเพจของบริษัทหรือเนื้อหาที่ละเมิดระเบียบสาธารณะและประเพณี หากสมาชิกมีความรับผิดชอบต่อผลลัพธ์ทั้งหมดที่เกิดขึ้นเมื่อโพสต์เนื้อหาเช่นนี้
มาตรา 12 (การจัดการและลบสิ่งพิมพ์)


สำหรับการให้บริการที่มีประสิทธิภาพพื้นที่หน่วยความจำของสมาชิก ขนาดข้อความ จำนวนวันที่จัดเก็บ ฯลฯ สามารถลบได้โดยไม่ต้องแจ้งให้ทราบล่วงหน้าหากเนื้อหาที่ลงทะเบียนสอดคล้องกับแต่ละข้อต่อไปนี้
1. ถ้าเนื้อหาเป็นการใส่ร้ายสมาชิกอื่นหรือบุคคลที่สาม หรือเป็นการใส่ร้ายป้ายสีผู้อื่น
2. ในกรณีที่มีการละเมิดระเบียบสาธารณะและประเพณีอันดีงาม
3. ถ้าเนื้อหาที่ได้รับการยอมรับว่ามีส่วนเกี่ยวข้องกับการกระทำความผิด
4. ในกรณีที่มีการละเมิดลิขสิทธิ์ของบริษัท, ลิขสิทธิ์ของบุคคลที่สาม ฯลฯ
5. เมื่อสมาชิกโพสต์ภาพลามกอนาจารหรือเชื่อมโยงไปยังเว็บไซต์ลามกอนาจารบนเว็บไซต์ของบริษัท
6. ในกรณีที่ถือว่าละเมิดกฎเกณฑ์ที่เกี่ยวข้องอื่น ๆ

มาตรา 13 (ลิขสิทธิ์สิ่งพิมพ์)

ลิขสิทธิ์ของการโพสต์เป็นของสำนักพิมพ์เอง และสมาชิกไม่สามารถใช้วัสดุที่โพสต์ในบริการได้เช่นการแปรรูปหรือขายข้อมูลที่ได้รับจากการใช้บริการ

มาตรา 14 (เวลาเปิดให้บริการ)

โดยหลักการแล้วการใช้บริการจะต้องดำเนินการตลอด 24 ชั่วโมงโดยไม่หยุดตลอดทั้งปีเว้นแต่จะมีการรบกวนพิเศษทางธุรกิจหรือทางเทคนิค อย่างไรก็ตาม ไม่เป็นเช่นนั้นในกรณีที่มีเหตุผลเช่นการตรวจสอบเป็นประจำ

มาตรา 15 (ความรับผิดชอบในการใช้บริการ)


ไม่ควรใช้บริการเพื่อแฮ็กเว็บไซต์ลามกอนาจาร การแจกจ่ายS/Wที่ผิดกฎหมายเชิงพาณิชย์ ฯลฯ และบริษัทจะไม่รับผิดชอบต่อผลและความสูญเสียของกิจกรรมทางธุรกิจที่เกิดจากการละเมิดและการดำเนินการทางกฎหมายโดยหน่วยงานที่เกี่ยวข้อง


มาตรา 16 (ระงับการให้บริการ)


หากสอดคล้องกับแต่ละข้อต่อไปนี้สามารถหยุดการให้บริการได้
1. ในกรณีที่หลีกเลี่ยงไม่ได้เนื่องจากการก่อสร้าง เช่น การซ่อมแซมอุปกรณ์บริการ
2. หากผู้ให้บริการโทรคมนาคมหยุดให้บริการโทรคมนาคมในช่วงเวลาที่กำหนดไว้ในพระราชบัญญัติธุรกิจโทรคมนาคม
3. หากต้องการการตรวจสอบระบบ
4. ในกรณีอื่น ๆ ที่มีเหตุอันไม่อาจต้านทานได้


บทที่ 5 การยกเลิกสัญญาและการจำกัดการใช้งาน
มาตรา 17 (การยกเลิกสัญญาและการจำกัดการใช้สิทธิ)


① เมื่อสมาชิกต้องการยกเลิกสัญญาการใช้งาน สมาชิกจะต้องยื่นคำร้องขอยกเลิกผ่านอินเทอร์เน็ต และบริษัทจะต้องดำเนินการหลังจากยืนยันตัวตนของพวกเขา
② บริษัทต้องแจ้งให้ลูกค้าทราบล่วงหน้า 30 วันก่อนมาตรการยกเลิกในกรณีที่สมาชิกได้กระทำตามข้อใดข้อหนึ่งดังต่อไปนี้และเปิดโอกาสให้พวกเขาแสดงความคิดเห็น
1. กรณีขโมย ID และรหัสผ่านของผู้ใช้อื่น
2. ในกรณีที่มีการจงใจขัดขวางการดำเนินงานของบริการ
3. กรณีการสมัครสมาชิกปลอม
4. หากผู้ใช้รายเดียวกันได้ลงทะเบียนไอดีอื่นสองครั้ง
5. เมื่อมีการเผยแพร่เนื้อหาที่เป็นอุปสรรคต่อระเบียบสาธารณะและประเพณีอันดีงาม
6. ในกรณีที่มีการกระทำที่ทำให้เสียเกียรติหรือเสียผลประโยชน์ของผู้อื่น
7. เมื่อมีการถ่ายโอนข้อมูลจำนวนมากหรือข้อมูลโฆษณาเพื่อวัตถุประสงค์ในการขัดขวางการดำเนินงานที่มั่นคงของบริการ
8. ในกรณีที่มีการกระจายโปรแกรมไวรัสคอมพิวเตอร์ที่ก่อให้เกิดความผิดปกติของอุปกรณ์สารสนเทศและการสื่อสารหรือการทำลายข้อมูล
9. กรณีละเมิดสิทธิในทรัพย์สินทางปัญญาของบริษัทหรือสมาชิกอื่นหรือบุคคลที่สาม
10. กรณีที่ข้อมูลส่วนบุคคล ID ของผู้ใช้ และรหัสผ่านของผู้อื่นถูกใช้อย่างไม่ถูกต้อง
11. เมื่อสมาชิกโพสต์ภาพลามกอนาจารบนเว็บไซต์หรือกระดานข่าวของตน หรือลิงก์ไปยังเว็บไซต์ลามกอนาจาร
12. ในกรณีที่มีการตัดสินว่าละเมิดกฎหมายอื่น ๆ ที่เกี่ยวข้อง


บทที่ 6 กีตาร์
มาตรา 18 (ห้ามโอน)

สมาชิกไม่สามารถโอนหรือมอบสิทธิ์ในการใช้บริการและสถานะตามสัญญาการใช้งานอื่นๆให้กับผู้อื่นและไม่สามารถให้เป็นการค้ำประกันได้

มาตรา 19 (ค่าเสียหาย)

บริษัทจะไม่รับผิดชอบต่อความเสียหายใดๆที่เกิดขึ้นกับสมาชิกที่เกี่ยวข้องกับการให้บริการฟรี ยกเว้นความเสียหายที่เกิดจากความประมาทเลินเล่อหรือความประมาทเลินเล่อที่สำคัญของบริษัท

มาตรา 20 (ข้อกำหนดการพ้นโทษ)


① บริษัทจะได้รับการยกเว้นความรับผิดชอบในการให้บริการหากไม่สามารถให้บริการได้เนื่องจากภัยพิบัติทางธรรมชาติ สงคราม หรือแรงต้านอื่นๆที่เทียบเท่า
② บริษัทจะได้รับการยกเว้นความรับผิดชอบต่อความเสียหายที่เกิดจากเหตุผลที่หลีกเลี่ยงไม่ได้ เช่น การซ่อมแซม การเปลี่ยนแปลง การตรวจสอบเป็นระยะๆ การก่อสร้างสิ่งอำนวยความสะดวกสำหรับบริการ
③ บริษัทจะไม่รับผิดชอบต่ออุปสรรคในการใช้บริการเนื่องจากเหตุผลที่สมาชิกได้รับ
④ บริษัทจะไม่รับผิดชอบต่อความเสียหายที่เกิดจากผลประโยชน์ที่สมาชิกคาดหวังจากการใช้บริการหรือข้อมูลที่ได้รับผ่านบริการ
⑤ บริษัทจะไม่รับผิดชอบต่อเนื้อหา เช่น ข้อมูล ข้อมูล ข้อมูล ความน่าเชื่อถือของข้อเท็จจริง และความถูกต้องที่สมาชิกโพสต์ในบริการ
มาตรา 21 (ศาลปกครอง)
ในกรณีที่มีการยื่นฟ้องเกี่ยวกับข้อพิพาทที่เกิดจากการใช้บริการ ศาลที่ดูแลสถานที่ตั้งของบริษัทจะเป็นศาลที่มีอำนาจพิเศษ
คติพจน์ (วันบังคับใช้) ข้อกำหนดและเงื่อนไขนี้มีผลบังคับใช้ตั้งแต่วันที่ OOO เดือน OOO ปี OOO

</textarea>
                    </div>

                    <div class="eyoom-form">
                        <label class="checkbox" for="agree">
                            <input type="checkbox" id="agree" value="1"><i></i><span class="f-s-12">ข้าพเจ้าได้อ่านและยอมรับนโยบายการเก็บรวบรวมข้อมูลส่วนบุคคล</span>
                        </label>
                    </div>

                    <div class="login-btn m-t-15 text-center">
                        <a href="javascript:guest_submit(document.flogin);" class="btn-e btn-e-dark btn-e-lg btn-block">สั่งซื้อโดยไม่เป็นสมาชิก</a>
                    </div>

                    <script>
                    function guest_submit(f) {
                        if (document.getElementById('agree')) {
                            if (!document.getElementById('agree').checked) {
                                Swal.fire({
                                    title: "중요!",
                                    text: "개인정보수집에 대한 내용을 읽고 이에 동의하셔야 합니다.",
                                    confirmButtonColor: "#FF2900",
                                    type: "error",
                                    confirmButtonText: "확인"
                                });
                                return;
                            }
                        }

                        f.url.value = "<?php echo $url;?>";
                        f.action = "<?php echo $url;?>";
                        f.submit();
                    }
                    </script>
                </div>
            </div>
            <?php } else if (preg_match('/orderinquiry.php$/',$url)) { ///#2 ?>
            <div class="m-b-30"></div>
            <div class="login-box-in">
                <div class="non-member-order">
                    <div class="text-center m-b-30"><h4><strong>ตรวจสอบคำสั่งซื้อสำหรับผู้ที่ไม่ได้เป็นสมาชิก</strong></h4></div>
                    <form name="forderinquiry" method="post" action="<?php echo urldecode($url); ?>" autocomplete="off" class="eyoom-form">
                    <section>
                        <label for="od_id" class="label">หมายเลขคำสั่งซื้อ<strong class="sound_only"> 필수</strong></label>
                        <label class="input">
                            <i class="icon-append fas fa-shopping-cart"></i>
                            <input type="text" class="form-control" placeholder="Order Number" name="od_id" value="<?php echo $od_id;?>" id="od_id" required size="20">
                        </label>
                    </section>
                    <div class="login-form-margin-bottom"></div>
                    <section>
                        <label for="id_pwd" class="label">รหัสผ่าน<strong class="sound_only"> 필수</strong></label>
                        <label class="input">
                            <i class="icon-append fas fa-lock"></i>
                            <input type="password" class="form-control" placeholder="Password" name="od_pwd" size="20" id="od_pwd" required>
                        </label>
                    </section>
                    <div class="login-form-margin-bottom"></div>
                    <div class="login-btn m-b-20">
                        <input class="btn-e btn-e-dark btn-e-lg btn-block" type="submit" value="ยืนยัน">
                    </div>
                    </form>
                    <div class="cont-text-bg m-b-20">
                        <p class="bg-danger f-s-13r">
                            <strong class="text-black"><i class="fas fa-exclamation-circle"></i> คำแนะนำในการตรวจสอบคำสั่งซื้อสำหรับผู้ที่ไม่ได้เป็นสมาชิก</strong><br>
                           โปรดกรอกหมายเลขคำสั่งซื้อและรหัสผ่านที่คุณได้ลงทะเบียนไว้ตอนสั่งซื้อให้ถูกต้อง
                        </p>
                    </div>
                </div>
            </div>
            <?php } //#2 ?>

            <?php } //#1 ?>
            <?php /* 쇼핑몰 비회원 구매 끝 */ ?>
        </div>
    </div>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}
$('.login-box').center();

<?php if (preg_match('/orderform.php/',$url)) { ///#2) ?>
$(document).ready(function(){
    new PerfectScrollbar('#scrollbar');
});
<?php } ?>

document.querySelectorAll('[data-toggle="password"]').forEach(function (el) {
    el.addEventListener("click", function (e) {
        e.preventDefault();

        var target = el.dataset.target;
        document.querySelector(target).focus();

        if (document.querySelector(target).getAttribute('type') == 'password') {
            document.querySelector(target).setAttribute('type', 'text');
        } else {
            document.querySelector(target).setAttribute('type', 'password');
        }

        if (el.dataset.classActive) el.classList.toggle(el.dataset.classActive);
    });
});

jQuery(function($){
    $("#login_auto_login").click(function(){
        if ($(this).is(":checked")) {
            Swal.fire({
                title: "알림",
                html: "<div class='alert alert-info text-start f-s-13r'>자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.<br><br>공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.</div><span>자동로그인을 사용하시겠습니까?</span>",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#ab0000",
                confirmButtonText: "확인",
                cancelButtonText: "취소"
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#login_auto_login").attr("checked");
                } else {
                    $("#login_auto_login").removeAttr("checked");
                }
            });
        }
    });
});

function flogin_submit(f) {
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}

<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$is_iphone = (strpos($user_agent, 'iPhone') !== false);
$is_ipad = (strpos($user_agent, 'iPad') !== false);

if ($is_iphone || $is_ipad) {
?>
$(document).ready(function(){
    var touchStartTimestamp = 0;
    
    $("input, textarea, select").on('touchstart', function(event) {
        zoomDisable();
        touchStartTimestamp = event.timeStamp;
    });

    $("input, textarea, select").on('touchend', function(event) {
        var touchEndTimestamp = event.timeStamp;
        if (touchEndTimestamp - touchStartTimestamp > 500) {
            setTimeout(zoomEnable, 500);
        } else {
            zoomDisable();
            setTimeout(zoomEnable, 500);
        }
    });

    function zoomDisable(){
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">');
    }

    function zoomEnable(){
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1">');
    }
});
<?php } ?>
</script>