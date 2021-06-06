
<?php include '../php/connectdb.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/26c40a9c2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/adminstyle.css">
</head>
<body>
<header>
    <div class="header-left">
        <div class="header-logo">
            <img src="../assets/img/administrator-logo-png-6.png" alt="">
            <h2><span>Admin</span>Page</h2>
        </div>
    </div>
    <div class="header-right">
        <div class="header-search">
            <input type="text" placeholder="Tìm kiếm">
            <i class="fas fa-search"></i>
        </div>
        <div class="header-user">
            <i class="far fa-user"></i>
            <h2>Admin</h2>
        </div>
    </div>
</header>
<div class="content">
    <div class="content-left">
        <ul class="menu">
            <li class="menu-item"><a href="../admin.php"><i class="fas fa-book"></i><span class="item1">Sản phẩm</span></a></li>
            <li class="menu-item"><a href="../account.php"><i class="fas fa-user"></i><span class="item1">Tài khoản</span></a></li>
            <li class="menu-item"><a href="../bill.html"><i class="fas fa-wallet"></i><span> Đơn hàng</span></a></li>
            <li class="menu-item"><a href="../customer.php"><i class="fas fa-user-friends fa-sm"></i><span>Khách hàng</span></a></li>
            <li class="menu-item"><a href="../comment.php"><i class="fas fa-comments"></i><span>Bình luận</span></a></li>
            <li class="menu-item"><a href="../company.php"><i class="fas fa-building"></i><span>Nhà xuất bản</span></a></li>
            <li class="menu-item"><a href="../actor.php"><i class="fas fa-pen"></i><span>Tác giả</span></a></li>
            <li class="menu-item"><a href="../type.php"><i class="fas fa-book-open"></i><span>Loại sản phẩm</span></a></li>

        </ul>
    </div>
    <div class="content-right">
        <div class="content-product">
            <div class="product-title-add">
                <h2>Sửa khách hàng </h2>
                <div class="btn-add">
                    <a href="../admin.php">Trang chủ</a>
                </div>
            </div>

            <?php
            if (isset($_GET['action']) && $_GET['action']=='add') {
                $id3 = $_GET['id2'];
                $tenkh = $_POST['tenkh'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $taikhoan = $_POST['taikhoan'];
                $sql3 = "UPDATE khachhang SET tentk='$taikhoan', tenkh='$tenkh', email='$email', sdt=$sdt WHERE makh=$id3";
                $result3 = mysqli_query($con, $sql3);

                if ($result3) {
                    echo 'Sua Khach hang thanh cong';
                }else {
                    echo 'Sua khach hang khong thanh cong';
                }
                mysqli_close($con);
            }

            else {

            ?>


            <div class="add-book">
                <?php
                $id = $_GET['id'];

                $sql4 = "SELECT * FROM khachhang WHERE makh='$id'";
                $result4 = mysqli_query($con, $sql4);
                while ($row4 = mysqli_fetch_array($result4)) {

                    ?>
                    <form action="../update/upcustomer.php?action=add&id2=<?=$id?>" method="POST" enctype="multipart/form-data">

                        <div class="add-detail">
                            <label for="">Tên Khách Hàng: </label>
                            <input type="text" name="tenkh" value="<?=$row4['tenkh']?>" style="margin-left: 4.3rem;">
                        </div>
                        <div class="add-detail">
                            <label for="">Email: </label>
                            <input type="text" name="email" value="<?=$row4['email']?>" style="margin-left: 11.9rem;">
                        </div>
                        <div class="add-detail">
                            <label for="">Số Điện Thoại: </label>
                            <input type="text" name="sdt" value="<?=$row4['sdt']?>" style="margin-left: 6rem;">
                        </div>
                        <div class="add-detail">
                            <label for="">Tên Tài Khoản: </label>
                            <select name="taikhoan" id="" style="margin-left: 5.7rem;">
                                <?php
                                $sql2 = "SELECT * FROM taikhoan";
                                $result2 = mysqli_query($con, $sql2);
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                    <option value="<?=$row2['tentk']?>"><?=$row2['tentk']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="add-detail">
                            <input type="submit" value="Sửa Khách Hàng">
                        </div>
                    </form>
                <?php }?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>