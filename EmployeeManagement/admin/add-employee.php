<?php 
    require_once "include/header.php";
?>


<?php  

        $nameErr = $emailErr = $passErr = $salaryErr= "";
        $name = $phone = $department = $role = $expertise = $email = $dob = $joining = $gender = $pass = $salary = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["phone"]) ){
                $phone ="";
            }else {
                $phone = $_REQUEST["phone"];
            }

            if( empty($_REQUEST["department"]) ){
                $department ="";
            }else {
                $department = $_REQUEST["department"];
            }

            if( empty($_REQUEST["role"]) ){
                $role ="";
            }else {
                $role = $_REQUEST["role"];
            }

            if( empty($_REQUEST["expertise"]) ){
                $expertise ="";
            }else {
                $expertise = $_REQUEST["expertise"];
            }

            if( empty($_REQUEST["joining"]) ){
                $joining ="";
            }else {
                $joining = $_REQUEST["joining"];
            }

            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["salary"]) ){
                $salaryErr = "<p style='color:red'> * Salary is required</p>";
                $salary = "";
            }else {
                $salary = $_REQUEST["salary"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
            }else{
                $email = $_REQUEST["email"];
            }

            if( empty($_REQUEST["pass"]) ){
                $passErr = "<p style='color:red'> * Password is required</p> ";
            }else{
                $pass = $_REQUEST["pass"];
            }


            if( !empty($name) && !empty($email) && !empty($pass) && !empty($salary) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT email FROM employee WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql = "INSERT INTO employee( name , phone, email , password , dob, gender , salary,department,role,expertise,joining ) VALUES( '$name' , '$phone', '$email' , '$pass' , '$dob' , '$gender', '$salary','$department','$role','$expertise','$joining' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $name = $phone = $department = $role = $expertise = $email = $dob = $joining = $gender = $pass = $salary = "";

                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('View Employees');
                            $('#addMsg').text('Employee Added Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
                    }
                    
                }

            }
        }

?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Add New Employee</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Phone :</label>
                                    <input type="number" class="form-control" value="<?php echo $phone; ?>"  name="phone" >     
                                    
                                </div>

                                <div class="form-group">
                                    <label >Department :</label>
                                    <input type="text" class="form-control" value="<?php echo $department; ?>"  name="department" >     
                                    
                                </div>

                                <div class="form-group">
                                    <label >Role :</label>
                                    <input type="text" class="form-control" value="<?php echo $role; ?>"  name="role" >     
                                    
                                </div>

                                <div class="form-group">
                                    <label >Expertise :</label>
                                    <input type="text" class="form-control" value="<?php echo $expertise; ?>"  name="expertise" >     
                                    
                                </div>

                                <div class="form-group">
                                    <label >Password: </label>
                                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="pass" > 
                                    <?php echo $passErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label >Salary :</label>
                                    <input type="number" class="form-control" value="<?php echo $salary; ?>" name="salary" >  
                                    <?php echo $salaryErr; ?>            
                                </div>

                                <div class="form-group">
                                    <label >Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                   
                                </div>

                                <div class="form-group">
                                    <label >Joining Date :</label>
                                    <input type="date" class="form-control" value="<?php echo $joining; ?>" name="joining" >  
                                   
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>

                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>


