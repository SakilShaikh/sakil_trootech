<?php 
include_once "connection.php";



$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

// check if query executed or not
if(!$result){
    echo "result not found";
}else{
   echo "<table border=2 id='myTable' style='
   border: 1px solid #cacbcc;'>";
    if(mysqli_num_rows($result)>0){
        echo "
        <thead>
        <tr>
            <td scope='col'>Id</td>
            <td scope='col'>Name</td>
            <td scope='col'>Dob</td>
            <td scope='col'>Mobile</td>
             <td scope='col'>Email</td>
            <td scope='col'>Gender</td>
            <td scope='col'>Created_at</td>
        </tr>
        </thead><tbody>
        ";
        // print data one by one
        while($row=mysqli_fetch_assoc($result)){
            echo "
            <tr>
                <td  id='update_id_$row[id]'>$row[id]</td>
                <td id='update_fname_$row[id]'>$row[name]</td>
                <td id='update_lname_$row[id]'>$row[dob]</td>
                <td id='update_dob_$row[id]'>$row[mobile]</td>
                <td id='update_created_at_$row[id]'>$row[created_at]</td>
                <td id='update_created_at_$row[id]'>$row[gender]</td>
                <td id='update_created_at_$row[id]'>$row[created_at]</td>
                
            </tr>
            ";
        }
       echo "</tbody></table>";
    }
}

?>