<link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS; ?>home_slider.css"/>

<script src="https://www.apexsystems.com/_layouts/15/jquery/libs/jquery.min.js"></script>
<div class="contentarea" style="padding-top: 123px !important;">
	<div class="twelve col responsiveimage  borderbottom">
		<div class="ms-webpart-zone ms-fullWidth">
			<div id="MSOZoneCell_WebPartctl00_ctl52_g_2a98a2b7_1fb2_4bb0_b07c_8fff47ca792d" class="s4-wpcell-plain ms-webpartzone-cell ms-webpart-cell-vertical ms-fullWidth ">
				<div class="ms-webpart-chrome ms-webpart-chrome-vertical ms-webpart-chrome-fullWidth ">
					<div webpartid="2a98a2b7-1fb2-4bb0-b07c-8fff47ca792d" haspers="false" id="WebPartctl00_ctl52_g_2a98a2b7_1fb2_4bb0_b07c_8fff47ca792d" width="100%" class="ms-WPBody noindex " allowdelete="false" allowexport="false" style=""><div id="ctl00_ctl52_g_2a98a2b7_1fb2_4bb0_b07c_8fff47ca792d">
					<div class="ms-rte-embedcode ms-rte-embedwp"><style type="text/css">

	
.topcontent{padding-top:100px}

@media screen and (max-width: 786px) {.topcontent{padding-top:40px}}
  .Table
    {
        width: 100%;
	overflow-y: auto;
	_overflow: auto;
	margin: 0 0 1em;
    }

.responsiveimage img{
 max-width:100% !important;
 height:auto !important;
 margin:0 !important;
}

@media screen and (max-width: 1024px) {
    .ms-rtestate-field {
        display: block !important;
    }
}
</style>



 <div class="twelve col imgswitcher" id="imgswitcher"> 
                <div id="leftpanelflip" class="">
                	<div id="leftpanel">
                		<div id="leftpanelcontent" style="display: none;">
							<div class="ms-webpart-zone ms-fullWidth">
		<div id="MSOZoneCell_WebPartWPQ4" class="s4-wpcell-plain ms-webpartzone-cell ms-webpart-cell-vertical ms-fullWidth ">
			<div class="ms-webpart-chrome ms-webpart-chrome-vertical ms-webpart-chrome-fullWidth ">
				<div webpartid="16ea46df-cb32-467c-a984-2df6362918b2" haspers="false" id="WebPartWPQ4" width="100%" class="ms-WPBody noindex " allowdelete="false" style=""><div style="display:none;" class="ms-rtestate-field">
				<div class="bluecontent"> 
				
				<p style="text-align: left;"> 

				
				<span class="ms-rteThemeForeColor-1-0">
		 
		 
				<strong style="color:#E1E6E9;" >We match you to the right job  <br> where you’ll be recognized<strong></p> 

				</div>
</div><div class="ms-clear"></div></div>
			</div>
		</div>
	</div>
						</div>
					</div>
				</div>

				<div id="rightpanelflip" class="">
					<div id="rightpanel" >
						<div id="rightpanelcontent" style="display: none;">
							<div class="ms-webpart-zone ms-fullWidth">
		<div id="MSOZoneCell_WebPartWPQ10" class="s4-wpcell-plain ms-webpartzone-cell ms-webpart-cell-vertical ms-fullWidth ">
			<div class="ms-webpart-chrome ms-webpart-chrome-vertical ms-webpart-chrome-fullWidth ">
				<div webpartid="4237eb25-8f15-4a90-aeb9-9c7ba09010c9" haspers="false" id="WebPartWPQ10" width="100%" class="ms-WPBody noindex " allowdelete="false" style="">
		<div style="display: none;" class="ms-rtestate-field">
<div class="orangecontent"> 
		<p style="text-align: left;"> 

		<strong style="color:#8CB9EF;">We have the right talent for your project needs.</strong></span></p> 

		</div></div>

<div class="ms-clear"></div></div>
			</div>
		</div>
	</div>
						</div>
					</div>
				</div>
                </div>
                

<script type="text/javascript">
    $(document).ready(function () {

        $("#leftpanelflip").on("mouseenter", function () {
            if (!$(this).hasClass("doNotShow") && !$("#rightpanelcontent").is(":visible") && !$("#leftpanelcontent").is(':animated')) {
        
                //$("#rightpanelcontent").animate({ width: 'toggle' }, 400);
				
               $("#rightpanelcontent").animate({width: 'toggle'}, {
                  duration: 400,
                  step: function(now, fx) {
                    if (fx.state > 0.5 && fx.prop === "width") {

                       if(!$("#rightpanelcontent").is(':animated')) {
                           $("#rightpanelcontent").animate({width: 'toggle'}, 400);
                       }     
                    } else {
                      
                    }
                  }
                });
                
                if (!$("#rightpanelflip").hasClass("doNotShow")) {
                    $("#rightpanelflip").addClass("doNotShow"), 400;
                }
                else {
                    $("#rightpanelflip").removeClass("doNotShow");
                }
            }
        });

        $("#rightpanelflip").on("mouseenter", function () {

            if (!$(this).hasClass("doNotShow") && !$("#leftpanelcontent").is(":visible") && !$("#rightpanelcontent").is(':animated')) {

                //$("#leftpanelcontent").animate({ width: 'toggle' }, 400);

                 $("#leftpanelcontent").animate({width: 'toggle'}, {
                  duration: 400,
                  step: function(now, fx) {
                    if (fx.state > 0.5 && fx.prop === "width") {
                       if(!$("#leftpanelcontent").is(':animated')) {
                                                
                           $("leftpanelcontent").animate({width: 'toggle'}, 400);
                       }     
                    }
                  }
                })

                if (!$("#leftpanelflip").hasClass("doNotShow")) {
                    $("#leftpanelflip").addClass("doNotShow");
                }
                else {
                    $("#leftpanelflip").removeClass("doNotShow");
                }
            }

        });
         $("#rightpanelflip").on("click", function(){

            if($("#leftpanelflip").hasClass("doNotShow")) { 
                $("#leftpanelflip").removeClass("doNotShow");
                $("#leftpanelcontent").animate({ width: 'toggle' }, 400);
            } else {
                if(!$("#leftpanelcontent").is(":visible") && $("#leftpanelflip").hasClass('doNotShow')) {
                    if($("#rightpanelflip").hasClass('doNotShow')){
                        $("#rightpanelflip").removeClass('doNotShow');
                    }        
                } else{
                    if($("#rightpanelflip").hasClass('doNotShow') && $("#rightpanelcontent").is(":visible")) {

                    } else {
                        $("#leftpanelflip").addClass("doNotShow");
                        $("#leftpanelcontent").animate({ width: 'toggle' }, 400);        
                    }
                    
                }
                
            }
         });

         $("#leftpanelflip").on("click", function(){
            
                if($("#rightpanelflip").hasClass("doNotShow")){
                    
                    $("#rightpanelflip").removeClass("doNotShow");
                    $("#rightpanelcontent").animate({ width: 'toggle' }, 400);
                } else {
                    if(!$("#rightpanelcontent").is(":visible") && $("#rightpanelflip").hasClass('doNotShow')) {
                        
                    }else{
                        if($("#leftpanelflip").hasClass('doNotShow') && $("#leftpanelcontent").is(":visible")) {
                        
                        } else {
                            $("#rightpanelflip").addClass("doNotShow");
                            $("#rightpanelcontent").animate({ width: 'toggle' }, 400);    
                        }
                        
                    }
                        
                }
            
         });

         // $("#imgswitcher").on("click", function () {

         //    // $("#rightpanelflip").removeClass("doNotShow");
         //    // $("#leftpanelflip").removeClass("doNotShow");

         //    if ($("#leftpanelcontent").is(":visible")) {
                
         //        $("#rightpanelflip").removeClass("doNotShow");
         //        $("#leftpanelcontent").animate({ width: 'toggle' }, 400);

         //    }     else {
                
         //    }

         //    if ($("#rightpanelcontent").is(":visible")) {
                
         //        $("#leftpanelflip").removeClass("doNotShow");
         //        $("#rightpanelcontent").animate({ width: 'toggle' }, 400);
         //    }else{
                
         //    }


         // });
        
          $("#imgswitcher").on("mouseleave", function () {
            $("div").stop();

            $("#rightpanelflip").removeClass("doNotShow");
            $("#leftpanelflip").removeClass("doNotShow");

            if ($("#leftpanelcontent").is(":visible")) {
                if(!$("#rightpanelcontent").is(":animated")){
                    $("#leftpanelcontent").animate({ width: 'toggle' }, 400);    
                }
                
            }
            if ($("#rightpanelcontent").is(":visible")) {
                $("#rightpanelcontent").animate({ width: 'toggle' }, 400);
            }


        });

    });
</script>

<style type="text/css">

	
.topcontent{padding-top:100px}
@media screen and (max-width: 1024px) {.topcontent{padding-top:40px}}
  .Table
    {
        width: 100%;
	overflow-y: auto;
	_overflow: auto;
	margin: 0 0 1em;
    }

.responsiveimage img{
 max-width:100% !important;
 height:auto !important;
 margin:0 !important;
}

</style>
<?php /*?>    <!-- job banner wrapper start-->
    <div class="jb_banner_wrapper jb_cover">
        <div class="jb_banner_left">
            <h1>The Easy Way To Get
Your New Job</h1>
            <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor . sollicitudin, lorem quis bibendum auctor, sem nibh id elit. </p>
            <div class="contect_form3">

                <input type="text" name="name" placeholder="Keyword e.g. (Job Title, Description, Tags)">
            </div>
            <div class="select_box">

                <!--<i class="flaticon-map"></i>
                <select>
                    <option>select location</option>
                    <option>california</option>
                    <option>los velas</option>
                    <option>noida</option>
                    <option>chicago</option>

                </select>-->

            </div>
            <div class="select_box select_box_2">

                <i class="flaticon-squares-gallery-grid-layout-interface-symbol"></i>
                <select>
                    <option>category</option>
                    <option>real estate</option>
                    <option>electronics</option>
                    <option>marketing</option>
                    <option>education</option>

                </select>

            </div>
            <div class="select_box">

                <!--<i class="flaticon-statistics"></i>
                <select>
                    <option>experience</option>
                    <option>5 years</option>
                    <option>3 years</option>
                    <option>2 years</option>
                    <option>fresher</option>

                </select>-->

            </div>
            <div class="header_btn search_btn jb_cover">

                <a href="#"><i class="fas fa-search"></i> search</a>

            </div>

            <div class="jb_btm_keyword jb_cover">
                <ul>
                    <li><i class="flaticon-tag"></i> Trending Keywords :</li>
                    <li><a href="#">ui designer,</a></li>
                    <li><a href="#">developer,</a></li>
                    <li><a href="#">senior</a></li>
                    <li><a href="#">it company,</a></li>
                    <li><a href="#">design,</a></li>
                    <li><a href="#">call center</a></li>
                </ul>
            </div>

        </div>
        <div class="jb_banner_right d-none d-sm-none d-md-none d-lg-none d-xl-block">
        </div>
    </div>

    <!-- job banner wrapper end--><?php */?>