    <!-- cp navi wrapper Start -->
    <nav class="cd-dropdown  d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <h2><a href="<?php echo base_url(); ?>"> <span><img style="width:50%;" src="<?php echo FRONT_IMAGES?>vectortechlogo2.png" alt="img"></span></a></h2>
        <a href="#0" class="cd-close">Close</a>
       <ul class="cd-dropdown-content">
            <li>
                <form class="cd-search">
                    <input type="search" placeholder="Search...">
                </form>
            </li>
            <li>
                <form class="cd-search">
                    <input type="search" placeholder="Search...">
                </form>
            </li>
            <li class="">
                <a href="<?php echo base_url();?>">home</a>
                
            </li>
            <li class="">
                <a href="<?php echo base_url('jobs');?>">jobs</a>
               
            </li>
			
            <!-- .has-children -->
            <li class="">
                <a href="<?php echo base_url('about-us');?>">about us</a>
                
            </li>
            <li class="">
                <a href="<?php echo base_url('dashboard');?>">dashboard</a>
                    
			</li>
             
           
            <li><a href="<?php echo base_url('contact-us');?>">contact us </a></li>
            <li><a href="<?php echo base_url('logout');?>">Logout </a></li>
			
        </ul>
        <!-- .cd-dropdown-content -->
    </nav>
   <div class="cp_navi_main_wrapper jb_cover">
        <div class="container-fluid">
            <div class="cp_logo_wrapper">
                <a href="<?php echo base_url(); ?>">
                    <img style="width:50%;" src="<?php echo FRONT_IMAGES?>vectortechlogo2.png" alt="logo">
                </a>
            </div>
            <!-- mobile menu area start -->
            <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cd-dropdown-wrapper">
                                <a class="house_toggle" href="#0">
                                
								    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#004165" />
                                            </g>
                                        </g>
                                    </svg>
                                
								</a>
                                <!-- .cd-dropdown -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .cd-dropdown-wrapper -->
            </header>
            <div class="menu_btn_box jb_cover">
               <div class="jb_profile_box">
                   <div class="nice-select" tabindex="0"> <span class="current">
				   <?php if(isset($profile->profile_picture) && $profile->profile_picture!="") { ?>
					<img width="40 px;" height="40 px;" src="<?php echo PROFILE_IMAGES.$profile->profile_picture;?>" alt="img">
					<?php }else{ ?>
					<img src="<?php echo FRONT_IMAGES?>pf.png" alt="img"> 
					<?php } ?>
					
				   
				   <div class="luca_profile_wrapper"><h1 style="line-height: 18px;"><a href="#"><?php echo ($this->session->userdata('candidate_name'))?$this->session->userdata('candidate_name'):'N/A';?></a></h1>
				   <p><a href="#"><?php echo ($this->session->has_userdata('candidate_email'))?$this->session->userdata('candidate_email'):'N/A';?></a></p>
				   </div></span>
                      <ul class="list">
							<li><a href="<?php echo base_url('dashboard');?>"><i class="fas fa-user-edit"></i>account</a>
							</li>					
							<li><a href="<?php echo base_url('candidate-edit-profile');?>"><i class="fas fa-cog"></i>Setting</a>
							</li>				
							<li><a href="<?php echo base_url('logout');?>"><i class="fas fa-sign-in-alt"></i>logout</a>
							</li>
					</ul>
                   </div>
                </div>
            </div>

            <div class="jb_navigation_wrapper">
                <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                    <ul class="main_nav_ul">
                         <li class="has-mega gc_main_navigation"><a href="<?php echo base_url(); ?>" class="gc_main_navigation <?php echo (!isset($last_segment) || ($last_segment==''))?'active_class':'' ?>">home</a>
                            
                        </li>
                        <li class="has-mega gc_main_navigation"><a href="<?php echo base_url('jobs'); ?>" class="gc_main_navigation <?php echo (isset($last_segment) && ($last_segment=='jobs'))?'active_class':'' ?> ">jobs</a>
                            
                        </li>
						<li class="has-mega gc_main_navigation"><a href="<?php echo base_url('about-us'); ?>" class="gc_main_navigation <?php echo (isset($last_segment) && ($last_segment=='about-us'))?'active_class':'' ?> ">About Us</a>
                            
                        </li>
                          
                        <li class="has-mega gc_main_navigation"><a href="<?php echo base_url('dashboard'); ?>" class="gc_main_navigation <?php echo (isset($last_segment) && ($last_segment=='dashboard'))?'active_class':'' ?> ">dashboard</a>
                        </li>
                        
                        <li><a href="<?php echo base_url('contact-us'); ?>" class="gc_main_navigation <?php echo (isset($last_segment) && ($last_segment=='contact-us'))?'active_class':'' ?> ">contact</a></li>

                    </ul>
                </div>
                <!-- mainmenu end -->
                <div class="jb_search_btn_wrapper d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <button id="quik-search-btn" type="button" class="site-button radius-xl"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <!-- Quik search -->
                    <div class="dez-quik-search bg-primary-dark">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search...">
                            <span id="quik-search-remove"><i class="fas fa-times"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navi wrapper End -->