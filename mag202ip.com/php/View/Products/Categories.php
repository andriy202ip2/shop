<?php 
//var_dump($Args);
?>
<h3>
							Product Category
						</h3>
						<ul class="linkedList">
                                                    <?php
                                                    foreach ($Args['Categories'] as $val) {
                                                    ?>
                                                        <li class="first">
                                                            <a href="/Products/SubCategories/<?php echo $val->Id;?>"><?php echo $val->Name; ?></a>
							</li>
                                                    <?php                                                    
                                                    }
                                                    ?>
						</ul>
