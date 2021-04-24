<body style="    background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
;">
    <link rel="stylesheet" href="css/bootstrap.css">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                include("connection.php");
                if ($_POST['username']) {
                    if ($_FILES['file']) {
                        if ($_FILES['file']['size'] > 0) {
                            $uzanti = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                            if ($uzanti == 'png' || $uzanti == 'jpg') {
                                $newName = "uploads/" . uniqid() . "." . $uzanti;
                                $username = filterVal($_POST['username']);
                                $password = md5(filterVal($_POST['password']));
                                $email = filterVal($_POST['email']);
                                $day = filterVal($_POST['day']);
                                $month = filterVal($_POST['month']);
                                $year = filterVal($_POST['year']);
                                $tarih = $year . "-" . $month . "-" . $day;

                                $sql2 = "SELECT * FROM users WHERE username='$username' or email='$email'";
                                $sorgu2 = $connect->prepare($sql2);
                                $sorgu2->execute();

                                $kontrol = $sorgu2->rowCount();


                                if ($kontrol < 1) {
                                    $sql = "INSERT INTO users (username,password,email,file,tarih) VALUES ('$username','$password','$email','$newName','$tarih')";
                                    $sorgu = $connect->prepare($sql);
                                    $sorgu->execute();
                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $newName)) {
                                        echo '<div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Dosya Başarıyla Yüklendi</h4>
                                            <p>Dosyanız Başarıyla Yüklendi ve Tarafımıza Ulaştı !</p>
                                            <hr>
                                            <p class="mb-0">Sadece Bekleyiniz!</p>
                                            </div>';
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Dosya Yüklenirken Bir Hata Oluştu !</h4>
                                                <p>Dosya Yüklenirken Bir Hata Oluştu ! ve Tarafımıza Ulaşmadı!</p>
                                                <hr>
                                                <p class="mb-0">Tekrar Deneyiniz !</p>
                                            </div>';
                                    }

                                    if ($sorgu) {
                                        echo '<div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Veri Tabanına Başarı İle Eklendi</h4>
                                            <p>Veri Tabanına Başarı İle Eklendi ve Tarafımıza Ulaştı !</p>
                                            <hr>
                                            <p class="mb-0">Sadece Bekleyiniz!</p>
                                            </div>';
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Veri Tabanına Eklenmedi !</h4>
                                            <p>Veri Tabanına Eklenmedi ! ve Tarafımıza Ulaşmadı !</p>
                                            <p>Olası Nedenler:Aynı Kullanıcı Adı / Aynı Email var </p>
                                            <hr>
                                            <p class="mb-0">Tekrar Dekleyiniz!</p>
                                            </div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Veri Tabanına Eklenmedi !</h4>
                                        <p>Veri Tabanına Eklenmedi ! ve Tarafımıza Ulaşmadı !</p>
                                        <p>Olası Nedenler:Aynı Kullanıcı Adı / Aynı Email var </p>
                                        <hr>
                                        <p class="mb-0">Tekrar Dekleyiniz!</p>
                                        </div>';
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Dosya Uzantısı Sadece jpg ve png Olmalıdır</h4>
                                    <p>Dosya Yüklenirken Bir Hata Oluştu ! ve Tarafımıza Ulaşmadı!</p>
                                    <hr>
                                    <p class="mb-0">Tekrar Deneyiniz !</p>
                                </div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Dosya Seçilmedi !</h4>
                                <p>Dosya Yüklenirken Bir Hata Oluştu ! ve Tarafımıza Ulaşmadı!</p>
                                <hr>
                                <p class="mb-0">Tekrar Deneyiniz !</p>
                            </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Dosya Yüklenmedi !</h4>
                                <p>Dosya Yüklenmedi ! ve Tarafımıza Ulaşmadı !</p>
                                <hr>
                                <p class="mb-0">Tekrar Dekleyiniz!</p>
                            </div>';
                }

                ?>
                <a href="index.php" class="btn btn-info"> Geri Dön</a>
            </div>
        </div>
    </div>
</body>