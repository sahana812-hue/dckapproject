<!DOCTYPE html>  
<html>  
<head>  
    <title></title>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>  
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

<body >  
    
	<h2>Hi <?php echo $this->session->username;?> ! Your Product List </h2>
    <?php  
    echo "<pre>";  
    //echo print_r($this->session->all_userdata());  
   
	
	//print_r($product);
	
	//echo print_r($this->session);
	
	
	if(!empty($hprod))
	{?><ul id="parentlist">
		<?php foreach($hprod as $row)
		{	$i =  $row->prod_id;//echo $i;
			echo '<li id="h'.$i.'" >'.$this->config->item($row->prod_id, 'product_list').'</li>';
			
			
		}
		echo "</ul>";
	}else{
		$this->load->helper('form');
		echo form_open('Welcome/intest');
		?>
	<?php foreach($this->config->item('product_list') as $key =>$val){?>
	
	<input type="checkbox" name= "ls_prod<?php echo $key;?>"value="<?php echo $key;?>"><?php echo '<b>'.$val.'</b><br>';}?>
	<?php echo form_submit("reg_prod", 'Add Product');  ?>
	
	<?php 	echo form_close();
	}
	
	
    ?>  
	<textarea id="pro_description" name="pro_description" rows="10" cols="150"></textarea>
    <div class ="btn btn-primary" ><a href='<?php echo base_url()."index.php/Welcome"; ?>'>Logout</a></div>  
	<?php echo "</pre>";  ?>
	<script type="text/javascript">
    
	var el = document.getElementById('parentlist');
	var pro_description = document.getElementById('pro_description');
	
    el.addEventListener("click",function(e) {
        // e.target is our targetted element.
                    // try doing console.log(e.target.nodeName), it will result LI
        if(e.target && e.target.nodeName == "LI") {
            console.log(e.target.id + " was clicked");
			var elementid = e.target.id.replace("h","");
			
			$.ajax({
				url:"<?php echo base_url().'index.php/Welcome/ajax_prod_details';?>",
				data:{prod_id: elementid},
				type:"POST",
				success:function(data){
					document.getElementById("pro_description").innerHTML=data;
				},
				error:function(err){console.log(err);}

		});
			 

        }
    });

</script>


</body>  
</html>  