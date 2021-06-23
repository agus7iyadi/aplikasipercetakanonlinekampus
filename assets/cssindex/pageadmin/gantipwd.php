
    <?php
    include "config.php";
    if (isset($_POST["Ganti"])) {
        $password=md5($_POST["password_lama"]);
        $passwordbaru=md5($_POST["password_baru"]);
        $cek=mysqli_query($koneksi,"SELECT * FROM users WHERE id='$_SESSION[id_user]' and password='$password'");
        if (mysqli_num_rows($cek)>0) {
            if ($_POST["password_baru"]==$_POST["konf_password"]) {
                $sql=mysqli_query($koneksi,"UPDATE users SET password='$passwordbaru' WHERE id='$_SESSION[id_user]'");
                if ($sql) {
                    echo "<script>alert('password telah diganti')</script>";
                }else{
                  echo "<script>alert('gagal  diganti')</script>";  
                }
            }else{
                echo "<script>alert('Konfirmasi password tidak sama')</script>";
            }
        }else{
            echo "<script>alert('password lama tidak valid')</script>";
        }
    }
?>

<section id="main-content">
<br>

<form action="#" method="POST" name="form-ganti-password" enctype="multipart/form-data">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="56" align="center">
            <td><font size="2" color="FFA800"><b>FORM GANTI PASSWORD</b></font></td>
        </tr>
    </table>
    <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
        
        <tr height="36">
            <td>Password Lama</td>
            <td><input type="password" name="password_lama" id="password_lama" size="30" maxlength="20"></td>
        </tr>
        <tr height="36">
            <td>Password Baru</td>
            <td><input type="password" name="password_baru" id="password_baru" size="30" maxlength="20"></td>
        </tr>
        <tr height="36">
            <td>Konfirm Password Baru</td>
            <td><input type="password" name="konf_password" id="konf_password" size="30" maxlength="20"></td>
        </tr>
        <tr height="56">
            <td> </td>
            <td><input type="submit"  class="btn btn-danger" name="Ganti" value="Ganti"></td>
        </tr>
    </table>
</form>
</section>