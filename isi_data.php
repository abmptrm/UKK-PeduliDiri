<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri | Isi Data</title>
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

        #active a{
            color: rgb(8, 26, 11);
        }

        .content a {
            text-decoration: none;
            color: rgb(84, 250, 112);
        }

        .content table a:hover {
            
            color: rgb(29, 88, 39);
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

        .isi-data {
            margin-top: 50px;
            border: 5px solid #000;
            width: 900px;
            height: 350px;
        }

        .isi-data form {
            margin-top: 50px;
            margin-left: 200px;
        }

        .isi-data label {
            float: left;
            margin-right: 100px;
        }

        .isi-data input {
            float: right;
        }

        .isi-data table tr {
            height: 50px;
        }

        .isi-data #date, #time {
            width: 170px;
        }

        .isi-data button {
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
                <th><a href="home.php">Home</a></th>
                <th>&ensp;|&ensp;</th>
                <th><a href="catatan_perjalanan.php">Catatan Perjalanan</a></th>
                <th>&ensp;|&ensp;</th>
                <th id="active"><a href="#">Isi Data</a></th>
            </table>

            <div class="isi-data">
                <form action="" method="POST">

                    <table>
                        <tr>
                            <th ><label for="tanggal">Tanggal</label></th>
                            <th><input type="date" name="tanggal" id="date"></th>
                        </tr>
                        <tr>
                            <th><label for="jam">Jam</label></th>
                            <th><input type="time" name="jam" id="time"></th>
                        </tr>
                        <tr>
                            <th><label for="lokasi">Lokasi yang dikunjungi</label></th>
                            <th><input type="text" name="lokasi" id="lokasi"></th>
                        </tr>
                        <tr>
                            <th><label for="suhu">Suhu</label></th>
                            <th><input type="text" name="suhu" id="suhutubuh"></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th><button style="float: right;" name="simpan" type="submit">Simpan</button></th>
                        </tr>
                        
                    </table>
                    
                </form>
            </div>
            
            <button><a href="logout.php">Logout</a></button>

        </div>
        
    </div>
</body>
</html>

<?php
    if (isset($_POST['simpan'])) {
        echo "<meta http-equiv='refresh' content='0'>";
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $lokasi = $_POST['lokasi'];
        $suhu = $_POST['suhu'];

        $nama = $_SESSION['username'];

        $text = "$tanggal|$jam|$lokasi|$suhu </tr>\n";
        $file = "txt/user/$nama.txt";

        $dirname = dirname($file);

        if (!is_dir($dirname)) {
            mkdir($dirname, 0775, true);
        } 

        if($tanggal == "" || $jam == "" || $lokasi == "" || $suhu == ""){
            echo '<script>alert("Masukan Data Anda!");</script>';
            return;
        } else {
            $file_c = fopen($file, "a+");
            if (fwrite($file_c, $text)) {
                echo '<script>alert("Data Berhasil Di Simpan!");</script>';
            } else {
                echo '<script>alert("Data Gagal Di Simpan!");</script>';
                return;
            }
        }

        
            
        
        
        

        
    }
?>