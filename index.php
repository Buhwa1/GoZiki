<?php
	include("header.php")
?>
	
	<div class="container" style="margin-bottom:20px !important;" id="content">
			<div class="row" style="margin-bottom:90px !important;">
					<?php
					if(isset($_GET["id"])){
					$sid = $_GET["id"];
					$sql = "SELECT * FROM songs WHERE id=".$sid;
					$query = mysqli_query($connection,$sql);
					while($row = mysqli_fetch_array($query)){
				?>
				<div class="col-md-12 mt-4">
					<div class="card d-flex mx-auto justify-content-center">
					  <div class="card-body mx-auto">
					    <h4 class="card-title text-center"><?php echo $row["artist"]; ?></h4>
					    <h5 class="card-text text-center"><?php echo $row["song_title"]; ?></h5>
					    <a href="#" class="btn btn-primary mx-auto">Play</a>
					    <a href="#" class="btn btn-primary mx-auto">Download</a>
					  </div>
					</div>
				</div>
				<?php 
					}	
				}
				?>
				
		
			</div>
	</div>

<?php
	include("footer.php")
?>