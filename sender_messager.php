<?php 
 session_start();

 
require('config.php');
 
 $stmt = $db->prepare('SELECT * FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_SESSION['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
/*print_r($row);*/
//if form has been submitted process it
if(isset($_POST['submit'])){
 
   	 
		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO coversation (ID_user,message) VALUES (:IDUSER, :message)');
                  
  
           /* $stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $_POST['password'],
				':email' => $_POST['email'],
				':active' => "yes",
                ':img' => $avatar_path
            
			));*/
          
             
            $stmt->execute(array(
				':IDUSER' => $row['memberID'],
				':message' => $_POST['sms'] 
            
			));
            
           
			$id = $db->lastInsertId('memberID');


		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}


//define page title
$title = 'Chat';

//include header template
require('header.php');
 
?>


<div class="container">

	<div class="row">

			<form role="form" method="post" action="" autocomplete="off">
				 
				<hr>
				 
				<div class="row">
					<div class="col-xs-6 col-sm-8 col-md-6">
						<div class="form-group">
							<input class="form-control input-lg"  type="text" name="sms" id="sms" class="form-control input-lg" placeholder="Text...." tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-6">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Send" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
					</div>
				</div>

				<div class="row">
					
				</div>
			</form>
		 
	</div>

</div>

<?php

//include header template
//require('layout/footer.php');
?>