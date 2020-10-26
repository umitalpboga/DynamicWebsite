<?php 

include 'header.php'; 



$menusor = $db->prepare("select * from menu where menu_id=:menu_id");
$menusor ->execute(array('menu_id' => $_GET['menu_id']));

$menucek = $menusor -> fetch(PDO::FETCH_ASSOC); 


?>

			<div role="main" class="main">
				<div class="container">
					<div class="row pt-xl">

						<div class="col-md-9">

							<h1 class="mt-xl mb-none"><?php  echo $menucek['menu_ad'] ?></h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<div class="row">
							
						

							<!-- hidden-xs mobilde resimleri gizler !-->
							<div class="col-md-12">

									<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
									<div class="col-md-12">
									
									<p style="font-size:14px;"><?php  echo $menucek['menu_detay']; ?></p>
	
								    </div>							
							    </span>

								</div>
							
			 				
							</div>

						</div>

						<!-- sidebar -->

						<?php include 'right-bar.php'; ?>
					</div>

				</div>
			</div>

			<?php  include 'footer.php'; ?>