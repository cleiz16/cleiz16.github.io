<?php
	$type = "camera";
	require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');
?>
<script type="text/javascript">
	var type = <?php echo json_encode($type);?>;

	var url_youtube_1 = <?php echo "\"".$url_youtube[0]."\""?> + "?autoplay=1";
	var url_youtube_2 = <?php echo "\"".$url_youtube[1]."\""?> + "?autoplay=1";
	var url_youtube_3 = <?php echo "\"".$url_youtube[2]."\""?> + "?autoplay=1";
	var url_youtube_4 = <?php echo "\"".$url_youtube[3]."\""?> + "?autoplay=1";


$(document).ready(function(){
	var btn1 = document.getElementById('btn1');
	var btn2 = document.getElementById('btn2');
	var btn3 = document.getElementById('btn3');
	var btn4 = document.getElementById('btn4');
	setVideo(url_youtube_1);
	btn1.onclick = function(){
		setVideo(url_youtube_1);
		btn1.style.backgroundColor="gray";
		btn2.style.backgroundColor=""
		btn3.style.backgroundColor=""
		btn4.style.backgroundColor=""
	};
	btn2.onclick = function(){
		setVideo(url_youtube_2);
		btn2.style.backgroundColor="gray";
		btn1.style.backgroundColor="";
		btn3.style.backgroundColor="";
		btn4.style.backgroundColor="";
	};
	btn3.onclick = function(){
		setVideo(url_youtube_3);
		btn3.style.backgroundColor="gray";
		btn1.style.backgroundColor="";
		btn2.style.backgroundColor="";
		btn4.style.backgroundColor="";
	};
	btn4.onclick = function(){
		setVideo(url_youtube_4);
		btn4.style.backgroundColor="gray";
		btn1.style.backgroundColor="";
		btn2.style.backgroundColor="";
		btn3.style.backgroundColor="";
	};
});
	function setVideo(url_youtube){
		
		var play = document.getElementById('player');
		play.src = url_youtube;
	}


</script>
