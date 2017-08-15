<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="<?php echo base_url(); ?>login/logout/">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <?php if($this->uri->segment(1) == 'dashboard'){ ?>
    <!-- Jquery -->
	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>

	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.js"></script>
   
	<!-- Flot -->
	<script src='<?php echo ASSETS; ?>js/jquery.flot.min.js'></script>
   
	<!-- Morris -->
	<script src='<?php echo ASSETS; ?>js/rapheal.min.js'></script>	
	<script src='<?php echo ASSETS; ?>js/morris.min.js'></script>	
	
	<!-- Colorbox -->
	<script src='<?php echo ASSETS; ?>js/jquery.colorbox.min.js'></script>	

	<!-- Sparkline -->
	<script src='<?php echo ASSETS; ?>js/jquery.sparkline.min.js'></script>
	
	<!-- Pace -->
	<script src='<?php echo ASSETS; ?>js/uncompressed/pace.js'></script>
	
	<!-- Popup Overlay -->
	<script src='<?php echo ASSETS; ?>js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='<?php echo ASSETS; ?>js/jquery.slimscroll.min.js'></script>
	
	<!-- Modernizr -->
	<script src='<?php echo ASSETS; ?>js/modernizr.min.js'></script>
	
	<!-- Cookie -->
	<script src='<?php echo ASSETS; ?>js/jquery.cookie.min.js'></script>
	
	<!-- Perfect -->
	<script>
		$(function	()	{

	//Flot Chart
	//Website traffic chart				
	var init = { data: 
		[
			<?php foreach($visitors as $key => $vis){ ?>
			 <?php echo "[$key,$vis],"; ?>
			<?php } ?>

		],

			 label: "Visitor"
		},
		options = {	
			series: {
				lines: {
					show: true, 
					fill: true,
					fillColor: 'rgba(121,206,167,0.2)'
				},
				points: {
					show: true,
					radius: '4.5'
				}
			},
			grid: {
				hoverable: true,
				clickable: true
			},
			colors: ["#37b494"]
		},
		plot;
			
	plot = $.plot($('#placeholder'), [init], options);
			
	$("<div id='tooltip'></div>").css({
		position: "absolute",
		display: "none",
		border: "1px solid #222",
		padding: "4px",
		color: "#fff",
		"border-radius": "4px",
		"background-color": "rgb(0,0,0)",
		opacity: 0.90
	}).appendTo("body");

	$("#placeholder").bind("plothover", function (event, pos, item) {

		var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
		$("#hoverdata").text(str);
	
		if (item) {
			var x = item.datapoint[0],
				y = item.datapoint[1];
			
				$("#tooltip").html(x+": Visitor : " + y)
				.css({top: item.pageY+5, left: item.pageX+5})
				.fadeIn(200);
		} else {
			$("#tooltip").hide();
		}
	});

	$("#placeholder").bind("plotclick", function (event, pos, item) {
		if (item) {
			$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
			plot.highlight(item.series, item.datapoint);
		}
	});
			
	var animate = function () {
	   $('#placeholder').animate( {tabIndex: 0}, {
		   duration: 3000,
		   step: function ( now, fx ) {

				 var r = $.map( init.data, function ( o ) {
					  return [[ o[0], o[1] * fx.pos ]];
				});

				 plot.setData( [{ data: r }] );
			 plot.draw();
			}	
		});
	}
		
	animate();

	//Morris Chart
	
	
	

	
	
	//Timeline color box
	$('.timeline-img').colorbox({
		rel:'group1',
		width:"90%",
		maxWidth:'800px'
	});

	//Resize graph when toggle side menu
	$('.navbar-toggle').click(function()	{
		setTimeout(function() {
			donutChart.redraw();
			lineChart.redraw();
			barChart.redraw();			
			
			$.plot($('#placeholder'), [init], options);
		},500);	
	});
	
	$('.size-toggle').click(function()	{
		//resize morris chart
		setTimeout(function() {
			donutChart.redraw();
			lineChart.redraw();
			barChart.redraw();	

			$.plot($('#placeholder'), [init], options);			
		},500);
	});

	//Refresh statistic widget
	$('.refresh-button').click(function() {
		var _overlayDiv = $(this).parent().children('.loading-overlay');
		_overlayDiv.addClass('active');
		
		setTimeout(function() {
			_overlayDiv.removeClass('active');
		}, 2000);
		
		return false;
	});
	
	$(window).resize(function(e)	{
		
		//Sparkline
		$('#visits').sparkline([15,19,20,22,33,27,31,27,19,30,21,10,15,18,25,9], {
			type: 'bar', 
			barColor: '#fa4c38',	
			height:'35px',
			weight:'96px'
		});
		$('#balances').sparkline([220,160,189,156,201,220,104,242,221,111,164,242,183,165], {
			type: 'bar', 
			barColor: '#92cf5c',	
			height:'35px',
			weight:'96px'
		});

		//resize morris chart
		setTimeout(function() {
			donutChart.redraw();
			lineChart.redraw();
			barChart.redraw();			
			
			$.plot($('#placeholder'), [init], options);
		},500);
	});

});

	</script>
	<script src="<?php echo ASSETS; ?>js/app/app.js"></script>
	<?php }else{ ?>
	
	<!-- Jquery-->
	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script> 
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
       
	<!-- Chosen -->
	<script src='<?php echo ASSETS; ?>js/chosen.jquery.min.js'></script>	

	<!-- Mask-input -->
	<script src='<?php echo ASSETS; ?>js/jquery.maskedinput.min.js'></script>	

	<!-- Datepicker -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-timepicker.min.js'></script>	
	
	<!-- Slider -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-slider.min.js'></script>	
	
	<!-- Tag input -->
	<script src='<?php echo ASSETS; ?>js/jquery.tagsinput.min.js'></script>	

	<!-- WYSIHTML5 -->
	<script src='<?php echo ASSETS; ?>js/wysihtml5-0.3.0.min.js'></script>	
	<script src='<?php echo ASSETS; ?>js/uncompressed/bootstrap-wysihtml5.js'></script>	

	<!-- Dropzone -->
	<script src='<?php echo ASSETS; ?>js/dropzone.min.js'></script>	
	
	<!-- Modernizr -->
	<script src='<?php echo ASSETS; ?>js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='<?php echo ASSETS; ?>js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='<?php echo ASSETS; ?>js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='<?php echo ASSETS; ?>js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='<?php echo ASSETS; ?>js/jquery.cookie.min.js'></script>

	<!-- Perfect -->
	<script src="<?php echo ASSETS; ?>js/app/app_form.js"></script>
	<script src="<?php echo ASSETS; ?>js/app/app.js"></script>
	<?php } ?>
	
  </body>
</html>
