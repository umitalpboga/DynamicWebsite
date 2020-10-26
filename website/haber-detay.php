<?php 

include 'header.php'; 




$iceriksor = $db->prepare("select * from icerik where icerik_id=:icerik_id");
$iceriksor ->execute(array('icerik_id' => $_GET['icerik_id']));

$icerikcek = $iceriksor -> fetch(PDO::FETCH_ASSOC); 


?>

			<div role="main" class="main">
				<div class="container">
					<div class="row pt-xl">

						<div class="col-md-9">

							<h1 class="mt-xl mb-none"><?php  echo $icerikcek['icerik_ad'] ?></h1>
							<div class="divider divider-primary divider-small mb-xl">
								
								<hr>
								<p align="right"><?php echo $icerikcek['icerik_zaman']; ?> | tarihinde yazıldı</p>
							</div>

							<div class="row">
							
						

							<!-- hidden-xs mobilde resimleri gizler !-->
							<div class="col-md-12">
								<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
									<div class="col-md-12">
									
							<p style="font-size:14px; !important;"><img src="<?php echo $icerikcek['icerik_resimyol'] ?>" class="img-responsive" alt="" style="float:left; width:395px; height:250px; padding:10px;  margin-top:10px; margin-right:5px; margin-left:-10px;   "><?php  echo $icerikcek['icerik_detay']; ?></p>
							<hr>
							     <p style="font-size:16px;" ><b>Anahtar Kelimeler :  </b>
								   <?php  $etiketler=explode(',', $icerikcek['icerik_keyword']); 
								   
									$etiketler[0];
							

								  foreach($etiketler as $etiketbas)
								  {?>
										
									<a href="arama?aranan=<?php echo $etiketbas; ?>"><button class="btn btn-primary btn-xs"><?php echo $etiketbas; ?></button></a>


								<?php  }
								    ?>
								 </p>	

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