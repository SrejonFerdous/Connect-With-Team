<?php

require_once "include/header.php";
?>

<?php 



$reasonErr = $startdateErr = $lastdateErr = "";
$reason = $startdate = $lastdate = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if( empty($_REQUEST["reason"]) ){
        $reasonErr = "<p style='color:red'>* Reason is Required</p>";    
    }else{
        $reason = $_REQUEST["reason"];
    }
 
    if( empty($_REQUEST["startDate"]) ){
        $startdateErr = "<p style='color:red'>* Start Date is Required</p>";    
    }else{
        $startdate = $_REQUEST["startDate"];
    }
     
    if( empty($_REQUEST["lastDate"]) ){
        $lastdateErr = "<p style='color:red'>* Last Date is Required</p>";    
    }else{
        $lastdate = $_REQUEST["lastDate"];
    }

        if( !empty($reason) && !empty($startdate) && !empty($lastdate) ){
          
            // database connection 
            require_once "../connection.php";

            $sql = "INSERT INTO emp_leave( reason , start_date , last_date , email , status ) VALUES( '$reason' , '$startdate' , '$lastdate' , '$_SESSION[email_emp]' , 'pending' )";
            $result = mysqli_query($conn , $sql);
            if($result){
                $reason = $startdate = $lastdate = "";
                echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#addMsg').text('leave Applied , Please Wait until it is approved!!');
                $('#linkBtn').attr('href', 'leave-status.php');
                $('#linkBtn').text('Check Leave Status');
                $('#closeBtn').text('Apply Another');
            })
        </script>
        ";
            }
        }
}
?>


<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6 pt-5">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                              
                                    <h4 class="text-center">Apply For Leave</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                    <div class="form-group">
                                        <label >Reason :</label>
                                        <input type="text" class="form-control" value="<?php echo $reason; ?> " name="reason" >  
                                        <?php echo $reasonErr; ?>           
                                    </div>

                                    <div class="form-group">
                                        <label >Staring Date :</label>
                                        <input type="date" class="form-control"  value="<?php echo $startdate; ?>"  name="startDate" >
                                        <?php echo $startdateErr; ?>
                                    </div>
                                    <div class="form-group">
                                        <label >Last Date :</label>
                                        <input type="date" class="form-control"  value="<?php echo $lastdate; ?>"  name="lastDate" >
                                        <?php echo $lastdateErr; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Apply Now" class="btn btn-primary btn-lg w-100 " name="signin" >
                                    </div>
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