
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css"/>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js?>"></script>
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap2.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">   
</head>
<body>
	<?php if(has_alert()):  
            foreach(has_alert() as $type => $message): ?>  
                <div class="alert alert-dismissible <?php echo $type; ?>">  
                    <button type="button" class="close" data-dismiss="alert" onclick="location.reload();"><span>&times;</span></button>
                    <?php echo $message; ?>  
                </div>  
            <?php endforeach;  
        endif; ?>
	<div class="form-login">
	<h3>Please Login</h3>
	<Br>
			<h6>Select Login Type</h6>
			<form action="<?php echo $action ?>" method="post" autocomplete="off"> 
			<input type="radio" name="tplogin" value="officer" checked="checked">Officer</input>
			<input type="radio" name="tplogin" value="checker">Checker</input>
			<h6>Username</h6>
			<input class="form-control" name="username" type="text" />
			<h6>Password</h6>
			<input class="form-control" name="password" type="password" /><br>
			<input class="form-control form-login-btn" type="submit" name="submit" value="Login" />
			
		<div><?php echo $error; ?> </div>
		</form>					
	</div>
</body>
</html>