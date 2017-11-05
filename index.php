<?php
//error reporting on
ini_set("display_errors",'On');
error_reporting(E_ALL);

$hostname ='sql.njit.edu';
$user="bp359";
$password="bTDLnIOQ";
$dsn='mysql:dbname=bp359';
$connection=NULL;
try{
    $connection=new PDO("mysql:host=$hostname;dbname=bp359",$user,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo'Connected Successfully'.'<br>';
}
catch (PDOException $error){
    echo'Connection Failed '.$error->getMessage().'<br>';
}
try{
    $query=$connection->prepare("SELECT *FROM accounts where id<6");
    $query->execute();
    $output=$query->setFetchMode(PDO::FETCH_ASSOC);
    $output=$query->fetchAll();
   
}
catch (PDOException $error)
{
    echo $sql ."<br>".$error->getMessage();
}
echo "Records from accounts table ";
print_r(count($output));
echo"<br>";

       echo "<table border=1,width=80%,>";
      	echo '<tr><th>id</th>
      		<th>email</th>
          <th>fname</th>
          <th>lname</th>
      		<th>phone</th>
      		<th>birthday</th>
      		<th>gender</th>
      		<th>password</th>
      		</tr>';
        
        foreach($output as $row){
        	echo "<tr><td>".$row["id"].'</td>
        		<td>'.$row["email"].'</td>
        		<td>'.$row["fname"].'</td>
        		<td>'.$row["lname"].'</td>
        		<td>'.$row["phone"].'</td>
        		<td>'.$row["birthday"].'</td>
        		<td>'.$row["gender"].'</td>
        		<td>'.$row["password"].'</td>';

        		echo'</tr>';
        		
        	
        
        
    }

  echo"</table>";
        
    
?>