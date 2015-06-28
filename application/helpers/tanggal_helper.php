<?php
	function tgl($tanggal) {
		$theDate = explode(",",date("w,d,n,Y",strtotime($tanggal)));
		$wday 		= $theDate[0];
		$hr 		= $theDate[1];
		$theMonth 	= $theDate[2];
		$theYear 	= $theDate[3];
		//Buat daftar nama bulan
		$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Okotober","Nopember","Desember");
		//Buat daftar nama hari dalam bahasa indonesia
		$hari  		= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");		 
		$month 		= intval($theMonth) - 1;		 
		$days  		= $wday;		 
		$tg_angka 	= $hr;		 
		$year  		= $theYear;		 
		return $hari[$days].', '.$tg_angka.' '.$bulan[$month].' '.$year;
	}

	function waktu($tanggal) {
		return $waktu	=	substr($tanggal,11,8);
	}