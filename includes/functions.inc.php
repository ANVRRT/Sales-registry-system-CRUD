

<?php

function invalididU($idUsuario){
    if(preg_match("/^[a-zA-Z0-9]*$/<", $idUsuario)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pswrdMatch($contrasena, $repcontrasena){
    if($contrasena !== $repcontrasena){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function iduExists($conn, $idUsuario){
    $sql = "SELECT * FROM Usuario WHERE idUsuario = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $idUsuario);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function idcompExists($conn, $idCompania){
    $sql = "SELECT * FROM Compania WHERE idCompania = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $idCompania);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        $result = true;
        return $result;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    exit();
}

// function rolExists($conn, $rol){
//     $sql = "SELECT * FROM Rol WHERE rol = ? ;";
//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt,$sql))
//     {
//         header("location: ../php/register.php?error=stmtfailed");
//         exit();
//     }
//     mysqli_stmt_bind_param($stmt,"s", $rol);
//     mysqli_stmt_execute($stmt);

//     $resultData = mysqli_stmt_get_result($stmt);

//     if($row = mysqli_fetch_assoc($resultData))
//     {
//         $result = true;
//         return $result;
//     }
//     else{
//         $result = false;
//         return $result;
//     }

//     mysqli_stmt_close($stmt);
//     exit();
// }



function createUser($conn, $idUsuario, $idCompania, $rol, $nombre, $contrasena){
    $sql = "INSERT INTO Usuario VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../php/register.php?error=stmtfailed");
        exit();
    }

    $hashedPswrd = password_hash($contrasena, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssss", $idUsuario, $idCompania, $nombre, $hashedPswrd, $rol);
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_close($stmt);
        header("location: ../php/register.php?error=success");
        exit();
    }
    else{
        mysqli_stmt_close($stmt);
        header("location: ../php/register.php?error=sqlerror");
        exit();
    }
    
   

}

function loginUser($conn, $idUsuario, $pswrd)
{
    $iduExists = iduExists($conn, $idUsuario);

    if ($iduExists == false)
    {
        header("location: ../php/login.php?error=user!exists");
        exit();
    }
    $pswrdHashed = $iduExists["contrasena"];

    $checkPswrd = password_verify($pswrd, $pswrdHashed);

    if ($checkPswrd == false)
    {
        header("location: ../php/login.php?error=wrongpswrd");
        exit();
    }
    else if ($checkPswrd == true)
    {
        // $sql = "SELECT * FROM Permiso WHERE idUsuario = ? ;";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt,$sql))
        // {
        //     header("location: ../php/register.php?error=stmtfailed");
        //     exit();
        // }
        // mysqli_stmt_bind_param($stmt,"s", $idUsuario);
        // mysqli_stmt_execute($stmt);

        // $resultData = mysqli_stmt_get_result($stmt);

        // if($row = mysqli_fetch_assoc($resultData))
        // {
        //     $_SESSION["permisos"] = $row;
        // }
        session_start();
        $_SESSION["idUsuario"] = $iduExists["idUsuario"];
        $_SESSION["idCompania"] = $iduExists["idCompania"];
        $_SESSION["rol"] = $iduExists["rol"];
        header("location: ../php/index.php");
        exit();
    }
}









?>

