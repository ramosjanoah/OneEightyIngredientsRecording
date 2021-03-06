<!DOCTYPE HTML>
<html>
	<head>
		<title>One Eighty Ingredients Recording</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

		<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

		<link rel="stylesheet" href="css/main.css" />

	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<img src="img/logo.png" alt="">
					<h1 id="logo"><a href="#">One Eighty Ingredient Recording, <?php session_start(); echo $_SESSION['USERNAME'];?></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="data-transaksi.php">Transaksi</a></li>
							<li><a href="data-bahan.php">Data Bahan</a></li>
							<li><a href="index.php?st=out" class="button special">Log Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Data Bahan</h2>
						</header>

						<!-- Table -->
							<section class="tabel-data-barang">
									<?php
										$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
										$conn = pg_connect($connection_string);
										$result = pg_query($conn, "SELECT * FROM bahan");	
									?>
									<table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
								    				<thead>
														<tr>
															<th>Ingredient ID</th>
															<th>Ingredient Name</th>
															<th>N of Ingredient</th>
															<th>Unit</th>
															<th>Expired Date</th>
															<th>Action</th>
														</tr>
													</thead>

													<tfoot>
														<tr>
															<th>Ingredient ID</th>
															<th>Ingredient Name</th>
															<th>N of Ingredient</th>
															<th>Unit</th>
															<th>Expired Date</th>
															<th>Action</th>
														</tr>
													</tfoot>

													<tbody>
														
													<?php 

														while ($row = pg_fetch_row($result)) {

														?>
														<tr>
															<td><?php echo $row[0]; ?></td>
															<td><?php echo $row[1]; ?></td>
															<td><?php echo $row[2]; ?></td>
															<td><?php echo $row[3]; ?></td>
															<td><?php echo $row[4]; ?></td>
								             			<td>
														<button onclick='javascript:confirmationDelete($(this)); return false;' 
														href='delete-bahan-handler.php?id=<?php echo $row[0];?>'
														class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" title="delete"><span class="glyphicon glyphicon-trash">
														</tr>
														<?php 

														}

														?>

														
													</tbody>
												</table>

							</section>
						<div class="row">
							<div class="6u 12u$(xsmall)">
								<ul class="actions">
									<li><a href="tambah-bahan.php" class="button special">Tambah Bahan</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>

				<div class="modal fade" id="delete-success" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      		<div class="modal-dialog">
    				<div class="modal-content">
	          	<div class="modal-body">
			         <center><h4>Delete Success!</h4></center>
	      			</div>
		          <div class="modal-footer ">
		        		<button type="button" class="btn btn-danger btn-lg" style="width: 100%;" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OK</button>
		      		</div>
        		</div>
    				<!-- /.modal-content -->
  				</div>
      	<!-- /.modal-dialog -->
    		</div>
<!-- 
		    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		      <div class="modal-dialog">
		    		<div class="modal-content">
		        	<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        		<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
		      		</div>
		        	<div class="modal-body">
		       			<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
		      		</div>
			        <div class="modal-footer ">
			        	<button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#delete-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
			        	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			      	</div>
		        </div>
		    	<!-- /.modal-content -->
		  		<!-- </div> -->
		    <!-- /.modal-dialog -->
		    <!-- </div> --> -->

			<!-- Footer -->
				<footer id="footer">

					<ul class="copyright">
						<li>&copy; All rights reserved.</li><li>2017</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/table.js"></script>
		<script type="text/javascript">
			function confirmationDelete(anchor)
			{
			   var conf = confirm('Are you sure want to delete this record?');
			   if(conf)
			      window.location=anchor.attr("href");
			}
		</script>
	</body>
</html>
