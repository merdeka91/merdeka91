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
        	<h2>Download</h2>
            <p>Silahkan download file yang sudah di Upload di website ini. Untuk men-Download Anda bisa mengklik Judul file yang di inginkan.</p>
            
            <p>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
            	<tr>
                	<th width="30">No.</th>
                    <th width="80">Tgl. Upload</th>
                    <th>Nama File</th> 
			<th width="70">Tipe</th>
                    <th width="70">Ukuran</th>
                </tr>
                <?php
				include('config.php');
				$sql = mysql_query("SELECT * FROM download ORDER BY id DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						echo '
						<tr bgcolor="#fff">
							<td align="center">'.$no.'</td>
							<td align="center">'.$data['tanggal_upload'].'</td>
							<td><a href="'.$data['file'].'">'.$data['nama_file'].'</a></td>
							<td align="center">'.$data['tipe_file'].'</td>
							<td align="center">'.formatBytes($data['ukuran_file']).'</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>
					';
				}
				?>
            </table>
            </p>
        </div>
    </div>

</body>
</html>
