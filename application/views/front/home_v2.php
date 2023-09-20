   <script type="text/javascript">
  window.onload = function () {
    var chart01 = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "<?php echo  $total_devices_text; ?>",
        fontWeight: "normal",
		fontSize: 18,
		 fontColor: '#143f72',
		 verticalAlign: "center",
		dockInsidePlotArea: true
      },

      legend:{
        verticalAlign: "top",
        horizontalAlign: "top"
      },
      data: [
      {
        //startAngle: 45,
       indexLabelFontSize: 14,
       indexLabelFontFamily: "Montserrat",
       indexLabelFontColor: "#143f72",
       indexLabelLineColor: "#143f72",
       indexLabelPlacement: "outside",
       type: "doughnut",
       showInLegend: false,
       dataPoints: <?php echo isset($chartData)?$chartData:array();?>
     }
     ]
   });
   chart01.render();
   
   var chart02 = new CanvasJS.Chart("chartContainer01",
    {
      title:{
        text: "Total Completed 200",
        fontWeight: "normal",
		fontSize: 18,
		 fontColor: '#143f72',
		 verticalAlign: "center",
		dockInsidePlotArea: true
      },

      legend:{
        verticalAlign: "top",
        horizontalAlign: "top"
      },
      data: [
      {
        //startAngle: 45,
       indexLabelFontSize: 14,
       indexLabelFontFamily: "Montserrat",
       indexLabelFontColor: "#143f72",
       indexLabelLineColor: "#143f72",
       indexLabelPlacement: "outside",
       type: "doughnut",
       showInLegend: false,
       dataPoints: [
       {  y: 10.0, legendText:"Tytohome 200", indexLabel: "Tytohome 200" },
       {  y: 15.0, legendText:"Tytocare 340", indexLabel: "Tytocare 340" },
       {  y: 25.0, legendText:"Nuvohome 380", indexLabel: "Nuvohome 380" },
       {  y: 10.0, legendText:"Zyphrics 180", indexLabel: "Zyphrics 180" },
       {  y: 30.0, legendText:"Spirohome 540", indexLabel: "Spirohome 540" },
	   {  y: 25.0, legendText:"Nuvoair 360", indexLabel: "Nuvoair 360" }
       ]
     }
     ]
   });

    chart02.render();
	
	
	var chart03 = new CanvasJS.Chart("chartContainer03",
    {
      title:{
        text: "Total Return 100",
        fontWeight: "normal",
		fontSize: 18,
		 fontColor: '#143f72',
		 verticalAlign: "center",
		dockInsidePlotArea: true
      },

      legend:{
        verticalAlign: "top",
        horizontalAlign: "top"
      },
      data: [
      {
        //startAngle: 45,
       indexLabelFontSize: 14,
       indexLabelFontFamily: "Montserrat",
       indexLabelFontColor: "#143f72",
       indexLabelLineColor: "#143f72",
       indexLabelPlacement: "outside",
       type: "doughnut",
       showInLegend: false,
       dataPoints: [
       {  y: 10.0, legendText:"Tytohome 200", indexLabel: "Tytohome 200" },
       {  y: 15.0, legendText:"Tytocare 340", indexLabel: "Tytocare 340" },
       {  y: 25.0, legendText:"Nuvohome 380", indexLabel: "Nuvohome 380" },
       {  y: 10.0, legendText:"Zyphrics 180", indexLabel: "Zyphrics 180" },
       {  y: 30.0, legendText:"Spirohome 540", indexLabel: "Spirohome 540" },
	   {  y: 25.0, legendText:"Nuvoair 360", indexLabel: "Nuvoair 360" }
       ]
     }
     ]
   });
   chart03.render();
  }
  </script>
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quick Statistics</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Statistics</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div style="cursor: pointer;" onclick="window.location.href='<?php echo base_url("manage-orders");?>'" class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon">
			  <img src="<?php echo FRONT_IMG_V2; ?>orders/01.jpg"></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number"><?php echo isset($totalOrders)?$totalOrders:0; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div style="cursor: pointer;" onclick="window.location.href='<?php echo base_url("manage-devices");?>'" class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon"><img src="<?php echo FRONT_IMG_V2; ?>orders/02.jpg"></span>

              <div class="info-box-content">
                <span class="info-box-text">Remaining Devices</span>
                <span class="info-box-number"><?php echo isset($totalDevices)?$totalDevices:0; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div style="cursor: pointer;" onclick="window.location.href='<?php echo base_url("manage-devices");?>'" class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon"><img src="<?php echo FRONT_IMG_V2; ?>orders/03.jpg"></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Devices</span>
                <span class="info-box-number"><?php echo isset($totalDevices)?$totalDevices:0; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
		
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device Availability</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                  
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div id="chartContainer01" style="height: 300px; width: 100%;"></div>
                  
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
	
	<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
		
		<div class="col-12">
		<div class="card-header">
			<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="pt-2 px-3"><h3 class="card-title">Order Return Status</h3></li>
					  <li class="nav-item">
						<a class="nav-link active" id="custom-tabs-one-complete-tab" data-toggle="pill" href="#custom-tabs-one-complete" role="tab" aria-controls="custom-tabs-one-complete" onclick="getOrderswithStatus(1);" aria-selected="true">All</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="custom-tabs-one-inprogress-tab" data-toggle="pill" href="#custom-tabs-one-inprogress" role="tab" aria-controls="custom-tabs-one-inprogress" onclick="getOrderswithStatus(2);" aria-selected="false">New</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="custom-tabs-one-accepted-tab" data-toggle="pill" href="#custom-tabs-one-accepted" role="tab" aria-controls="custom-tabs-one-accepted" onclick="getOrderswithStatus(3);" aria-selected="false">Review</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="custom-tabs-one-submitt-tab" data-toggle="pill" href="#custom-tabs-one-submitt" role="tab" aria-controls="custom-tabs-one-submitt" onclick="getOrderswithStatus(4);" aria-selected="false">Submitted</a>
					  </li>
					</ul>
        </div>
		<div class="orders-tables">
		<div class="col-12 col-sm-6 col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div id="chartContainer03" style="height: 300px; width: 100%;"></div>
                  
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-sm-6 col-md-6">
			<table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Email Address</th>
                    <th>Device Name</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody id="ordersTable" >
                  <?php if(isset($dataOrders) && !empty($dataOrders)){
										foreach($dataOrders as $key=>$val)
										{
											$badge="";
											$sname="";
											if($val->order_status=="Review" || $val->order_status=="Pending")
											{
												$sname="Review";
												$badge="badge-warning";
											}
											elseif($val->order_status=="New")
											{
												$sname="New";
												$badge="badge-danger";
											}
											elseif($val->order_status=="Submitted")
											{
												$sname="Submitted";
												$badge="badge-success";
											}
										?>
											
											<tr  style="cursor: pointer !important;" onclick="window.location.href='<?php echo base_url('order-summary/'.$val->order_id)?>'" >
											<td><?php echo isset($val->patient_name)?$val->patient_name:"N/A"; ?></td>
											<td><?php echo isset($val->email)?$val->email:"N/A"; ?></td>
											<td><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></td>
											<!--<td><?php echo isset($val->created_at)?$val->created_at:"N/A"; ?></td>-->
											<td>
												<span class="badge <?php echo $badge;?>"><?php echo $sname;?></span>
											</td>
										</tr>
									<?php	}
									}?>
                  </tbody>
                </table>
			</div>
		</div>
		</div>
		</div>
	</div>	
	</section>
  </div>
  <!-- /.content-wrapper -->
<script>
function getOrderswithStatus(status)
{
	$.post( "<?php echo base_url('get-orders-home');?>", { 
		status: status })
		  .done(function( data ) {
			
				var obj = jQuery.parseJSON(data);
				$('#modal-shipping').modal('show');
				
				if(!obj.status)
				{
					
					
				}
				else if(obj.status  && obj.data)
				{
					
					var data = obj.data;
					var ordersTableHtml="";
					$.each(data, function( index, value ) {
						
						var badge="";
						var sname="";
						if(value.order_status=="Review" || value.order_status=="Pending")
						{
							sname="Review";
							badge="badge-warning";
						}
						else if(value.order_status=="New")
						{
							sname="New";
							badge="badge-danger";
						}
						else if(value.order_status=="Submitted")
						{
							sname="Submitted";
							badge="badge-success";
						}
						
					  ordersTableHtml+='<tr  style="cursor: pointer !important;" onclick="window.location.href=\'<?php echo base_url("order-summary/'+value.order_id+'")?>\'" >'+
											'<td>'+value.patient_name+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.device_name+'</td>'+
											'<td>'+
												'<span class="badge '+badge+'">'+sname+'</span>'+
											'</td>'+
										'</tr>';
					});
					$("#ordersTable").html(ordersTableHtml);
					
				}
				else
				{
					
				}
		  });
}
</script>