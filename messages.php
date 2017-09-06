<?php 
 session_start();
  
 
require('config.php');
 
$url1=$_SERVER['REQUEST_URI'];
/*header("Refresh: 5; URL=$url1");*/

 $stmt = $db->prepare('SELECT * FROM coversation x JOIN  members y ON x.ID_user=y.memberID' );
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


//if form has been submitted process it
/*if(isset($_POST['submit'])){
 */
/*print_r($rows);
   	 */
    try {
 
      /* echo $stmt->rowCount();*/
         
   foreach ($rows as $row) {
    /*print $rows['image'] . "-" . $rows['ID'] ."<br/>";*/
   
    echo "<div id='data' class ='container-fluid'>";
    echo "<div class ='row'>";
    
    echo "<div class ='col-md-6 col-sm-6'>";
    echo "<img class='img-responsive' width='50' height='50' src='images/$row[image]'/>";
    echo "</div>";
    
    echo "<div class ='col-md-6 col-sm-6'>";
    echo "<p> $row[message] <p/>";
    echo "</div>";   
       
    echo "</div>";
    echo "</div>";
  }

 

   } catch(PDOException $e) {
        echo "error : " . $e->getMessage();
    }


 
	/*}*/


//define page title
$title = 'Chat';

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

<div class="container">

	<div class="row">
		 
	</div>

</div>
    
<script>
    
    
      
   $(document).ready(function(){
       
   
       console.log($rows[0]);
       
       /*console.log($('container-fluid'));*/
    
    /*let newData =  data.map(HtmlLine => )
    */
});
    
  </script>
</body>
</html>
 