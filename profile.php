<?php
// session_start();
include "koneksi.php";

// Ambil data pengguna dari database
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT foto FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $foto = $_FILES['foto'];
    $foto_lama = $_POST['foto_lama'];
    $update = false;

    // Update password jika diisi
    if (!empty($password)) {
        $hashed_password = md5($password);
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        $stmt->execute();
        $update = true;
    }

    // Update foto jika ada file yang diupload
    if ($foto['name'] != '') {
        include "upload_photo.php"; // Pastikan untuk menyertakan file upload_foto.php
        $upload_result = upload_foto($foto, 'replace', $foto_lama);
        
        if ($upload_result['status']) {
            $new_foto = $upload_result['message'];
            $stmt = $conn->prepare("UPDATE user SET foto = ? WHERE username = ?");
            $stmt->bind_param("ss", $new_foto, $username);
            $stmt->execute();
            $update = true;
        } else {
            echo "<script>alert('" . $upload_result['message'] . "');</script>";
        }
    }

    if ($update) {
        echo "<script>alert('Profile berhasil diperbarui');</script>";
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="mb-3">
            <label for="formGroupExampleInput1" class="form-label">Ganti Password</label>
            <input type="text" class="form-control" name="password" placeholder="Isi password jika ingin di ganti">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Ganti Profile</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Profile Lama</label>
            <?php
            if ($row["foto"] != '') {
                if (file_exists('img/' . $row["foto"] . '')) {
                    ?>
                    <br><img src="img/<?= $row["foto"] ?>" width="100">
                    <?php
                }
            }
            ?>
            <input type="hidden" name="foto_lama" value="<?= $row["foto"] ?>">
        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
    </div>
</form>