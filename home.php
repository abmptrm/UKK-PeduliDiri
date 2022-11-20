<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri | Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container{
            display: flex;
        }

        img {
            margin: 90px;
            border: 5px solid gray; border-radius: 50%;
        }

       .content h1 {
            margin-top: 100px;
            font-size: 45px;

        }
        .cotent h3 {
            margin-top: 50px;
        }

        .content table {
            margin-top: 20px;
        }

        .content a {
            text-decoration: none;
            color: rgb(84, 250, 112);
        }

        .content table a:hover {
            
            color: rgb(29, 88, 39);
        }

        .active a{
            color: rgb(8, 26, 11);
        }

        .welcome {
            margin-top: 50px;
            border: 5px solid #000;
            width: 900px;
            height: 250px;
        }

        .welcome h4{
            margin-left:20px;
            margin-top: 20px;
        }

        .content button a {
            
            text-decoration: none;
            color: #000;
            
        }
        .content button {
            float: right;
            margin-top: 20px;
            width: 100px;
            height: 33px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar">
            <img src="assets/img/person.png" alt="person.png" width="200">
        </div>
        
        <div class="content">
            <h1>PEDULI DIRI</h1>
            <u><h3>Catatan Perjalanan</h3></u>

            <table>
                <th class="active"><a href="#" >Home</a></th>
                <th>&ensp;|&ensp;</th>
                <th><a href="catatan_perjalanan.php">Catatan Perjalanan</a></th>
                <th>&ensp;|&ensp;</th>
                <th><a href="isi_data.php">Isi Data</a></th>
            </table>
            
            <div class="welcome">
                <h4>Selemat Datang <?php echo  $_SESSION['username']; ?> User Di Aplikasi Peduli Lindungi</h4>
            </div>

            <button><a href="logout.php">Logout</a></button>

        </div>
        
    </div>
</body>
</html>