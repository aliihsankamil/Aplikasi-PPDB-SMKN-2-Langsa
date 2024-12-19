<?php  
	if(isset($_GET['tipe'])){
		if($_GET['tipe']=='edit'){
			$sqledit = mysqli_query($koneksi, "SELECT * from kategori where id='$_GET[id]'");
			$da = mysqli_fetch_array($sqledit);
			echo "
				<h3>Edit Kategori</h3>
				<form method='post' action='module/kategori/proses_edit.php'>
					<table>
						<tr>
							<input type='hidden' name='id' value='$da[id]'>
							<td>Nama Kategori</td>
							<td><input type='text' name='nama' value='$da[nm_kategori]'></td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' value='Edit' name='edit'><input type='button' value='Batal' onClick='history.back();'></td>
						</tr>
					</table>
				</form>
			";
		}
	}else{
	?>

	<!-- Content Header (Page header) -->
	<div class='content-header'>
			<div class='container-fluid'>
				<div class='row mb-2'>
					<div class='col-sm-6'>
						<h1 class='m-0 text-dark'>Pendaftar</h1>
					</div>
					<!-- /.col -->
					<div class='col-sm-6'>
						<ol class='breadcrumb float-sm-right'>
							<li class='breadcrumb-item'><a href='#'>Pendaftar</a></li>
						</ol>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		
		<!-- Main content -->
		<section class='content'>
			<!-- TO DO List -->
			<div class='card'>
				<div class='card-header'>
					<div>
						
					</div>
				</div>
				<div class="card-body">
					<div class="input-group">
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
						</div>
						<input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</section>

	<?php
	}
?>