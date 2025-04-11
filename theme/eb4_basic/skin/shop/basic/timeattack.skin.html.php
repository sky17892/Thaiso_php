<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/list.10.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
.product-list-10 {margin-left:-10px;margin-right:-10px;font-size:.9375rem}
.product-list-10:after {content:"";display:block;clear:both}
.product-list-10 .item-list-wrap {
    padding: 0px !important;
    width: 100%;
    float: left;
    max-height: 300px;
    border: 1px solid #ddd;
    margin-bottom: 20px;
	overflow:hidden
}
.product-list-10 .item-list-wrap:nth-child(5n+1) {clear:left}
.product-list-10 .item-list {position:relative;-webkit-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out}
.product-list-10 .product-img {position:relative;overflow:hidden;border-radius:7px;margin-bottom:10px;background:#fff}
.product-list-10 .product-img-in {position:relative;overflow:hidden;width:100%}
.product-list-10 .product-img-in:before {content:"";display:block;padding-top:100%;background:#fff}
.product-list-10 .product-img-in .first-img {display:block}
.product-list-10 .product-img-in .second-img {display:none}
.product-list-10 .item-list:hover {border-color:#757575}
.product-list-10 .item-list:hover .product-img-in .second-img {display:block}
.product-list-10 .product-img-in img {display:block;max-width:100%;height:auto;position:absolute;top:0;left:0;right:0;bottom:0;width:700px !important;height:365px !important;}
.product-list-10 .product-img-in .discount-percent {position:absolute;top:-40px;left:-40px;width:80px;height:80px;padding-top:57px;text-align:center;background:#ab0000;color:#fff;font-style:italic;font-size:.75rem;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);transform:rotate(-45deg)}
.product-list-10 .product-description .product-description-in{text-align:right}
.product-list-10 .product-description .product-description-in {position:relative;overflow:hidden;padding:30px}
.product-list-10 .product-description .product-name {position:relative;overflow:hidden;margin:10px 0 5px;font-size:1.125rem;font-weight:700;line-height:1.4;height:48px}
.product-list-10 .product-description .product-name a {color:#000;font-size:20pt}
.product-list-10 .product-description .product-name a:hover {text-decoration:underline}
.product-list-10 .product-description .title-price {font-size:19pt;font-weight:700;color:#ab0000}
.product-list-10 .product-description .line-through {font-size:.9375rem;color:#959595;text-decoration:line-through;margin-left:0px;font-weight:400}
.product-list-10 .product-description .product-id {color:#757575;display:block;font-size:.8125rem;margin-top:10px}
.product-list-10 .product-description .product-info {position:relative;overflow:hidden;height:38px;color:#959595;font-size:13pt;margin-top:10px}
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
    .product-list-10 .item-list-wrap {padding:0px}
}
@media (max-width:991px) {
    .product-list-10 .item-list-wrap {width:33.33333%}
    .product-list-10 .item-list-wrap:nth-child(4n+1) {clear:none}
    .product-list-10 .item-list-wrap:nth-child(3n+1) {clear:left}
    .product-type-list .product-list-10 .item-list-wrap {width:100%;padding:0px}
}
@media (max-width:767px) {
    .product-list-10 {margin-left:-2px;margin-right:-2px}
    .product-list-10 .item-list-wrap {width:50%;padding:10px 2px}
    .product-list-10 .item-list-wrap:nth-child(3n+1) {clear:none}
    .product-list-10 .item-list-wrap:nth-child(2n+1) {clear:left}
    .product-type-list .product-list-10 .item-list-wrap {width:100%;padding:0px}
}
@media (max-width:500px) {
    .product-type-list .product-list-10 .product-img {position:relative;top:inherit;left:inherit;overflow:hidden;background:#fff;width:inherit}
    .product-type-list .product-list-10 .product-description {margin-left:0;min-height:inherit}

	.product-list-10 .item-list img {
		width: 100px !important;
		height: auto;
		margin:20%;
	}
	.product-list-10 .product-description .product-name {
		position: relative;
		overflow: hidden;
		margin: 10px 0 5px;
		font-size: 1.125rem;
		font-weight: 700;
		line-height: 1.4;
		height: auto;
	}
	.product-list-10 .product-description .product-description-in {position:relative;overflow:hidden;padding:10px}
	.product-list-10 .product-description .product-name a {color:#000;font-size:10pt;font-weight:normal;word-break:keep-all;letter-spacing:-1px}
	.product-list-10 .product-description .product-info {height:auto}
}
</style>


<style>
#countdown{
	width: 100%;
	max-width:800px;
	height: 170px;
	text-align: center;
	border-radius: 5px;
	margin: auto;
	padding: 24px 0;
	position: absolute;
  top: 0; bottom: 0; left: 0; right: 0;
  margin-top:220px;
  background:#000;
  box-shadow:10px 10px 1px #333;
  overflow:hidden;
  border-radius:30px;
}



#countdown #tiles{
	position: relative;
	z-index: 1;
}

#countdown #tiles > span{
	width: 92px;
	max-width: 92px;
	background: linear-gradient(to bottom, #fff 50%, #eee 50%);
	border-radius: 3px;
	margin: 0 30px;
	padding: 20px;
	display: inline-block;
	position: relative;
	text-shadow:1px 1px 1px #000
}

#countdown #tiles > span:nth-child(1){
	font-size:30px;
	background:#33cccc;
	margin-bottom:120px;
	color:#fff;
	box-shadow:5px 5px 1px #777;
}

#countdown #tiles > span:nth-child(2)::before,
#countdown #tiles > span:nth-child(3)::before {
    width: 18px;
    height: 18px;
    position: absolute;
    content: "";
    background: #fff;
    right: -30px;
    border-radius: 10px;
	top:30px;
}


#countdown #tiles > span:nth-child(2)::after,
#countdown #tiles > span:nth-child(3)::after {
    width: 18px;
    height: 18px;
    position: absolute;
    content: "";
    background: #fff;
    right: -30px;
    border-radius: 10px;
	top:80px
}

.page-title-wrap{display:none}


#countdown .labels{
	width: 100%;
	height: 25px;
	text-align: center;
	position: absolute;
	bottom: 8px;
}

#countdown .labels li{
	width: 102px;
	font: bold 15px 'notom', Arial, sans-serif;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
	display: inline-block;
}


#countdown #tiles > span{
	width: 130px;
	max-width: 130px;
	font: bold 80px 'Droid Sans', Arial, sans-serif;
	text-align: center;
	color: #ff6600;
	border-radius: 20px;
	margin: 0 20px;
	padding: 18px 0;
	display: inline-block;
	position: relative;
}

.time_bg{background:url(/img/time_Bg.png);height:450px;width:100%}
/*---------- 타임세일 ----------*/

@media (max-width:500px) {
.time_bg{
    background: url(/img/time_Bg.png) center;
    height: 190px;
    width: 100%;
    background-size: cover;
}

#countdown{
	width: 90%;
	max-width:100%;
	height: 80px;
	text-align: center;
	border-radius: 5px;
	margin: auto;
	padding: 10px 0;
	position: absolute;
  top: 0; bottom: 0; left: 0; right: 0;
  margin-top:90px;
  background:#000;
  box-shadow:10px 10px 1px #333;
  overflow:hidden;
  border-radius:30px;
}



#countdown #tiles{
	position: relative;
	z-index: 1;
}

#countdown #tiles > span{
	width: auto;
	max-width: auto;
	background: linear-gradient(to bottom, #fff 50%, #eee 50%);
	border-radius: 3px;
	margin: 0 30px;
	padding: 20px;
	display: inline-block;
	position: relative;
	text-shadow:1px 1px 1px #000
}

#countdown #tiles > span:nth-child(1){
	font-size:10px;
	background:#33cccc;
	margin-bottom:120px;
	color:#fff;
	box-shadow:5px 5px 1px #777;
}

#countdown #tiles > span:nth-child(2)::before,
#countdown #tiles > span:nth-child(3)::before {
    width: 10px;
    height: 10px;
    position: absolute;
    content: "";
    background: #fff;
    right: -30px;
    border-radius: 10px;
	top:10px;
}


#countdown #tiles > span:nth-child(2)::after,
#countdown #tiles > span:nth-child(3)::after {
    width: 10px;
    height: 10px;
    position: absolute;
    content: "";
    background: #fff;
    right: -30px;
    border-radius: 10px;
	top:30px
}

.page-title-wrap{display:none}


#countdown .labels{
	width: 100%;
	height: 25px;
	text-align: center;
	position: absolute;
	bottom: 8px;
}

#countdown .labels li{
	width: 20px;
	font: bold 15px 'notom', Arial, sans-serif;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
	display: inline-block;
}


#countdown #tiles > span{
	width: 40px;
	max-width: 40px;
	font: bold 20px 'Droid Sans', Arial, sans-serif;
	text-align: center;
	color: #ff6600;
	border-radius: 20px;
	margin: 0 20px;
	padding: 18px 0;
	display: inline-block;
	position: relative;
}

}
</style>
<style type="text/css">
	.basic-body {
    position: relative;
    padding: 0px 0;
}
</style>
</div>
<div class="time_bg">

	<div class="time">
		<ul>

			<div id="countdown">

					<div id='tiles'></div>

			</div>	

		</ul>	
	</div>	
</div>	
<div class="container">
<script id="rendered-js" >
/*
var date_str = "2022-12-04 14:100:00";
var date_timestamp = new Date(date_str);
console.log(date_timestamp);
*/
var date_str = "<?=$ts['ts_end']?>"; //2022-12-24 14:10:00";
var target_date = new Date(date_str);

//var target_date = new Date().getTime()+11000; // + 1000 * 3600 * 48; // set the countdown date
var days, hours, minutes, seconds; // variables for time units
var seconds_left = 10;
//alert(target_date);
var countdown = document.getElementById("tiles"); // get tag element

getCountdown();

// alert(' - end');
setInterval(function () {getCountdown();}, 1000);

function getCountdown() {
	  // find the amount of "seconds" between now and target
	  var current_date = new Date().getTime();
	  seconds_left = (target_date - current_date) / 1000;

	  days = pad(parseInt(seconds_left / 86400));
	  seconds_left = seconds_left % 86400;

	  hours = pad(parseInt(seconds_left / 3600));
	  seconds_left = seconds_left % 3600;

	  minutes = pad(parseInt(seconds_left / 60));
	  seconds = pad(parseInt(seconds_left % 60));

	if(seconds_left <= 0 ) {
		location.href = "<?=G5_URL?>";
	} else {
	  if(days <= 0) days = 0;
	  if(hours <= 0) hours = 0;
	  if(minutes <= 0) minutes = 0;
	  if(seconds <= 0) seconds = 0;
	  // format countdown string + set tag value
	  countdown.innerHTML = "<span>D-day<br>" + days + "day</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>";
	}

}

function pad(n) {
  return (n < 10 ? '0' : '') + n;
}
//# sourceURL=pen.js
    </script>
<style type="text/css">
.product-list-10 .item-list-wrap {
    padding: 10px;
    width: 100%;
    float: left;
    max-height: 300px;
}
.product-list-10 .item-list {
    position: relative;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}	
.product-list-10 .product-img {
    position: relative;
    overflow: hidden;
    border-radius: 7px;
    margin-bottom: 10px;
    background: #fff;
    width: 70%;
    float: left;
}
.product-list-10 .item-list {
    position: relative;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    max-height: 300px;
}

.product-list-10 .item-list img {
    width:300px;
}
.discount-percent{background:#ff0000;width:100px;text-align:Center;color:#fff;font-size:20pt;padding:20px 0px;position:relative;float:left;border-radius:10px}
.discount-percent::after {
  content: '';
  position: absolute;
  left: 50%; /* 가운데 정렬을 원한다면 left와 transform 사용 */
  top: 100%; /* 요소 아래로 위치 */
  margin-left: -20px; /* 화살표를 중앙에 정렬 */
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  border-top: 20px solid #ff0000; /* 아래쪽 화살표 색상 */
}
</style>
<div class="product-list-10" style="padding-top:40px;">
<?php echo eb_slider('1730822706'); ?>


<?php if($default['de_type2_list_use']) { ?>
<!-- 추천상품 시작 { -->
<section class="sct_wrap">
    <?php
    $list = new item_list();
    $list->set_type(2);
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
<!-- } 추천상품 끝 -->
<?php } ?>

</div>