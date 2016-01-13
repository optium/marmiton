<?php
	include "header.php";
?>
<body>
	<?php 
			echo "<script type=\"text/javascript\">display('".Login::getInstance()->getDefault()."');</script>";
		?>
<div id="alert" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Sorry,</h3>
	</div>
	<div class="modal-body">
		The action linked to this button is not available yet.<br />
		Be patient!
	</div>
      
</div>
<div class="page-container">
	<!-- Menu top -->
	<div id="navBar">
		<div class="navbar navbar-inverse navbar-fixed-top" >
		    <div class="navbar-inner">
				<div class="container">
				  
				  <a class="brand" href="<?php echo Login::getInstance()->getDefault(); ?>.php">SODA</a>
				  
				  <div class="nav-collapse collapse">
					
					  <div style="margin-top: 10px"><?php echo "<a href='./user.php?user=".Login::getInstance()->getLogin()."'>Welcome ".Login::getInstance()->getLogin()."</a><a href='logout.php' style='margin-left:20px'>Log out</a>"; ?> 
					 <div style="margin-left: 300px; margin-top: -30px"><form method="get" action="icao.php" id="icao_form">
					<input type="text" placeholder="Enter ICAO or Company name" class="span4 search-query" name="search" id="icao_search">
					<input class="btn btn-info" type="submit" value="Search">
					</form>
					</div>
					 <ul class="nav pull-right" style="margin-top: -40px">
						<li id="fat-menu" class="dropdown">
						  <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
							<?php if (Login::getInstance()->getAw_right() != "1" && Login::getInstance()->getAw_right() != "0"){ ?>
								<li><a tabindex="-1" href="./airmanw.php" class="dropdown-submenu">AIRMAN-web</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getAf_right() != "1" && Login::getInstance()->getAf_right() != "0"){ ?>
								<li><a tabindex="-1" href="./airfase.php">AirFASE & FEMIS</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getDel_right() != "1" && Login::getInstance()->getDel_right() != "0"){ ?>
								<li><a tabindex="-1" href="./deliveries.php">Deliveries</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getSer_right() != "1" && Login::getInstance()->getSer_right() != "0"){ ?>
								<li><a tabindex="-1" href="./packages.php">Packages</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getFaq_right() != "1" && Login::getInstance()->getFaq_right() != "0"){ ?>
							 <li><a tabindex="-1" href="javascript: display('faqs.html')">FAQs</a></li>
							<?php } ?>
							<li class="divider"></li>
							<li><a tabindex="-1" href="./user_report.php">Bugs/Requests</a></li>
							<?php if (Login::getInstance()->getAw_right() == "under-one" || Login::getInstance()->getAw_right() == "leader"){ ?>
								<li><a tabindex="-1" href="./admin.php?airmanw" class="dropdown-submenu">AIRMAN-web ADM</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getAf_right() == "under-one" || Login::getInstance()->getAf_right() == "leader"){ ?>
								<li><a tabindex="-1" href="./admin.php?airfase" class="dropdown-submenu">AirFASE & FEMIS ADM</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getDel_right() == "under-one" || Login::getInstance()->getDel_right() == "leader"){ ?>
								<li><a tabindex="-1" href="./admin.php?deliveries" class="dropdown-submenu">Deliveries ADM</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getSer_right() == "under-one" || Login::getInstance()->getSer_right() == "leader"){ ?>
								<li><a tabindex="-1" href="./admin.php?packages" class="dropdown-submenu">Packages ADM</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getAw_right() != "0" && Login::getInstance()->getAw_right() != "1" && (Login::getInstance()->getDepartment() == "INF" || Login::getInstance()->getMagicStatus() == "ok" || Login::getInstance()->getAw_right() == "leader")){ ?>
								<li class="divider"></li>
								<li><a tabindex="-1" href="./inf-airman.php" class="dropdown-submenu">Infotel AIRMAN-web part</a></li>
							<?php } ?>
							<?php if (Login::getInstance()->getMagicStatus () == "ok"){ ?>
								<li class="divider"></li>
								<li><a tabindex="-1" href="./magic_admin.php" class="dropdown-submenu">Magic ADM</a></li>
							<?php } ?>
						  </ul>
						</li>
					  </ul>
					</div>
				  </div>
				</div>
		    </div>
		</div>
	</div>
        
        <div id="div_result"></div>
        <input type="text" id="hidden_icao" />
	<!-- FIN Menu top -->
	<!--<div style="margin-top:50px; margin-left:30%;">
		
	</div>-->

	<!-- Javascript 
        <script src="js/jquery-1.8.2.min.js"></script> -->
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/icao_results.js"></script>
      <!--  <script src="js/scripts.js"></script>-->
</div>
