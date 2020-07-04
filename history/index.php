<?php
	require_once("../src/generateToken/get_token.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu lịch sử</title>
	<!-- JQuery -->
	<script type="text/javascript" src = "../vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../vendors/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="../vendors/js/jquery-ui/jquery-ui.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.min.css">

	<!-- Script Library -->
    <!-- Date Time Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Table Library -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- CSS Style -->
	<link rel="stylesheet" type="text/css" href="../resources/css/history.css">
	<link rel="stylesheet" href="../resources/fonts/fonts.css">

	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href="../vendors/font-awesome/css/all.min.css">

    <!-- Draw_table_function -->
    <script type="text/javascript" src="../resources/js/history/4G_draw_table.js"></script>
    <script type="text/javascript" src="../resources/js/history/ble_draw_table.js"></script>
    <script type="text/javascript" src="../resources/js/history/zigbee_draw_table.js"></script>
    <script type="text/javascript" src="../resources/js/history/lora_draw_table.js"></script>
    <script type="text/javascript" src="../resources/js/history/zwave_draw_table.js"></script>
	<?php
		$zone = 1;
        $type = "history";
		require_once('../view/navigation_bar.php');
	?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div id="query_form">
                	<form id="formoid" action="../src/history/get_history.php" method="post">
                        		<label>Thời gian bắt đầu</label>
                        		<input type="text" class="picker" id="time_start" name="time_start" value="2020-06-30 22:40:00">

                        		<label>Thời gian kết thúc</label>
                        		<input type="text" class="picker" id="time_end" name="time_end" value="2020-06-30 22:44:00">
                                <label>Lựa chọn thiết bị</label>
                        		<!-- <input type="text" id="deviceType" name="deviceType" value="Z-Wave"> -->
                                <select id="deviceType" name="deviceType">
                                    <option value="Z-Wave">Z-Wave</option>
                                    <option value="LoRa">LoRa</option>
                                    <option value="BLE">BLE</option>
                                    <option value="ZigBee">ZigBee</option>
                                    <option value="wifi">Wi-Fi</option>
                                    <option value="4G">4G</option>
                                </select>
                        		<input type="submit" id="submit_button" value="Xác nhận">
                	</form>
                </div>
            </div>
        </div>
    </div>
	<div id="listView" ></div>

<div class="container-fluid" id="display_space">
    <div class="row">
        <div class="col-lg-4">
        	<div class="table_row_1">
        		<div id="table_1" class="place_table"></div>
        	</div>
        </div>
        <div class="col-lg-4">
        	<div class="table_row_1">
        		<div id="table_2" class="place_table" ></div>
        	</div>
        </div>
        <div class="col-lg-4">
        	<div class="table_row_1">
        		<div id="table_3" class="place_table"></div>
        	</div>
        </div>
    </div>
        <div class="row">
        <div class="col-lg-6">
        	<div class="table_row_2">
        		<div id="table_4" class="place_table" ></div>
        	</div>
        </div>
        <div class="col-lg-6">
        	<div class="table_row_2">
        		<div id="table_5" class="place_table" ></div>
        	</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../resources/js/history/dateTimePicker.js"></script>
	<script>
    /* attach a submit handler to the form */
    $("#formoid").submit(function(event) {
		event.preventDefault();
		var $form = $( this ),
		url = $form.attr('action');
		var dataTime = {
			time_start: $('#time_start').val(),
			time_end: $('#time_end').val(),
			deviceType: $('#deviceType').val()
		};
       		$.ajax(
    		{url: url,
    		type: 'POST',
    		data: dataTime,
    		success: function(result){
      			$("#listView").html(result);
    		}});
    });
	</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>

<footer>
    <section id="contact" style="background-color:#28A745">
        <?php
        require_once("../view/footer.php");
        ?>
    </section>
</footer>