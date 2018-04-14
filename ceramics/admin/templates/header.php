<?php
	if (isset($_SESSION["userid"])) {
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="http://localhost/ceramics/admin/dashboard.php">Vijay Ceramics</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse nav navbar-nav navbar-right"" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
				<a class="nav-link" href="http://localhost/ceramics/admin/dashboard.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active navbar-right">
				<a class="nav-link" href="logout.php"><i class="fa fa-user">&nbsp;</i>Logout</a>
				</li>
                	</ul>

		</div>	
	</nav>
            <?php
          }
       
	else {
?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="http://localhost/ceramics/index.php">Vijay Ceramics</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
				<a class="nav-link" href="http://localhost/ceramics/index.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
				</li>
                	</ul>

		</div>	
	</nav>
            <?php
          }
        ?>      

