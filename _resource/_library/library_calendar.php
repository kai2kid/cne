<?php
  define('_MONTH_1' ,'Januari');
  define('_MONTH_2' ,'Februari');
  define('_MONTH_3' ,'Maret');
  define('_MONTH_4' ,'April');
  define('_MONTH_5' ,'Mei');
  define('_MONTH_6' ,'Juni');
  define('_MONTH_7' ,'Juli');
  define('_MONTH_8' ,'Agustus');
  define('_MONTH_9' ,'September');
  define('_MONTH_10','Oktober');
  define('_MONTH_11','November');
  define('_MONTH_12','Desember');
  
  define('_DAY_1','Senin');
  define('_DAY_2','Selasa');
  define('_DAY_3','Rabu');
  define('_DAY_4','Kamis');
  define('_DAY_5','Jumat');
  define('_DAY_6','Sabtu');
  define('_DAY_7','Minggu');
  
  define('_TIME_HOUR','Jam');
  define('_TIME_MINUTE','Menit');
  define('_TIME_SECOND','Detik');

  function monthToText($month) {
    switch ($month) {
      case "1"  : { $ret = _MONTH_1; break; }
      case "2"  : { $ret = _MONTH_2; break; }
      case "3"  : { $ret = _MONTH_3; break; }
      case "4"  : { $ret = _MONTH_4; break; }
      case "5"  : { $ret = _MONTH_5; break; }
      case "6"  : { $ret = _MONTH_6; break; }
      case "7"  : { $ret = _MONTH_7; break; }
      case "8"  : { $ret = _MONTH_8; break; }
      case "9"  : { $ret = _MONTH_9; break; }
      case "10" : { $ret = _MONTH_10; break; }
      case "11" : { $ret = _MONTH_11; break; }
      case "12" : { $ret = _MONTH_12; break; }
    }
    return $ret;
  }
  function dayToText($day) {
    switch ($day) {
      case "1"  : { $ret = _DAY_1; break; }
      case "2"  : { $ret = _DAY_2; break; }
      case "3"  : { $ret = _DAY_3; break; }
      case "4"  : { $ret = _DAY_4; break; }
      case "5"  : { $ret = _DAY_5; break; }
      case "6"  : { $ret = _DAY_6; break; }
      case "7"  : { $ret = _DAY_7; break; }
    }    
    return $ret;
  }
  
  function convertTanggal($date,$format="d-m-Y") {
    $tmp = explode("-",$date);
    $ret = date($format,mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]));
    return $ret;
  }
  function formatTanggal($date) {
    $tmp = explode("-",$date);
    $ret = $tmp[2] . " " . monthToText($tmp[1]) . " " . $tmp[0];
    return $ret;
  }
  function formatTanggal2($date) {
    $tmp = explode("-",$date);
    $ret = $tmp[0] . " " . monthToText($tmp[1]) . " " . $tmp[2];
    return $ret;
  }
  function timeToSeconds($time = "00:00:00") {
    $tmp = explode(":",$time);
    $hour = $tmp[0];
    $min = $tmp[1];
    $sec = $tmp[2];
    $ret = ($hour * 60 * 60) + ($min * 60) + $sec;
    return $ret;
  }
  
  function secondsToTime($seconds,$short = true) {
    $hour = floor($seconds / 3600);
    $second = $seconds % 60;
    $minute = floor(($seconds - ($hour * 3600)) / 60);
    $ret = str_pad($hour,2,"0",STR_PAD_LEFT) . ":" . str_pad($minute,2,"0",STR_PAD_LEFT) . ":" . str_pad($second,2,"0",STR_PAD_LEFT);
    if ($short) {
      $ret = formatTime($ret);
    } else {
      $ret = str_pad(number_format($hour),2,"0",STR_PAD_LEFT) . ":" . str_pad($minute,2,"0",STR_PAD_LEFT) . ":" . str_pad($second,2,"0",STR_PAD_LEFT);      
    }
    return $ret;
  }
  function formatTime($time) {
    $ret = $time;
    if ($time != "-" && $time != "") {
      $tmp = explode(':',$time);
      $tmp[0] = number_format($tmp[0],0);
      $ret =  str_pad($tmp[0],2,'0',STR_PAD_LEFT). ":" . $tmp[1];
      if ($ret == "00:00") $ret = "-";
    }
    return $ret;
  }
  function secondsToTime2($time) {
    $time = secondsToTime($time);
    $tmp = explode(":",$time);
    $ret = $tmp[0] . " " . _TIME_HOUR . " " . $tmp[1] . " " . _TIME_MINUTE . " " . $tmp[2] . " " . _TIME_SECOND;
    return $ret;
  }
  
  function daysInMonth($year,$month) {
    return cal_days_in_month(CAL_GREGORIAN,$month,$year);
  }
  
  function dayInWeek($date) {
    $tmp = explode("-",$date);
    $ret = date("N",mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]));
    return $ret;
  }
  
  function incDate($date,$inc = 1) {
    $tmp = explode("-",$date);
    $ret = date("Y-m-d",mktime(0,0,0,$tmp[1],$tmp[2]+$inc,$tmp[0]));
    return $ret;
  }
  
  class class_time {
    protected $date = "0000-00-00";
    protected $time = "00:00:00";
    public function __CONSTRUCT($datetime) {
      if (strpos($datetime,"-") > 0 && strlen($datetime) == 10) {
        $this->date = $datetime;
      }
      if (strpos($datetime,":") > 0 && strlen($datetime) == 8) {
        $this->time = $datetime;
      }
      if (strpos($datetime," ") > 0 && strlen($datetime) == 9) {
        $tmp = explode(" ",$datetime);
      }
    }
  }
?>
