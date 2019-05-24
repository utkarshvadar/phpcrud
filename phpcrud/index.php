
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>  
        
   
        <?php require_once 'process.php';?>
        <?php if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']?>">
           <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
           ?>
        </div>
        <?php endif ?>
        </div>

        

        <?php
            $mysqli = mysqli_connect('localhost','root','','crud');
            $result = $mysqli->query("select * from data");

        ?>


        <div class="container">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>location</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <?php while( $row = mysqli_fetch_assoc($result)):?>
                    <tr> 
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['location']?></td>
                        <td>
                            <a href = "index.php?edit=<?php echo $row['id'];?>"> 
                                <button type="button" class="btn btn-info">Edit</button>  
                            </a>

                            <a href = "process.php?delete=<?php echo $row['id'];?>">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
            <?php endwhile;?>
            
            </table>
                
        
            
            <form action="process.php" method="POST" role="form">
                <legend>Form title</legend>
                
                <input type="hidden" name="id"  class="form-control" value="<?php echo $id; ?>">
                
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter name">
                    
                </div>
                <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $location;     ?>" placeholder="Enter location">
                
                </div>
            
                <?php if($update == true):?>
                    <button type="submit" class="btn btn-primary" name="update">update</button>

                <?php else:?>
                    <button type="submit" class="btn btn-primary" name="save">save</button>
                <?php endif?>         
                
            </form>
        </div>
    </body>
</html>
