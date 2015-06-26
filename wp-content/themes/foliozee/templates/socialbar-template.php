<?php 
global $fdata;
$socials = $fdata[ 'enable_social_sharing' ][ 'enabled' ];unset( $socials['placebo'] );?>
                        <?php if( count($socials) > 0 ):?>
                            <div class="social_media">
                                <span><?php echo $fdata['share_bar_title'];?></span>
                                <ul>
                                    
                                    
									<?php foreach( $socials as $name => $socail ): ?>
                                        <li><a href="javascript:void(0);" onClick="<?php echo $name.'Sharer'?>()">
                                            <?php if( $name === 'google' ) $name.= '-plus'; ?>
                                            <i class="fa fa-<?php echo $name;?>"></i></a>
                                        </li>
                                        
                                    <?php   endforeach;?>
                                </ul>
                            </div>
                         <?php endif;?>
						 
