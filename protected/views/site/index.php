<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div id="container">
	<div class="signDiv">    
		<form class="form-signin" id="loginFormInfo" method="post">    
 			<div class="frstPgLogo">   
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yp.png" style="width:90px;height:60px;">  
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nepal.gif" style="width:50px;height:60px;"> 
			</div>    
 			<div class="dummyError alert alert-danger hideElement">
       				Error messages shown here. This is hidden otherwise    
 			</div>    
 			<div class="input-group input-group-lg">     
 				<span class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</span>     
 				<input type="text" class="form-control" name="username" id="idUser" placeholder="Username" autofocus="">     
			</div>   
 			<div class="input-group input-group-lg">     
 				<span class="input-group-addon">
					<span class="glyphicon glyphicon-log-out"></span>
				</span>     
 				<input type="password" class="form-control" name="password" placeholder="Password">     
			</div>     
     
			<input type="button" value="SIGN IN" id="signInBtn" class="btn btn-lg btn-option1">    
 			<div class="forgot" id="forgotPass">
			<a href="#">I can't access my account, please help</a>
			</div>   
 		</form> 
	</div>

	</div>
