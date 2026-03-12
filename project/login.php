<?php
/**
 * Kapag ang method sa loob ng form ay nakadepende sa kung anong superglobal variable ang gagamitin
 * method="post" $_POST
 * method="get" $_GET
 */

$username = "admin@gmail.com";
$password = "Password123";


// if ($_POST['username'] == $username && $_POST['password'] == $password) {
//     echo "success";
// } else {
//     echo "failed";
// }


//echo md5($password);
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);
if ( password_verify($_POST['password'], $passwordHashed)) {
    echo "correct";
} else {
    echo "failed";
}