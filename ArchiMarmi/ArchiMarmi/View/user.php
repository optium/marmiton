<?php

include "./Include/header_page.php";

if (isset($_GET['user']) && $_GET['user'] == Login::getInstance()->getLogin()){

$dal_user = new DAL_Users();
$user = $dal_user->getUserInfos(Login::getInstance()->getId());

	
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
<div id="up_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Update your info</h3>
	</div>
	<form id="form_up_user" method="post">
	<div class="modal-body">
		<input type="hidden" name="id_user" value="-1" />
		<table>
			<tr><td>Name: </td><td><input type="text" name="name" value="-1"></td></tr>
			<tr><td>Surname: </td><td><input type="text" name="surname" value="-1"></td></tr>
			<tr><td>Email: </td><td><input type="text" name="email" value="-1"></td></tr>
			<tr><td>Department: </td><td><input type="text" name="department" value="-1"></td></tr>
			<!--<tr><td>Log designation: </td><td><input type="text" name="log" value="-1"></td></tr>-->
		</table>
	</div>
		<div class="modal-footer">
			<input class="btn btn-primary btn-success" type="submit"  value="Save"/>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</form>
</div>
<div id="up_password" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Update Password</h3>
	</div>
	<form id="form_up_password" method="post">
	<div class="modal-body">
		<input type="hidden" name="id_user" value="-1" />
		<table class="table">
			<tr><td>Old Password: </td><td><input type="password" name="old"></td></tr>
			<tr><td>New password: </td><td><input type="password" name="new"></td></tr>
			<tr><td>Confirm new password: </td><td><input type="password" name="confirm"></td></tr>
		</table>
	</div>
		<div class="modal-footer">
			<input class="btn btn-primary btn-success" type="submit"  value="Save"/>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</form>
</div>

<div id="up_parameters" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Update Parameters</h3>
	</div>
	<form id="form_up_parameters" method="post">
	<div class="modal-body">
		<input type="hidden" name="id_user" value="-1" />
		<table class="table">
			<tr><td>Default Page: </td><td><select name="page"><option>airmanw</option><option>airfase</option><option>deliveries</option><option>services</option><option>inf-airman</option></select></td></tr>
			<tr><td>Default Theme: </td><td><select name="theme"><option>default</option></select></td></tr>
			<tr><td>Default Background: </td><td><input type="text" name="background"></td></tr>
		</table>
	</div>
		<div class="modal-footer">
			<input class="btn btn-primary btn-success" type="submit"  value="Save"/>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</form>
</div>
<div id="globalTab">
	<!-- Entêtes des onglets-->
			<div id="headtab">
			<ul id="myTab" class="nav nav-tabs">
				<li class="active"><a href="#information" data-toggle="tab">Information</a></li>
				<li><a href="#rights" data-toggle="tab">My rights</a></li>
				<?php if (Login::getInstance()->getAw_right() != "1" && Login::getInstance()->getAw_right() != "0"){ ?>
						<li><a href="#Log_airman" data-toggle="tab">Log AIRMAN-web</a></li>
				<?php }
				if (Login::getInstance()->getAf_right() != "1" && Login::getInstance()->getAf_right() != "0"){ ?>
						<li><a href="#Log_airfase" data-toggle="tab">Log AirFASE</a></li>
				<?php }
				if (Login::getInstance()->getDel_right() != "1" && Login::getInstance()->getDel_right() != "0"){ ?>
						<li><a href="#Log_deliveries" data-toggle="tab">Log Deliveries</a></li>
				<?php }
				if (Login::getInstance()->getDel_right() != "1" && Login::getInstance()->getDel_right() != "0"){ ?>
						<li><a href="#Log_services" data-toggle="tab">Log Services</a></li>
				<?php }
				if (Login::getInstance()->getFaq_right() != "1" && Login::getInstance()->getFaq_right() != "0") { ?>
						<li><a href="#Log_faqs" data-toggle="tab">Log FAQs</a></li>
				<?php } ?>
			</ul>
			</div>
			<div id="content" class="tab-content">
				<!-- Information -->
				<div class="tab-pane fade in active" id="information">
				<h4>Welcome in your space!</h4> <!--<a href="#" onclick="disp_modal('<?php echo Login::getInstance()->getId(); ?>', 'up_password'); return false;" class="btn btn-danger pull-right">Change my password</a>-->
				<br /><br />
				<table class="table table-bordered table-striped">
					<thead>
						<tr colspan="2"><th>My Information</th></tr>
					</thead>
					<tbody>
						<tr><th>Name</th><td id="name_<?php echo $user[0]['id_user'];?>"><?php echo $user[0]['name']; ?></td></tr>
						<tr><th>Surname</th><td id="surname_<?php echo $user[0]['id_user'];?>"><?php echo $user[0]['surname']; ?></td></tr>
						<tr><th>Department</th><td id="department_<?php echo $user[0]['id_user'];?>"><?php echo $user[0]['department']; ?></td></tr>
						<tr><th>E-mail</th><td id="email_<?php echo $user[0]['id_user'];?>"><?php echo $user[0]['email']; ?></td></tr>
						<tr><th>Log</th><td id="log_<?php echo $user[0]['id_user'];?>"><?php echo $user[0]['log']; ?></td></tr>
					</tbody>
					<tfoot>
						<tr><td colspan="2"><a href="#" onclick="disp_modal_up_user('<?php echo $user[0]['id_user']; ?>'); return false;" class="btn btn-info pull-right">Edit</a></td></tr>
					</tfoot>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr colspan="2"><th>My parameters</th></tr>
					</thead>
					<tbody>
						<tr><th>My default page</th><td><?php echo Login::getInstance()->getDefault(); ?></td></tr>
						<tr><th>My default theme</th><td><?php echo Login::getInstance()->getTheme(); ?></td></tr>
						<tr><th>My background</th><td><?php echo Login::getInstance()->getBackground(); ?></td></tr>
					</tbody>
					<tfoot>
						<tr><td colspan="2"><a href="#" onclick="disp_modal('<?php echo Login::getInstance()->getId(); ?>', 'up_parameters'); return false;" class="btn btn-info pull-right">Edit</a></td></tr>
					</tfoot>
				</table>
				</div>
				<!-- My Rights -->
				<div class="tab-pane fade" id="rights">
				<table class="table table-bordered">
					<thead>
						<tr colspan="3"><th>My rights</th></tr>
						<tr><th>Part</th><th>Right</th><th>Requests availables</th></tr>
					</thead>
					<tbody>
						<tr><th>AIRMAN-web deployments</th>
						<td><?php 
							if(Login::getInstance()->getAw_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getAw_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getAw_right();
						?></td>
						<td><?php 
							if(Login::getInstance()->getAw_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=aw_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getAw_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getAw_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getAw_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getAw_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?>
						</td>
						</tr>
						<tr><th>AirFASE dashboard</th><td><?php 
							if(Login::getInstance()->getAf_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getAf_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getAf_right();
						?></td>
						<td><?php 
							if(Login::getInstance()->getAf_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=af_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getAf_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getAf_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getAf_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getAf_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?>
						</td></tr>
						<tr><th>Deliveries</th><td><?php 
							if(Login::getInstance()->getDel_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getDel_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getDel_right();
						?></td><td><?php 
							if(Login::getInstance()->getDel_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=del_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getDel_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getDel_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getDel_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getDel_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?></td></tr>
						<tr><th>Services</th><td><?php 
							if(Login::getInstance()->getSer_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getSer_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getSer_right();
						?></td><td><?php 
							if(Login::getInstance()->getSer_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=ser_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getSer_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getSer_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getSer_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getSer_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?></td></tr>
						<tr><th>FAQs</th><td><?php 
							if(Login::getInstance()->getFaq_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getFaq_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getFaq_right();
						?></td><td><?php 
							if(Login::getInstance()->getFaq_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=faq_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getFaq_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getFaq_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getFaq_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getFaq_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?></td></tr>
						<tr><th>Hardware</th><td><?php 
							if(Login::getInstance()->getHar_right() == "0") 
								echo "No access";
							else if(Login::getInstance()->getHar_right() == "1") 
								echo "Requested";
							else
								echo Login::getInstance()->getFaq_right();
						?></td><td><?php 
							if(Login::getInstance()->getHar_right() == "0") 
								echo '<a href="./fonctions_ajax/personal_info.ajax.php?request_access&id_user='.Login::getInstance()->getID().'&part=har_right_status" class="btn btn-info">Ask for an access</a>';
							if(Login::getInstance()->getHar_right() == "1") 
								echo "Pending action of the administration";
							if(Login::getInstance()->getHar_right() == 'reader') 
								echo '<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getHar_right() == 'writer') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-error">Ask to become administrator</a>';
							if(Login::getInstance()->getHar_right() == 'under-one') 
								echo '<a href="#" onclick="" class="btn btn-success">Ask to become reader</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="" class="btn btn-warning">Ask to become writer</a>';
						?></td></tr>
					</tbody>
				</table>
				</div>
				<!-- Log AIRMAN-web -->
				<div class="tab-pane fade" id="Log_airman">
					<table class="table table-bordered table-striped">
						<tr><th>Date</th><th>Action</th></tr>
						<?php $dal_airman = new DAL_AirmanW();
							$log_airman = $dal_airman->get_my_log(Login::getInstance()->getLog());
							for($i = 0; isset($log_airman[$i]); ++$i){
								echo '<tr><td>'.$log_airman[$i]['date'].'</td><td>'.$log_airman[$i]['content'].'</td></tr>';
							}
						?>
					</table>
				</div>
				<!-- Log AirFASE -->
				<div class="tab-pane fade" id="Log_airfase">
					<table class="table table-bordered table-striped">
						<tr><th>Date</th><th>Action</th><th>FAP</th><th>A/C info</th><th>Reg Number</th></tr>
						<?php $dal_airfase = new DAL_Airfase();
						$log = $dal_airfase->get_my_log(Login::getInstance()->getLog());
						for ($i = 0; isset($log[$i]); ++$i){
							$fap = $dal_airfase->getAFap($log[$i]['id_fap']);
							if(!empty($fap))
								echo '<tr><td>'.$log[$i]['date'].'</td><td>'.$log[$i]['content'].'</td><td>'.$fap['0']['icao'].'</td><td>'.$fap['0']['ac_info'].'</td><td>'.$fap['0']['reg_msn'].'</td></tr>';
							else
								echo '<tr><td>'.$log[$i]['date'].'</td><td>'.$log[$i]['content'].'</td><td>ADMIN ACTION</td><td>N/A</td><td>N/A</td></tr>';
						}
						?>
					</table>
				</div>
				<!-- Log Deliveries -->
				<div class="tab-pane fade" id="Log_deliveries">
				deliveries
				</div>
				<!-- Log FAQs -->
				<div class="tab-pane fade" id="Log_faqs">
				faqs
				</div>
			</div>
</div>
<?php
}

else if (!isset($_GET['user']))
	echo '<div class="container">
			<div class="row-fluid">
			<div class="span12">
				<h4>Have you understand if I\'ve not a login in my url, I can display information?</h4>
			</div>
			</div>
		</div>';
else
	echo '<div class="container">
				<h1>Fuck you, fuck you very, very much...</h1>
		</div>';
	

?>
<script src="js/user.js" type="text/javascript"></script>