<?php 
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login Uygulaması</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container text-white p-2">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="2.jpg" alt="">
            </div>
            <div class="col-md-6 form">
                <form action="result.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" placeholder="Please Enter ur Username" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Please Enter ur Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" placeholder="Please Enter ur Email" class="form-control" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file" id="file" class="form-control-file" >
                    </div>    
                    <label for="" class="">Birthday</label>
                    <div class="input-group">                   
                        <select name="day" id="" class="form-control">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <?php
                        $aylar = array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
                        ?>
                        <select name="month" id="" class="form-control">
                            <?php
                            $i = 1;
                            foreach ($aylar as $ay) {
                                echo '<option value="' . $i . '">' . $ay . '</option>';
                                $i++;
                            }
                            ?>
                        </select>
                        <select name="year" id="" class="form-control">
                            <?php
                            for ($i = date("Y"); $i >=1900 ; $i--) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-danger" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
