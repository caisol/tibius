(function ($) {
  "use strict"; // Start of use strict
  //line Morris
  const monthNames = ["","Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
	const monthNamesQuaters = ["","Jan",  "Apr", "Aug",  "Dec"
    ];
  var tmpDataOrders = [
      { y: '2016 Q1', Orders: 20 },
      { y: '2016 Q2', Orders: 15 },
      { y: '2016 Q3', Orders: 34 },
      { y: '2016 Q4', Orders: 7 },
      { y: '2017 Q1', Orders: 31 },
      { y: '2017 Q2', Orders: 18 },
      { y: '2017 Q3', Orders: 70 },
      { y: '2017 Q4', Orders: 32 },
      { y: '2018 Q1', Orders: 15 },
      { y: '2018 Q2', Orders: 53 }
    ];
 ordersGraph(tmpDataOrders);
 function ordersGraph(tmpDataOrders)
 {
	 $("#lineMorris").html("");
	  var lineMorris = new Morris.Line({
    element: 'lineMorris',
    resize: true,
    data: tmpDataOrders,
    xkey: 'y',
    ykeys: ['Orders'],
    labels: ['Orders'],
    gridLineColor: '#eef0f2',
    lineColors: ['#E57498'],
    lineWidth: 2,
    hideHover: 'auto'
  });
 }
  //barmorris
  var ctx = document.getElementById("barMorris");
  if (ctx === null) return;

  var chart = Morris.Bar({
    element: 'barMorris',
    data: [{
      y: '2012',
      a: 20
    }, {
      y: '2013',
      a: 45
    }, {
      y: '2014',
      a: 56
    }, {
      y: '2015',
      a: 35
    }, {
      y: '2016',
      a: 18
    }, {
      y: '2017',
      a: 28
    }, {
      y: '2018',
      a: 20
    }],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Orders'],
    barColors: ['#FF7D00'],
    barOpacity: 1,
    barSizeRatio: 0.5,
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
  });
  // morris donut charts
  if($("#donutMorris").length == 1){
   var $donutData = [
    { label: "Pending", value: 30 },
    { label: "Cancelled", value: 29 },
    { label: "Completed", value: 45 }
  ];
  Morris.Donut({
    element: 'donutMorris',
    data: $donutData,
    barSize: 0.1,
    labelColor: '#3e5569',
    resize: true, //defaulted to true
    colors: ['#FFAA2A', '#ef6e6e', '#22c6ab']
  });
  }

  // morris deviceMorris charts
  if($("#deviceMorris").length == 1){
   var $donutData = [
    { label: "Spirohome", value: 30 },
    { label: "Zephryx \n Available \n\n\n\n", value: 29 },
    { label: "NuvoAir", value: 45 },
    { label: "Tytocare", value: 45 },
    { label: "Tytohome", value: 45 },
    { label: "Nuvohome", value: 45 }
  ];
  Morris.Donut({
    element: 'deviceMorris',
    data: $donutData,
    barSize: 0.1,
    labelColor: '#3e5569',
    resize: true, //defaulted to true
    colors: ['#FFAA2A', '#ef6e6e', '#22c6ab','#e92624', '#00a1e4', '#40474e']
  });
  }
  
  // visit chart
  if($("#visitMorris").length == 1){
  var chart = Morris.Area({
    element: 'visitMorris',
    data: [{
      period: '2010',
      SiteA: 0,
      SiteB: 0,

    }, {
      period: '2011',
      SiteA: 130,
      SiteB: 100,

    }, {
      period: '2012',
      SiteA: 60,
      SiteB: 80,

    }, {
      period: '2013',
      SiteA: 180,
      SiteB: 200,

    }, {
      period: '2014',
      SiteA: 280,
      SiteB: 100,

    }, {
      period: '2015',
      SiteA: 170,
      SiteB: 150,
    },
    {
      period: '2016',
      SiteA: 200,
      SiteB: 80,

    }, {
      period: '2017',
      SiteA: 0,
      SiteB: 0,

    }],
    xkey: 'period',
    ykeys: ['SiteA', 'SiteB'],
    labels: ['Site A', 'Site B'],
    pointSize: 0,
    fillOpacity: 1,
    pointStrokeColors: ['#5867c3', '#00c5dc'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 0,
    smooth: false,
    hideHover: 'auto',
    lineColors: ['#5867c3', '#00c5dc'],
    resize: true
  });
}

$('#orders_select').on('change', function() {
				  if(this.value=="Yearly")
				  {
					  var tmpDataOrders = [
						  { y: '2016 Q1', Orders: 20 },
						  { y: '2016 Q2', Orders: 15 },
						  { y: '2016 Q3', Orders: 34 },
						  { y: '2016 Q4', Orders: 7 },
						  { y: '2017 Q1', Orders: 31 },
						  { y: '2017 Q2', Orders: 18 },
						  { y: '2017 Q3', Orders: 70 },
						  { y: '2017 Q4', Orders: 32 },
						  { y: '2018 Q1', Orders: 15 },
						  { y: '2018 Q2', Orders: 53 }
						];
					  ordersGraph(tmpDataOrders);
				  }
				else if(this.value=="Quarterly")
				  {
					 var lineMorris=null;
					  var tmpDataOrders = [ { y: '2020 Q1', Orders: 20 },
      { y: '2020 Q2', Orders: 15 },
      { y: '2020 Q3', Orders: 34 },
      { y: '2020 Q4', Orders: 7 }
      ];
							$("#lineMorris").html("");
					  lineMorris = new Morris.Line({
						element: 'lineMorris',
						resize: true,
						data: tmpDataOrders,
						xkey: 'y',
						ykeys: ['Orders'],
						labels: ['Orders'],
						xLabelFormat: function (x) { return monthNames[x.getMonth()]; },
						gridLineColor: '#eef0f2',
						lineColors: ['#E57498'],
						lineWidth: 2,
						hideHover: 'auto'
					  });
				  }
				  else if(this.value=="Monthly")
				  {
					  var lineMorris=null;
					  var tmpDataOrders = [ { y: '2020 Q1', Orders: 20 },
      { y: '2020 Q2', Orders: 15 },
      { y: '2020 Q3', Orders: 34 },
      { y: '2020 Q4', Orders: 7 },
      { y: '2020 Q1', Orders: 31 },
      { y: '2020 Q2', Orders: 18 },
      { y: '2020 Q3', Orders: 70 },
      { y: '2020 Q4', Orders: 32 },
      { y: '2020 Q1', Orders: 15 },
      { y: '2020 Q2', Orders: 53 }];
							$("#lineMorris").html("");
					  lineMorris = new Morris.Line({
						element: 'lineMorris',
						resize: true,
						data: tmpDataOrders,
						xkey: 'y',
						ykeys: ['Orders'],
						labels: ['Orders'],
						xLabelFormat: function (x) { return monthNames[x.getMonth()]; },
						gridLineColor: '#eef0f2',
						lineColors: ['#E57498'],
						lineWidth: 2,
						hideHover: 'auto'
					  });
				  }
				  
				  
				});
				
	$('#orders_select_bar').on('change', function() {
				  if(this.value=="Yearly")
				  {
					  $("#barMorris").html("");
					  var ctx = document.getElementById("barMorris");
					  if (ctx === null) return;

					  var chart = Morris.Bar({
						element: 'barMorris',
						data: [{
						  y: '2012',
						  a: 20
						}, {
						  y: '2013',
						  a: 45
						}, {
						  y: '2014',
						  a: 56
						}, {
						  y: '2015',
						  a: 35
						}, {
						  y: '2016',
						  a: 18
						}, {
						  y: '2017',
						  a: 28
						}, {
						  y: '2018',
						  a: 20
						}],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Orders'],
						barColors: ['#FF7D00'],
						barOpacity: 1,
						barSizeRatio: 0.5,
						hideHover: 'auto',
						gridLineColor: '#eef0f2',
						resize: true
					  });
				  }
				else if(this.value=="Quarterly")
				  {
					var ctx = document.getElementById("barMorris");
					  if (ctx === null) return;
						$("#barMorris").html("");
					  var chart = Morris.Bar({
						element: 'barMorris',
						data: [{
						  y: 'Jan',
						  a: 12
						}, {
						  y: 'Feb',
						  a: 45
						}, {
						  y: 'Mar',
						  a: 56
						}, {
						  y: 'Apr',
						  a: 32
						}, {
						  y: 'May',
						  a: 15
						}, {
						  y: 'June',
						  a: 23
						}, {
						  y: 'Jul',
						  a: 25
						}],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Orders'],
						barColors: ['#FF7D00'],
						barOpacity: 1,
						barSizeRatio: 0.5,
						hideHover: 'auto',
						gridLineColor: '#eef0f2',
						resize: true
					  });
				  }
				  else if(this.value=="Monthly")
				  {
					  $("#barMorris").html("");
					  var chart = Morris.Bar({
						element: 'barMorris',
						data: [{
						  y: 'Jan',
						  a: 10
						}, {
						  y: 'Feb',
						  a: 15
						}, {
						  y: 'Mar',
						  a: 56
						}, {
						  y: 'Apr',
						  a: 40
						}, {
						  y: 'May',
						  a: 13
						}, {
						  y: 'June',
						  a: 43
						}, {
						  y: 'Jul',
						  a: 12
						}],
						xkey: 'y',
						ykeys: ['a'],
						labels: ['Orders'],
						barColors: ['#FF7D00'],
						barOpacity: 1,
						barSizeRatio: 0.5,
						hideHover: 'auto',
						gridLineColor: '#eef0f2',
						resize: true
					  });
				  }
				  
				  
				});
  
})(jQuery);
