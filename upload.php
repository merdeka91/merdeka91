<!DOCTYPE html>
<html>
<head>
	<title>SMAN 1 GARUT</title>
	<link rel="shortcut icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="container">
    	<div id="header">
    		<h1><img src="logo.png" width="100px"/></h1>
			<h3> WEB PENGUMPULAN TUGAS SMAN 1 Garut</h3>
        </div>
        
        <div id="menu">
        	<a href="index.php" class="active">Home</a>
            <a href="upload.php">Upload</a>
            <a href="/data">Download</a>
        </div>
        
        <div id="content">
        	<h2>Upload</h2>
            <p>Upload file Anda dengan melengkapi form di bawah ini. File yang bisa di Upload hanya file dengan ekstensi <b>.c, .cpp, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, .rar, .zip</b> dan besar file (file size) maksimal hanya 1 MB.</p>
            
            <?php
			if(isset($_POST['upload'])){
				$allowed_ext	= array('c','cpp','doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				
				$nama			= $_POST['nama'];
				$kelas			= $_POST['kelas'];
				$tgl			= date("Y-m-d");
				
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 10440700){
						$lokasi = 'filesx/'.$tgl.'_'.$kelas.'_'.$nama.'.'.$file_ext;
						$in = move_uploaded_file($file_tmp, $lokasi);
						if($in){
							echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
						}else{
							echo '<div class="error">ERROR: Gagal upload file!</div>';
						}
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 10 Mb!</div>';
					}
				}else{
					echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
				}
			}
			?>
            
            <p>
            <form action="" method="post" enctype="multipart/form-data">
            <table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0">
            	<tr>
                	<td width="40%" align="right"><b>Nama Murid</b></td><td><b>:</b></td><td><input type="text" name="nama" size="40" required /></td>
                </tr>
				<tr>
                	<td width="40%" align="right"><b>Kelas</b></td><td><b>:</b></td><td>
						<select name="kelas" required>
							<option value="" readonly>Pilih Kelas</option>
							<option value="10MIPA1">X MIPA 1</option>
							<option value="11MIPA9">XI MIPA 9</option>
							<option value="11IPS1">XI IPS 1</option>
							<option value="11IPS2">XI IPS 2</option>
							<option value="11IPS3">XI IPS 3</option>
						</select>
					</td>
                </tr>
                <tr>
                	<td width="40%" align="right"><b>Pilih File</b></td><td><b>:</b></td><td><input type="file" name="file" required /></td>
                </tr>
                <tr>
                	<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="upload" value="Upload" /></td>
                </tr>
            </table>
            </form>
            </p>
        </div>
    </div>

</body>
</html>