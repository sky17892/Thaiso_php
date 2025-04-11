<?php
include_once('./_common.php');

$mb_id   = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
$mb_level   = isset($_POST['mb_level']) ? trim($_POST['mb_level']) : '';
sql_query("update {$g5['member_table']} set mb_level='".$mb_level."' where mb_id='".$mb_id."'");
echo("update {$g5['member_table']} set mb_level='$mb_level' where mb_id='".$mb_id."'");
