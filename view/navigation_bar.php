<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color bg-success sticky-top">
    <div class="container-fluid">

    <a class="navbar-brand col-lg-2 text-center" id="nav_link_homepage" href="../index.php" style="font-family:'Comic Sans MS' ">KC.01.17/16-20</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav col-lg-9">
        <li id="nav_aqi" class="nav-item">
          <a id="nav_link_aqi" class="nav-link" href="../index.php"><i class="fas fa-leaf"></i> Chỉ số môi trường </a>
        </li>
        <li id="nav_wqi" class="nav-item">
          <a id="nav_link_wqi" class="nav-link" href="../wqi"><i class="fas fa-tint"></i> Chỉ số nước</a>
        </li>
        <li id="nav_lqi" class="nav-item">
          <a id="nav_link_lqi" class="nav-link" href="../lqi"><i class="fas fa-globe-asia"></i> Chỉ số đất</a>
        </li>
        <li id="nav_lte" class="nav-item">
          <a id="nav_link_lte" class="nav-link" href="../lte"><i class="fas fa-signal"></i></i> 4G/lte</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tools"></i> Mở rộng</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #28A745"> 
          <a id="nav_link_camera" class="dropdown-item" href="../camera"><i class="fas fa-video"></i> Camera</a>
          <a id="nav_link_dashboard" class="dropdown-item" href="../dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          <a id="nav_link_history" class="dropdown-item" href="../history"><i class="fas fa-history"></i> Tra cứu lịch sử</a>
        </div>
        </li>


        <!-- </li> -->
        <li id="nav_contact" class="nav-item">
          <a class="nav-link disable" href="#contact"><i class="far fa-envelope"></i> Liên hệ</a>
        </li>
      </ul>
    <script>
      var type = <?php echo json_encode($type);?>;
    	if(type == "air"){
    		$('#nav_aqi').addClass("active");
    		$('#nav_link_aqi').attr("href",".");
    		if(zone == 1){
          $('#nav_link_homepage').attr("href","./index.php");
    			$('#nav_link_wqi').attr("href","./wqi");
    			$('#nav_link_lqi').attr("href","./lqi");
          $('#nav_link_lte').attr("href","./lte");
    			$('#nav_link_camera').attr("href","./camera");
    			$('#nav_link_dashboard').attr("href","./dashboard");
          $('#nav_link_history').attr("href","./history");
    		}
    	} else if (type == "water"){
    		$('#nav_wqi').addClass("active");
    		$('#nav_link_wqi').attr('href',".");
    	} else if (type == "land"){
    		$('#nav_lqi').addClass("active");
    		$('#nav_link_lqi').attr("href",".");
    	}else if (type == "4g"){
        $('#nav_lte').addClass("active");
        $('#nav_link_lte').attr("href",".");
      } else if (type == "camera"){
    		$('#nav_camera').addClass("active");
    		$('#nav_link_camera').attr("href",".");
    	} else if (type == "dashboard"){
    		$('#nav_dashboard').addClass("active");
    		$('#nav_link_dashboard').attr("href",".");
    	} else if (type == "history"){
        $('#nav_history').addClass("active");
        $('#nav_link_history').attr("href",".");
      }

    </script>
    <div>
  	<ul class="navbar-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="https://www.facebook.com" target="_blank">
                  <i class="fab fa-facebook-square"></i> Facebook
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">
                  <i class="fab fa-instagram"></i> Instagram</a>
              </li>
            </ul>
    </div>
    </div>
  
</div>
</nav>

</body>
</html>