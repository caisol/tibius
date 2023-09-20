
 <!--End  courses section -->
        <div class="container-fluid gurantee_cont">
            <div class=" gurantee_cont carousel_width">
                <!--<div class="row">
                    <div class="col-md-12 ">
                        <h2>Skill up and get certified, <span class="font-weight-bold">Guaranteed</span></h2>
                    </div>
                </div>-->
				<?php if(isset($first_heading) && $first_heading!="") { ?> 
                <div class="row">
                    <div class="col-md-10  exam_des">
                       <div class="gurantee_box " >
                         <div class="">
                          <!--<h6 class="heading heading_color">Introduction</h6>-->
                            <p class=" text-justify"><?php echo isset($first_heading)?$first_heading:''; ?></p>
                           
                        </div>
                        <!--<div class="scroll">
                          <div class="inner_scroll"></div>
                        </div>
                       </div>-->
                    </div>
                    <!--<div class="col-md-5 exam_img">
                        <img src="<?php echo FRONT_IMAGES;?>1-sm.png" class="img-fluid"> 
                    </div>-->
                </div>
                </div>
                <?php } ?> 
                <?php if(isset($second_heading) && $second_heading!="") { ?>            
                <div class="row ">
                    <div class="col-md-10 gurant_des mt-5">
                       <div class="gurantee_box ">
                         <div class="">
                        <!--<h6 class="heading heading_color">100% Satisfaction Guarantee</h6>-->
                            <p class=" text-justify"><?php echo isset($second_heading)?$second_heading:''; ?></p>
                           
                        </div>
                        <!--<div class="scroll">
                          <div class="inner_scroll"></div>
                        </div>-->
                       </div>
                    </div>
                    <!--<div class="col-md-5 gurant_img">
                        <img src="<?php echo FRONT_IMAGES;?>2-sm.png" class="img-fluid "> 
                    </div>-->
                </div>
				<?php } ?>
				<?php if(isset($third_heading) && $third_heading!=""){?>
                 <div class="row ">
                    <div class="col-md-10 tansfer_des mt-5">
                       <div class="gurantee_box ">
                         <div class="">
                          <!--<h6 class="heading heading_color">Knowledge Transfer Guarantee</h6>-->
                            <p class=" text-justify"><?php echo isset($third_heading)?$third_heading:"";?></p>   
                           
                        </div>
                        <!--<div class="scroll">
                          <div class="inner_scroll"></div>
                        </div>-->
                       </div>
                    </div>
                    <!--<div class="col-md-5 tansfer_img">
                        <img src="<?php echo FRONT_IMAGES;?>3-sm.png" class="img-fluid"> 
                    </div>-->
                </div>
				<?php } ?>
            </div>
        </div>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
    $('.slide1').waypoint(function(direction){
         $('.slide1').addClass('animated rotateInDownLeft delay-5s');
    },{
        offset:'50%'
    });

    $('.slide2').waypoint(function(direction){
         $('.slide2').addClass('animated rotateInDownLeft 5s');
    },{
        offset:'50%'
    });

    $('.slide3').waypoint(function(direction){
         $('.slide3').addClass('animated rotateInDownLeft 5s');
    },{
        offset:'50%'
    });

    $('.mission_1').waypoint(function(direction){
         $('.mission_1').addClass('animated slideInLeft 5s');
    },{
        offset:'50%'
    });

    $('.orient_cont').waypoint(function(direction){
         $('.orient_cont').addClass('animated slideInRight 5s');
    },{
        offset:'50%'
    });

     $('.popular_text').waypoint(function(direction){
         $('.popular_text').addClass('animated slideInLeft slow delay-5s');
    },{
        offset:'50%'
    });
    

     $('.popular_btn').waypoint(function(direction){
         $('.popular_btn').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });

     $('.bootcamp_1').waypoint(function(direction){
         $('.bootcamp_1').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });

     $('.bootcamp_2').waypoint(function(direction){
         $('.bootcamp_2').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.first_div').waypoint(function(direction){
         $('.first_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    
    $('.second_div').waypoint(function(direction){
         $('.second_div').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.wave').waypoint(function(direction){
         $('.wave').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });

    $('.complaint').waypoint(function(direction){
         $('.complaint').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.fund').waypoint(function(direction){
         $('.fund').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.last_one').waypoint(function(direction){
         $('.last_one').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.liability').waypoint(function(direction){
         $('.liability').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.ten_div').waypoint(function(direction){
         $('.ten_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.nine_div').waypoint(function(direction){
         $('.nine_div').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.eight_div').waypoint(function(direction){
         $('.eight_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.seven_div').waypoint(function(direction){
         $('.seven_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.sixth_div').waypoint(function(direction){
         $('.sixth_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.fifth_div').waypoint(function(direction){
         $('.fifth_div').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
    $('.fourth_div').waypoint(function(direction){
         $('.fourth_div').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });
    $('.third_div').waypoint(function(direction){
         $('.third_div').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
     $('.about').waypoint(function(direction){
         $('.about').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });
      $('.website').waypoint(function(direction){
         $('.website').addClass('animated slideInRight ');
    },{
        offset:'80%'
    });
    $('.phone').waypoint(function(direction){
         $('.phone').addClass('animated slideInRight ');
    },{
        offset:'80%'
    });
     $('.email').waypoint(function(direction){
         $('.email').addClass('animated slideInRight ');
    },{
        offset:'80%'
    });
      $('.address').waypoint(function(direction){
         $('.address').addClass('animated slideInLeft ');
    },{
        offset:'80%'
    });

     $('.exam_des').waypoint(function(direction){
         $('.exam_des').addClass('animated slideInLeft  ');
    },{
        offset:'50%'
    });

    $('.exam_img').waypoint(function(direction){
         $('.exam_img').addClass('animated slideInRight ');
    },{
        offset:'80%'
    });

     $('.gurant_des').waypoint(function(direction){
         $('.gurant_des').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });

      $('.gurant_img').waypoint(function(direction){
         $('.gurant_img').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });

       $('.tansfer_des').waypoint(function(direction){
         $('.tansfer_des').addClass('animated slideInLeft ');
    },{
        offset:'50%'
    });

      $('.tansfer_img').waypoint(function(direction){
         $('.tansfer_img').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });

      $('.div_accord').waypoint(function(direction){
         $('.div_accord').addClass('animated slideInRight ');
    },{
        offset:'50%'
    });


        
});

</script>  
    