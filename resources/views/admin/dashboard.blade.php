@extends('admin_layout')
@section('admin_content')
	<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<br>
			<div class="col-md-6 chart_agile_right">
				
				
				<div class="chart_agile_top">
					<div class="chart_agile_bottom">
						<div id="graph4"></div>
						<script>
							Morris.Donut({
							  element: 'graph4',
							  data: [
								{value: 70, label: 'DOANH THU', formatted: ' 70%' },
								{value: 15, label: 'Thanh toán qua thẻ', formatted: ' 15%' },
								{value: 10, label: 'Giao hàng', formatted: ' 10%' },
								{value: 5, label: 'Nhận tiền mặt', formatted: ' 5%' }
							  ],
							  formatter: function (x, data) { return data.formatted; }
							});
						</script>
						<div class="phantich-hethong"> 
							<ul style="list-style-type: square; color: red;">
								
								<li>Tổng đơn hàng :
									<?php 
										$tongdonhang = 0;
										foreach($all_hoadon as $key => $hd){
											$tongdonhang ++;
										}
										echo $tongdonhang;
							 		?>
							 	
							 	</li>
								<li>Đơn hàng chưa xử lý : <?php 
										$tongdonhangchuaxuly = 0;
										foreach($all_hoadon as $key => $hd){
											if($hd->order_status == 0)
											$tongdonhangchuaxuly ++;
										}
										echo $tongdonhangchuaxuly;
							 		?>
							 			
							 	</li>
								<li>Đơn hàng đã xử lý : <?php 
										$tongdonhangdaxuly = 0;
										foreach($all_hoadon as $key => $hd){
											if($hd->order_status == 1)
											$tongdonhangdaxuly ++;
										}
										echo $tongdonhangdaxuly;
							 		?>
							 			
							 	</li>
								<li>Tổng doanh thu :<?php 
								
										$tongdoanhthu = 0;
										foreach($all_hoadon as $key => $hd){
											if($hd->order_status == 1){

												$hamcanthaythe= (double)str_replace(',','.',$hd->order_total);
												
												 $tongdoanhthu = $tongdoanhthu +$hamcanthaythe;
											}
											
										}
										
										echo  $tongdoanhthu ,".000 VNĐ";
							 		?>
								</li>
							</ul>

						</div>


					</div>
				</div>
				
				
			</div>


<script src="{{asset('public/backEnd/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backEnd/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backEnd/js/scripts.js')}}"></script>
<script src="{{asset('public/backEnd/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backEnd/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
@endsection