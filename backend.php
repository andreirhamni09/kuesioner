<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kuesioner";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if(!isset($_POST['nama_pelanggan']) AND !isset($_POST['perusahaan']) AND !isset($_POST['komen']))
    {

    }

    $nama_pelanggan     = htmlspecialchars($_POST['nama_pelanggan']);
    $perusahaan         = htmlspecialchars($_POST['perusahaan']);
    $nomor              = htmlspecialchars($_POST['nomor']);
    $s_aspek            = '';
    $j_aspek            = count($_POST['aspek']) - 1;
    for ($i=0; $i < count($_POST['aspek']) ; $i++) { 
        if($i != $j_aspek)
        {
            if(isset($_POST['aspek_'.$i.'']))
            {
                $s_aspek .= $_POST['aspek_'.$i.''].'-';
            }
            else{
                $s_aspek .= '-';
            }
        }
        else{
            if(isset($_POST['aspek_'.$i.'']))
            {
                $s_aspek .= $_POST['aspek_'.$i.''].'';
            }
            else{
                $s_aspek .= '';
            }
        }
    }
    $komen              = htmlspecialchars($_POST['komen']);
    
    $sql = 'INSERT INTO kuesioner (nama_pelanggan, perusahaan, komen, nilai)
    VALUES ("'.$nama_pelanggan.'", "'.$perusahaan.'", "'.$komen.'", "'.$s_aspek.'")';

    if ($conn->query($sql) === TRUE) {
        header('location:index?status=1');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error.'<br><br>';
        $loc = "index?status=".$conn->error."&nama_pelanggan=".$nama_pelanggan."&perusahaan=".$perusahaan."&aspek=".$s_aspek."&komen=".$komen;
        echo '
                <a href="'.$loc.'"><button>KEMBALI</button></a>
        ';
    }

?>