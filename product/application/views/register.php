<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register user</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px 0 0 505px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		width:550px;
		/* /height:500px; */
		
	}
	</style>
</head>
<body>

<div id="container" >
<div class='col-sm-12'>
<div class='col-sm-10'>
	<h1>Register user</h1>
</div>
<div class='col-sm-2'>
	<button class='btn btn-ingo'><a href="<?php echo base_url();?>">BACK</a></button>
</div>
</div>

	

	<div id="body">
		<?php 
			$this->load->helper('form');
		//echo form_open("submit_register",'method="post"');
		echo form_open('Welcome/reg_validation'); ?>
		
		<table>
			<tr><td>
			<div class="row">
			<div class='col-sm-6'>Name:</div>
			<div class='col-sm-6'><?php echo form_input("reg_name")?>
			</div>
			
				
				
			</td></tr>
			<tr><td>
			<div class="row">
			<div class='col-sm-6'>Email:</div>
			<div class='col-sm-6'><?php echo form_input("reg_email")?>
			</div>
				
				
			</td></tr>
			<tr><td>
			<div class="row">
			<div class='col-sm-6'>Password:</div>
			<div class='col-sm-6'><?php echo form_password("reg_pwd")?>
			</div>
				
				
			
			</td></tr>
			<tr><td>
			<div class="row">
			<div class='col-sm-6'>Confirm Password:</div>
			<div class='col-sm-6'><?php echo form_password("reg_cpwd")?>
			</div>
				
				
			</td></tr>
			<tr><td>
			<div class="row">
			<div class='col-sm-6'>Address:</div>
			<div class='col-sm-6'><?php echo form_input("reg_addr")?>
			</div>
				
				
			</td></tr>
			<tr>
				<td><div class='text-center'>
				<?php echo form_submit("reg_submit", 'Register');  ?>
				</div>
				<td>
			<tr>
			<tr>
			<td>
			<?php echo '<span style="color:red">'.validation_errors().'</span>'; ?>
			<td>
			</tr>
		</table>
			
		<?php
			echo form_close();
		?>
		
	</div>

	
</div>

</body>
</html>