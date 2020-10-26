
<?php 
$ayarsor = $db->prepare("select * from ayar where ayar_id=?");
$ayarsor ->execute(array(0));
$ayarcek =$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider manual">
						<ul>


						<?php               
              $slidersor = $db->prepare("select * from slider where slider_durum = 1 order by slider_sira  ");
              $slidersor ->execute();
              while( $slidercek =$slidersor->fetch(PDO::FETCH_ASSOC) )
              { ?>


							<li data-transition="fade" data-title= "<?php $ayarcek['ayar_author']; ?>" data-thumb= "<?php echo $slidercek['slider_resimyol']; ?>">

								<img src="<?php echo $slidercek['slider_resimyol']; ?>"  
									alt="<?php echo $slidercek['slider_ad']; ?>"
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">
								
							</li>
			 				 <?php } ?>
						</ul>
					</div>
                </div>