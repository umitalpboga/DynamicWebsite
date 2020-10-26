<?php 

include 'header.php'; 




?>

			<div role="main" class="main">
				<div class="container">
					<div class="row pt-xl">

						<div class="col-md-9">

							<h1 class="mt-xl mb-none">Haberler</h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<div class="row">
							
							<?php               

                  $sayfada = 4;//sayfada gösterilecek icerik miktarı
                  
                           
				  $sorgu = $db->prepare("select * from icerik ");
                  $sorgu->execute();
                  $toplam_icerik = $sorgu->rowCount();
                  
                  $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                  
                  //eger sayfa girilmemişse 1 varsayalım
                  $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                  
                  //eger 1 den kücük bir sayfa sayısı girilmemişse 1 yapalım
                  if($sayfa < 1) $sayfa = 1;
                  
                  //toplam sayfa sayımızdan  fazla yazılırsa en son sayfayı varsayalım.
                  if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                  
                  $limit = ($sayfa - 1) * $sayfada;
                  
             
               $iceriksor = $db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada ");
               $iceriksor ->execute();

			 			foreach($iceriksor as  $haberler)
						 { ?>

							<!-- hidden-xs mobilde resimleri gizler !-->
							<div class="col-md-12">

									<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
										<span class="thumb-info-side-image-wrapper p-none ">
										
												<img src="<?php echo $haberler['icerik_resimyol'] ?>" class="img-responsive" alt="" style="width:395px; height:250px; padding:10px;  ">
										
										</span>
										<span class="thumb-info-caption">
											<span>
												<h2 class="mb-md mt-xs"><?php  echo $haberler['icerik_ad'] ?></h2>
												<span class="post-meta">
													<span><?php echo  $haberler['icerik_zaman']; ?> | tarihinde yazıldı </span>
												</span>
												<p class="font-size-md" ><?php  echo substr($haberler['icerik_detay'],0,200) ?>...</p>
												<a class="mt-md" href="haber-<?= seo($haberler["icerik_ad"]).'-'.$haberler["icerik_id"] ?>">Devamını Oku <i class="fa fa-long-arrow-right"></i></a>
											</span>
										</span>
									</span>
									
								</div>
							
			 					<?php } ?>

								<div class="col-md-12" align="middle">
						 <ul class="pagination" >
                        <li>
                        <a href="haberler?sayfa=<?php echo $_GET['sayfa']-1; ?>">&laquo;</a>
                    </li>
                        <?php

                            $s=0;

                            while ($s < $toplam_sayfa) {

                                $s++; ?>

                                <?php 

                                if ($s==$sayfa) {?>

                                    <li class="active">

                                        <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                                    </li>

                                    <?php } else {?>

                                       <li>

                                        <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                                    </li>

                                    <?php }
                                }
                                ?>
                                <li>
                                    <a href="haberler?sayfa=<?php echo $_GET['sayfa']+1; ?>">&raquo;</a>
                                </li>
                            </ul>
						</div>
							</div>

						</div>

						<!-- sidebar -->

								<?php include 'right-bar.php'; ?>
					</div>

				</div>
			</div>

			<?php  include 'footer.php'; ?>