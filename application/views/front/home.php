<!-- Breadcrumb -->
			<!-- Page Title -->
			<div class="container mt-0">
				<div class="row breadcrumb-bar">
					<div class="col-md-6">
						<h3 class="block-title">Quick Statistics</h3>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?php echo base_url("");?>">
									<span class="ti-home"></span>
								</a>
							</li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div>
			<!-- /Page Title -->
			<!-- /Breadcrumb -->
			
			
<!-- Main Content -->
			<div class="container home">
				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-red">
							<div class="widget-left">
								<span class="ti-user"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Patients</h4>
								<span class="numeric color-red">3480</span>
								<p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-green">
							<div class="widget-left">
								<span class="ti-bar-chart"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Orders</h4>
								<span class="numeric color-green">1585</span>
								<p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-yellow">
							<div class="widget-left">
								<span class="ti-bar-chart"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Returned Orders </h4>
								<span class="numeric color-yellow">300</span>
								<p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>

				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-6">
						<div class="widget-area-2 proclinic-box-shadow">
						<h3 class="widget-title"><div class="row">
						<div class="col-md-6">
						<h3 >Orders</h3> </div><div class="col-md-6">
						<select class="form-control" id="orders_select">
											<option value="Yearly">Yearly</option>
											<option value="Quarterly" >Quarterly</option>
											<option value="Monthly" >Monthly</option>
										</select></div></h3>
						
							
							<div id="lineMorris" class="chart-home"></div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title"> <div class="row">
						<div class="col-md-6">
						<h3 >Returned Orders</h3> </div><div class="col-md-6">
						<select class="form-control" id="orders_select_bar">
											<option value="Yearly">Yearly</option>
											<option value="Quarterly" >Quarterly</option>
											<option value="Monthly" >Monthly</option>
										</select></div></h3>
							<div id="barMorris" class="chart-home"></div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>

				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="row">
						<div class="col-md-6">
						<h3 style="color:#0f41a5 !important;" >Returned Orders</h3> </div></div>
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Patient Name</th>
											<th>Email</th>
											<th>Device</th>
											<th>Date & Time</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
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
											<td><?php echo isset($val->created_at)?$val->created_at:"N/A"; ?></td>
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
					<!-- /Widget Item -->
				</div>

				<div class="row">
					<!-- Widget Item -->
				
					<div class="col-sm-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title"><div class="row">
						<div class="col-md-6">
						<h3 style="color:#0f41a5 !important;" >Orders Status</h3> </div></div></h3>
							<span class="badge badge-success">Completed</span>
						<br>
						<span class="badge badge-warning">Pending</span>
						<br>
						<span class="badge badge-danger">Cancelled</span>
							<div style="margin:-80px ​0px 0px 0p !important;" id="donutMorris" class="chart-home"></div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-sm-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title"><div class="row">
						<div class="col-md-6">
						<h3 style="color:#0f41a5 !important;" >Device Availability</h3> </div></div></h3>
							<span class="badge badge-success">Nuvoair</span>
							<br>
							<span class="badge badge-warning">Spirohome</span>
							<br>
							<span class="badge badge-danger">Zyphrics</span>
							<br>
							<span style="color:#fff;background-color: #40474e !important;"class="badge">Nuvohome</span>
							<br>
							<span style="color:#fff;background-color: #c6eaf9 !important;"class="badge">Tytohome</span>
							<br>
							<span style="color:#fff;background-color: #e92624 !important;"class="badge">Tytocare</span>
							<div style="margin-top: -80px !important;" id="deviceMorris" class="chart-home"></div>
						</div>
					</div>
					<!--<div class="col-md-6">
						<div class="widget-area-2 progress-status proclinic-box-shadow">
							<h3 class="widget-title">Device Availability</h3>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Device</th>
											<th>Speciality</th>
											<th>Availability</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Zyphreics</td>
											<td>Dental</td>
											<td>
												<span class="badge badge-success">Available</span>
											</td>
										</tr>
										<tr>
											<td>Zyphreics</td>
											<td>Ortho</td>
											<td>
												<span class="badge badge-warning">On Leave</span>
											</td>
										</tr>
										<tr>
											<td>TytoCare</td>
											<td>Skin</td>
											<td>
												<span class="badge badge-danger">Not Available</span>
											</td>
										</tr>
										<tr>
											<td>TytoCare</td>
											<td>Dental</td>
											<td>
												<span class="badge badge-success">Available</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
					--><!-- /Widget Item -->

				</div>

			</div>
			<!-- /Main Content -->
			