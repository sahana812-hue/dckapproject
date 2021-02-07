<!DOCTYPE html>  
<html>  
<head>  
    <title>Sign Up Page</title> 
     
</head>  
<body>  
    <h1>Sign In</h1>  
  
    <?php  
	$this->load->helper('form');
    echo form_open('Welcome/signin_validation');  
  
    
  
    echo "<p>Username:";  
    echo form_input(('username'));  
    echo "</p>";  
  
    echo "<p>Password:";  
    echo form_password('password');  
    echo "</p>";  
  
 
  
    echo "<p>";  
    echo form_submit('signin_submit', 'Sign In');  
    echo "</p>";  
    echo '<span style="color:red">'.validation_errors().'</span>';
    echo form_close();  
  
    ?>  
  
</body>  
</html>  