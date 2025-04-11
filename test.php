<?php
// 선택된 날짜가 없다면 오늘 날짜를 기본값으로 설정
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$timestamp = strtotime($date);
$today = date('Y-m-d');

// 한글 요일 배열
$days_korean = ['월', '화', '수', '목', '금', '토', '일'];

// 해당 주의 월요일 날짜 계산
$monday = strtotime('last monday', $timestamp + 86400);
if (date('N', $timestamp) == 1) { // 만약 선택한 날짜가 월요일이라면
    $monday = $timestamp;
}

// 이전/다음 주의 날짜 계산
$prev_week = date('Y-m-d', strtotime('-1 week', $monday));
$next_week = date('Y-m-d', strtotime('+1 week', $monday));

// 월요일부터 일요일까지 7일 배열 생성
$week_dates = [];
for ($i = 0; $i < 7; $i++) {
    $current_day = strtotime("+$i day", $monday);
    $day_date = date('Y-m-d', $current_day);
    $day_name_korean = $days_korean[$i]; // 한글 요일
    $week_dates[] = ['date' => $day_date, 'day_name' => $day_name_korean];
}

// HTML 출력
echo '<div style="display: flex; align-items: center; gap: 10px;">';
echo "<a href='?date=$prev_week'>이전 주</a>";

echo '<ul style="list-style-type: none; padding: 0; display: flex; gap: 10px;">';
foreach ($week_dates as $day_info) {
    $day_date = $day_info['date'];
    $day_name_korean = $day_info['day_name'];

    // 오늘 이후 날짜는 클릭할 수 없도록 설정
    if ($day_date > $today) {
        echo "<li style='color: grey;'>$day_date ($day_name_korean)</li>";
    } else {
        // 선택된 날짜 스타일 적용
        $style = ($day_date == $date) ? 'font-weight: bold; color: blue;' : '';
        echo "<li><a href='?date=$day_date' style='$style'>$day_date ($day_name_korean)</a></li>";
    }
}
echo '</ul>';

echo "<a href='?date=$next_week'>다음 주</a>";
echo '</div>';
?>
