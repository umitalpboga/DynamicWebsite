<?php 
$hakkimizdasor = $db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor ->execute(array(0));
$hakkimizdacek =$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>


<div class="col-md-3">
							<aside class="sidebar">
								

								<h4 class="mt-xl mb-md"><?php echo $hakkimizdacek['hakkimizda_baslik'];?></h4>

								<div class="embed-responsive embed-responsive-16by9 mb-xl">

				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>

							<h4 class="mt-xlg">Vizyonumuz</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php  echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
					<footer>Vizyonumuz</footer>
				</blockquote>
				<h4 class="mt-xlg">Misyonumuz</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				
				<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php  echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
					<footer>Misyonumuz</footer>
				</blockquote>
				

							</aside>
						</div>