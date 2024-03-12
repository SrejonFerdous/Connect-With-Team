
<?php 
    require_once "include/header.php";
?>

<?php 
 
  $email = $_SESSION["email_emp"];
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM emp_leave WHERE email = '$email'  ";
$result = mysqli_query($conn , $sql);

$i = 1;

?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <h4 class="text-center pb-3">Leave Status</h4>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Starting Date</th>
        <th>Ending Date</th> 
        <th>Total Days</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Action</th>

    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $start_date= $rows["start_date"];
            $last_date = $rows["last_date"];
            $email= $rows["email"];
            $reason = $rows["reason"];
            $status = $rows["status"]; 
            $id = $rows["id"];   
            ?>
        <tr>
        <td><?php echo "$i."; ?></td>
        <td><?php echo date("jS F", strtotime($start_date)); ?></td>
        <td><?php echo date("jS F", strtotime($last_date)); ?></td>
        <td><?php $date1=date_create($start_date);
                  $date2=date_create($last_date);
                   $diff=date_diff($date1,$date2); 
                   echo $diff->format("%a days");
            ?></td>
        <td><?php echo $reason; ?></td> 
        <td><?php echo $status; ?></td> 
        <td>  <?php 
                $delete_icon = " <a href='delete-leave.php?id={$id}' id='bin' class='btn-sm btn-primary '> <span ><i class='fa fa-trash '></i></span> </a>";
                echo  $delete_icon;
             ?> 
        </td>
    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#addMsg').text('No leave Applied by you!!');
                $('#linkBtn').attr('href', 'apply-leave.php');
                $('#linkBtn').text('Apply for Leave');
                $('#closeBtn').text('Remind me Later');
            })
        </script>
        ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>
