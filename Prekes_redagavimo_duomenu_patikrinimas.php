
<?php
include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");
$_SESSION['pavadinimas'] = $_POST['pavadinimas'];
$_SESSION['kategorija'] = $_POST['kategorija'];
$_SESSION['aprasymas'] = $_POST['aprasymas'];
$_SESSION['name_error'];
$_SESSION['db_error'];
$_SESSION['description_error'];
$_SESSION['category_error'];

if (!isset($_POST['pavadinimas']) || strlen($_POST['pavadinimas']) == 0) {
    $_SESSION['name_error'] = "Reikalingas pavadinimas";
    header("Location: Prekes_sukurimo_langas.php");
    exit;
}
if(!isset($_POST['kategorija']) || $_POST['kategorija'] == 0){
    $_SESSION['category_error'] = "Pasirinkite kategoriją";
    header("Location: Prekes_sukurimo_langas.php");
    exit;
}
if (!isset($_POST['aprasymas']) || strlen($_POST['aprasymas']) == 0) {
    $_SESSION['description_error'] = "Reikalingas aprašymas";
    header("Location: Prekes_sukurimo_langas.php");
    exit;
}

$target_dir = "foto/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION['photo_error']="";

$photo = 0;
if(strlen(basename($_FILES["fileToUpload"]["name"])) != 0){
    $photo=1;
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $_SESSION['photo_error']= "Failas turi būti nuotrauka.";
    $uploadOk = 0;
  }

    // Check if file already exists
    $dont_upload = false;
    if (file_exists($target_file)) {
        $_SESSION['photo_error']= "Tokia nuotrauka jau yra įkelta.";
        //$uploadOk = 0;
        $dont_upload = true;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $_SESSION['photo_error']= "Failas per didelis";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['photo_error']= "Tinka tik JPG, JPEG ir PNG formatai";
    $uploadOk = 0;
    }
    $file_type;
    if($imageFileType == "jpg"){
    $file_type = 2;
    }else if($imageFileType == "png"){
    $file_type = 1;
    }if($imageFileType == "jpeg"){
    $file_type = 3;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: Prekes_sukurimo_langas.php");
        exit;
    // if everything is ok, try to upload file
    } else if(!$dont_upload){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $_SESSION['photo_error']= "Sorry, there was an error uploading your file.";    
            header("Location: Prekes_sukurimo_langas.php");
            exit;
        }
    }
    
}

// $query = "SELECT * FROM preke WHERE fk_Vartotojasid_Vartotojas='".$_SESSION["userid"]."' AND pavadinimas='".$_POST['pavadinimas']."';";
// $result = mysqli_query($db, $query);
// echo $query;
// if (!$result || (mysqli_num_rows($result) < 1))
//             {echo "Klaida skaitant lentelę users";}
// $row_preke = mysqli_fetch_assoc($result);
// echo $row_preke['id_Preke'];
$query = "UPDATE preke SET aprasymas='".$_POST['aprasymas']."', pavadinimas='".$_POST['pavadinimas']."', kategorija=".$_POST['kategorija']." WHERE id_Preke='".$_POST['id']."';";
if(!mysqli_query($db, $query)){
  $_SESSION['db_error'] = "insert preke error";
    header("Location: Prekes_sukurimo_langas.php");
    exit;
}

if($photo == 1){

    $query = "SELECT * FROM nuotrauka WHERE fk_Prekeid_Preke='".$_POST['id']."';";
    echo $query; //SELECT * FROM nuotrauka WHERE fk_Prekeid_Preke='67'
    $result = mysqli_query($db, $query);
    $row_nuotrauka = mysqli_fetch_assoc($result);
    $query = "DELETE FROM nuotrauka WHERE fk_Prekeid_Preke='".$_POST['id']."';";
    mysqli_query($db, $query);
    echo $query;  //DELETE FROM nuotrauka WHERE fk_Prekeid_Preke='67'
    $link = $row_nuotrauka['nuoroda'];
    $status = unlink($link);
    $query = "INSERT INTO nuotrauka (pavadinimas, nuoroda, formatas, fk_Prekeid_Preke)
    VALUES('" . basename($_FILES["fileToUpload"]["name"]) . "','" .$target_file. "','" . $file_type . "','" .$_POST['id']."')";
    echo $query; //INSERT INTO nuotrauka (pavadinimas, nuoroda, formatas, fk_Prekeid_Preke) VALUES('mag-20WMT-t_CA0-superJumbo.jpg','foto/mag-20WMT-t_CA0-superJumbo.jpg','2','67')
    if(mysqli_query($db, $query)){
        unset($_SESSION['pavadinimas']);
        unset($_SESSION['kategorija']);
        unset($_SESSION['aprasymas']);
        unset($_SESSION['photo_error']);
        header("Location: manoPrekes.php");  
        exit;
    }
    else{
    header("Location: Prekes_sukurimo_langas.php");
        exit;
    }
}
else{
    unset($_SESSION['pavadinimas']);
    unset($_SESSION['kategorija']);
    unset($_SESSION['aprasymas']);
    unset($_SESSION['photo_error']);
    header("Location: manoPrekes.php");  
    exit;
}



?>