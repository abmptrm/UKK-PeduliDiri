<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri | Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container{
            display: flex;
            justify-content: center;
            margin-top: 15%;
        }
        
        input {
            width: 300px;
            height: 30px;
            padding: 3px;
        }

        .tombol {
            padding-top: 20px;
        }

        #btn_daftar {
            float: left;
            width: 150px;
            height: 33px;
            
        }

        #btn_masuk {
            float: right;
            width: 100px;
            height: 33px;
        }

        
    </style>
</head>
<body>
    
    <div class="container">
        <form action="" method="post">
            <center><h1>Log in</h1></center><br>
            <label for="nik"></label>
            <input type="text" name="nik" placeholder="NIK"><br><br>
            <label for="Nama"></label>
            <input type="text" name="nama" placeholder="Nama Lengkap">
            <div class="tombol">
                <button type="submit" name="daftar" id="btn_daftar">Saya Pengguna Baru</button>
                <button type="submit" name="masuk" id="btn_masuk">Masuk</button>
            </div>
        
        </form>
       
        
    </div>
    
</body>
</html>

<?php

    // Daftar 
    if (isset($_POST['daftar'])){
        echo "<meta http-equiv='refresh' content='0'>";
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $text = "$nik|$nama\n";
        $file = fopen("txt/sv_login.txt", "a+");

        // cek data
        $datafile = file_get_contents("txt/sv_login.txt");
        $contentfile = explode("\n", $datafile);

        foreach ($contentfile as $value) {
            $login = explode("|", $value);
            $nik1 = $login[0];
            $nama1 = $login[1];

            if ($nik1 == $_POST['nik'] && $nama1 == $_POST['nama']) {
                echo '<script>alert("Anda Sudah Terdaftar!");</script>';
                return;
            }
        }

        if ($nik == "" || $nama == ""){
            echo '<script>alert("Masukan Data Anda!");</script>';
            return;
        } else {
            if (fwrite($file, $text)) {
                echo '<script>alert("Anda Berhasil Mendaftar!");</script>';
            } else {
                echo '<script>alert("Anda Gagal Mendaftar!");</script>';
            }
        }

    }

    // Masuk 
    else if (isset($_POST['masuk'])){
        $data = file_get_contents("txt/sv_login.txt");
        $content = explode("\n", $data);

        foreach ($content as $value) {
            $login = explode("|", $value);
            $nik = $login[0];
            $nama = $login[1];

            if ($_POST['nik'] == "" || $_POST['nama'] == "") {
                echo '<script>alert("Masukan Data Anda!");</script>';
                return;
            } else {
                if ($nik == $_POST['nik'] && $nama == $_POST['nama']){
                    session_start();
                    $_SESSION['username'] = $nama;
                    header("Location: home.php");
                } else {
                    echo '<script>alert("Akun Anda Tidak Terdaftar!");</script>';
                }
            }
            
        }
    }
?>