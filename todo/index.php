<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My ToDo </title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
  
</head>
<body class="" style="background-color:#E6D3D3">
        <div class="container" >
          <div class="row" > 
              <div class="col-lg-3 col-xm-4 table-bordered " style="background-color:white;margin-top: 100px">
                  <center><h1 style="color: darkblue"><b>My</b><br><b style="color: green">TODO<br>List</b></h1></center>
  					<form method="post" action="" class="form-group">
                        Title
						<input type="text" name="new" class="form-control" required><br>
                        Time
                        <input type="time" name="time" class="form-control" required></br>
                        Date
                        <input type="date" name="date" class="form-control" required></br>
	  					<button class="btn btn-block btn-primary " name="sub">Add TODO</button>
				    </form>
                      <?php 
                       include_once"connection.php";
                        if(isset($_POST['sub'])){
                            $new=strtoupper($_POST['new']);
                            $time=$_POST['time'];
                            $date=$_POST['date'];
                            $add=mysqli_query($con,"insert into todo_list(title,time,date)values('$new','$time','$date')");
                        }?>
             </div>
                    <?php
                      $get=mysqli_query($con,"SELECT * FROM todo_list order by id desc");?>
                        <div class="container" style="margin:100px">
                             <div class="row">
                            <?php $no=1; $id;
                                 while($row=mysqli_fetch_assoc($get))
                            {
                            $id=$row['id'];
                            $title=$row['title'];
                            $get_time=$row['time'];
                            $get_date=$row['date'];?>
                  <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail text-center">
                        <span class="badge"></span>
                        <h1 id="tit"><?php echo $title;?></h1>
                        <div class="caption">
                            <h3>Time:</h3><span><?php echo $get_time; ?></span>
                            <h3> Date:</h3><p><?php echo $get_date;?></p>
                            <form method="GET" action="del.php">
                            <input type="hidden" value=<?php echo $id; ?> name="id_delete">
                            <input type="submit" class="btn btn-danger" name="delete" value="DELETE">
                            </form>
                        </div>
                    </div>
                </div>
    <?php } ?>
    </div></div>                        
    </body></html>
