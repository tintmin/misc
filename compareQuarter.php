<?
function compareQuarter($pastDate,$currentDate) { // 회계 분기 비교 (과거 날짜, 최근 날짜) : 파라미터 형식 yyyymmdd
	/*
	created by tintmin@gmail.com @ 2018.04.25
	특정한 두 개의 날짜가 속한 분기를 비교하여 동일 분기에 속하면 same, 다른 분기면 different 를 리턴하는 함수.
	급하게 막 만들었음.
	*/
	// 매월 10일 기준이므로, 입력된 날짜를 10일 이전으로 변경
	$pastDate = date("Y-m-d", strtotime($pastDate." -10 day"));
	$currentDate = date("Y-m-d", strtotime($currentDate." -10 day"));
	$returnValue=false;
	if (substr($pastDate,0,4)!=substr($currentDate,0,4)) $returnValue="different"; // 년도가 다르면 다른 분기
	else {
		$pastQuarter=ceil(substr($pastDate,6,2)/3);
		$currentQuarter=ceil(substr($currentDate,6,2)/3);
		if ($pastQuarter==$currentQuarter) $returnValue='same';		// 같은 분기면 same 리턴
		else $returnValue='different';	// 다른 분기면 different 리턴
	}
	return $returnValue;
}
echo compareQuarter('20180111','20180310');
?>
