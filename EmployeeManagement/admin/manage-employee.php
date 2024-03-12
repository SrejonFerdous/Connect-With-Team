<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


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

<div class="container-fluid bg-white shadow">
    <div class="py-4 mt-5">
       <div class="card-body pt-4 shadow">
         <form action="search by name.php" method="post">
            <label for="searchName"><b>Search by Name:</b></label>
            <input type="text" id="searchName" name="searchName" required>
            <button type="submit">Search</button>
        </form>
       </div>

       <div class="card-body pt-4 shadow">
        <form action="search by dept.php" method="post">
            <label for="searchDept"><b>Search by Department:</b></label>
            <input type="text" id="searchDept" name="searchDept" required>
            <button type="submit">Search</button>
        </form>
     </div>

       <div class="card-body pt-4 shadow">
        <form action="search by Role.php" method="post">
            <label for="searchRole"><b>Search by Role:</b></label>
            <input type="text" id="searchRole" name="searchRole" required>
            <button type="submit">Search</button>
        </form>
       </div>

        
    </div>
        
        
</div>

<div class="container-fluid bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Manage Employees</h4></div>
    <table class="container-fluid" style="width:50%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Role</th>
        <th>Expertise</th>
        <th>Joining Date</th> 
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Age in Years</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["name"];
            $email= $rows["email"];
            $Phone = $rows["Phone"];
            $Department = $rows["Department"];
            $Role = $rows["Role"];
            $Expertise = $rows["Expertise"];
            $Joining = $rows["Joining"];
            $dob = $rows["dob"];
            $gender = $rows["gender"];
            $id = $rows["id"];
            $salary = $rows["salary"];
            if($gender == "" ){
                $gender = "Not Defined";
            } 

            if($dob == "" ){
                $dob = "Not Defined";
                $age = "Not Defined";
            }else{
                $dob = date('jS F, Y' , strtotime($dob));
                $date1=date_create($dob);
                $date2=date_create("now");
                $diff=date_diff($date1,$date2);
                $age = $diff->format("%Y"); 
            }

            if($salary== "" ){
                $salary= "Not Defined";
            }   
            
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $Phone; ?></td>
        <td><?php echo $Department; ?></td>
        <td><?php echo $Role; ?></td>
        <td><?php echo $Expertise; ?></td>
        <td><?php echo $Joining; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $age; ?></td>
        <td><?php echo $salary; ?></td>

        <td>  <?php 
                $edit_icon = "<a href='edit-employee.php?id= {$id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='delete-employee.php?id={$id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                echo $edit_icon . $delete_icon;
             ?> 
        </td>

      
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-employee.php');
                $('#linkBtn').text('Add Employee');
                $('#addMsg').text('No Employees Found!');
                $('#closeBtn').text('Remind Me Later!');
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

<?php 
    require_once "include/footer.php";
?>