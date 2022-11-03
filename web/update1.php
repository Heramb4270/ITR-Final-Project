<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <?php 
                include "config.php";
                        if($_GET['ID'])
                        {
                            $view = mysqli_query($conn,"select * from contact where id='".$_GET['ID']."'") or die(mysqli_error($conn));
                            $row = mysqli_fetch_array($view);
                        }
                    ?>
<div class="container">
          <form  method="POST" >
            <div class="form-group">
            <label for="name">Name</label>
              <input type="text" name="name" value="<?php echo $row['name'];?>" id="w3lName" placeholder="Your Name*" class="form-control"
                required="" />
            </div>
            <div class="form-group">
            <label for="email">Email Address</label>
              <input type="email" name="email" value="<?php echo $row['email'];?>" id="w3lSender" placeholder="Your Email*" class="contact-input"
                required="" />
                </div>

              <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" value="<?php echo $row['subject'];?>" id="w3lSubect" placeholder="Subject*" class="contact-input"
                required="" />
                </div>

                <div class="form-group">
                <label for="url">Website URl</label>
              <input type="text" name="url" id="w3lWebsite" value="<?php echo $row['url'];?>" placeholder="Website URL*" class="contact-input"
                required="" />
                </div>

            <div class="form-input">
            <label for="message">Message</label>
              <textarea name="message" value="<?php echo $row['message'];?>" id="w3lMessage" placeholder="Type your message here*" required=""></textarea>
            </div>
            <div class="w3l-submit text-lg-right">
            <button class="btn btn-style btn-primary" name="btn_update">Send Message</button>
            </div>
          </form>
          </div>
</body>
</html>
<?php 
    if(isset($_POST["btn_update"]))
    {
        extract($_POST);

        $update = mysqli_query($conn," update contact set
        name='".$name."',
        email='".$email."',
        subject='".$subject."',
        url='".$url."',
        message='".$message."'
        where id='".$_GET["ID"]."'") or die(mysqli_error($conn));
        if($update)
		{
			echo "<script>;";
			echo "window.alert('Data update successfully....!');";
			echo 'window.location.href = "basic_tables.php";'; 
			echo "</script>";
		}
		else
		{
			echo "<script>;";
			echo "window.alert('Data error....!');";
			echo "</script>";
		}
    }
?>
