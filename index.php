<?php
    include("database_connect.php");

    if(mysqli_connect_errno()){
        echo"Failed to connect to MySQL: ". mysqli_connect_errno();
    }
    $result = mysqli_query($con,"SELECT *FROM ESPtable2");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" name="viewport" content="width=device-width, initial-scale=1.0" content="<?php echo $sec?>; URL='<?php echo $page?>'">
    <title>Moja strona</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table action="<?php $_SERVER["PHP_SELF"]?>" class='table' style='font-size:3vw;'>
        <thead>
            <tr>
                <th>Boolean indicator</th>
            </tr>
        </thead>
        <tbody>
            <tr class='active'>
                <td>Sawel ID</td>
                <td>Boolean control 1</td>
            </tr>
            <?php
            while($row=mysqli_fetch_array($result)){
            echo "<tr class='success'>";
            $unit_id=$row['id'];
            echo "<td>" .$row['id'] ."</td>";

            $column1 = "RECEIVED_BOOL1";

            $current_bool_1=$row['RECEIVED_BOOL1'];

            if($current_bool_1==1){
                $inv_current_bool_1=0;
                $text_current_bool_1="ON";
                $color_current_bool_1="#6ed829";
            }
            else{
                $inv_current_bool_1=1;
                $text_current_bool_1="OFF";
                $color_current_bool_1="#e04141";
            }
            
            echo "<td>
            <form action=update_values.php method='post'>
            <input type='hidden' name='value2' value=$current_bool_1 >
            <input type='hidden' name='value' value= $inv_current_bool_1 >
            <input type='hidden' name='unit' value=$unit_id>
            <input type='hidden' name='vcolumn' value=$column1>
            <input type='submit' name='change_but' style='margin-left:25%; margin-top:10%; font-size:1.5vw; text-align:center; background-color:$color_current_bool_1' value= $text_current_bool1>
            </form>
            </td>";
            }
            ?>
        </tr>
        </tbody>
    </table> <br>
</body>
</html>

<?php
    while($row=mysqli_fetch_array($result)){
        $unit_id=$row['id'];
        
        $column1 = "RECEIVED_BOOL1";

        $current_bool_1=$row['RECEIVED_BOOL1'];
        
        if($current_bool_1==1){
            $inv_current_bool_1=0;
            $text_current_bool_1="ON";
            $color_current_bool_1="#6ed829";
        }
        else{
            $inv_current_bool_1=1;
            $text_current_bool_1="OFF";
            $color_current_bool_1="#e04141";
        }
    }
?>