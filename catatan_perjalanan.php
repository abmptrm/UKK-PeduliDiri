<?php
    session_start();

    $user = $_SESSION['username'];
    $datauser = "txt/user/$user.txt";

    if (!file_exists($datauser)) {
        // die("<center>Kamu Belum Mempunyai Catatan</center>");
        echo '<script>alert("Kamu Belum Mempunyai Catatan!");</script>';
        error_reporting(0);
    } else {
        $file = fopen($datauser, "r");
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri | Catatan Perjalanan</title>
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
            border: 5px solid gray; 
            border-radius: 50%;
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

        .content #logout a {
            
            text-decoration: none;
            color: rgb(0, 0, 0);
            
        }
        .content #logout {
            float: right;
            margin-top: 20px;
            margin-bottom: 30px;
            width: 100px;
            height: 33px;
        }

        .active a{
            color: rgb(8, 26, 11);
        }

        .urutkan {
            margin-top: 50px;
            border: 5px solid #000;
            width: 900px;
            height: 48px;
        }

        .urutkan h4{
            margin-left:20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .urutkan input {
            width: 100px;
            height: 27px;
        }

        .urutkan select {
            width: 100px;
            height: 27px;
        }
        .table-data {
            margin-top: 30px;
            border: 5px solid #000;
            width: 900px;
            height: 300px;
            overflow-y: scroll;
        }

        .table-data table {
            margin-left:20px;
            margin-top: 10px;
            margin-bottom: 10px;
            /* margin: 30px; */
        }

        .table-data table th,td {
            text-align: center;
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
                <th><a href="home.php">Home</a></th>
                <th>&ensp;|&ensp;</th>
                <th class="active"><a href="#">Catatan Perjalanan</a></th>
                <th>&ensp;|&ensp;</th>
                <th><a href="isi_data.php">Isi Data</a></th>
            </table>

            <div class="urutkan">
                <h4>Urutkan Berdasarkan Tanggal : 
                    <select id="urut" onclick="urutkan(this)" style="margin-left: 5px; margin-right: 5px;">
                        <option value="0">Tanggal</option>
                        <option value="1">Waktu</option>
                        <option value="2">Lokasi</option>
                        <option value="3">Suhu</option>
                    </select>
                    &ensp;<input type="submit" value="Urutkan"></h4>
            </div>
            <div class="table-data">
                <table align="center" border="1" width="95%" style="border-style:solid" id="myTable">
                    <tr>
                        <th style="width:25%" id="table-title">Tanggal</th>
                        <th style="width:25%" id="table-title">Waktu</th>
                        <th style="width:25%" id="table-title">Lokasi Yang Dikunjungi</th>
                        <th style="width:25%" id="table-title">Suhu Tubuh</th>
				    </tr>
                    <?php
                        while (($row = fgets($file)) != false) {
                            $col = explode("|", $row);
                                

                            foreach ($col as $data) {
                                echo "<td>".trim($data)."</td>";
                            }
                        }
                    ?>
                    
                </table>
            </div>

            <button id="logout"><a href="logout.php">Logout</a></button>

        </div>

    </div>  
    <script src="main.js"></script>
</body>
</html>