<?php 

require('config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

$stmt = $db->prepare('SELECT * FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_SESSION['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
        
  
//define page title
$title = 'Members Page';
 
//include header template
require('header.php'); 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 <!-- <script src="jquery-2.2.4.js"></script>-->
  <title>Exercice 1</title>
</head>
<body>

<div class="container fluid">

	<div class="row">

	   <!-- <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">-->
         <div class="col-xs-6 col-sm-6 col-md-6">
						 
            <div class="form-group">
             	<h2> <?php echo 'Welcome: ' . $_SESSION['username']; ?> <img class="img-responsive" width="50" height="50" src ="<?php echo 'images/'. $row['image']; ?>" /></h2>
             </div>
             
             <div class="col-xs-6 col-sm-6 col-md-6">
						 
            <div class="form-group"> 
				<p><a href='logout.php'>Logout</a></p>
				
            </div>
 		</div>
	</div>

</div>

<div class="container">
   <div class="row">
     <div class="pre-scrollable" id="iframe1">
     <!-- <iframe src="messages.php"></iframe>-->
     </div>
     
       
       <div class="embed-responsive embed-responsive-4by3" id="iframe2">
           <iframe class="embed-responsive-item" src="sender_messager.php"></iframe>
       </div>
       
 </div>
 </div> 
    </div> 

    <div id="new">fill data here</div>
    
    
    <script>
   
    $(document).ready(function(){
        var currentdata = "";
    
        function auto_load(){
            
            $.ajax({
                    type: 'post',
                    url: 'messages.php',
                    success: function(data){
                    /*After get all the information, so process data */
                        if (currentdata != data){
                        $('#iframe1').html(data);
                        currentdata = data;
                        $('#iframe1').animate({scrollTop:$(document).height()}, 'slow');
                        /*console.log(data);*/
                        }
                        
                    }
            });
            
        }
        
        auto_load();
        setInterval(auto_load,3000);
   
    });
        
        
     </script>
    
    
    
    </body>

</html>

    

<?php 
//include header template
require('footer.php'); 
?>