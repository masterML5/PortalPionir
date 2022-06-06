<HEAD>

<META content="text/html; charset=utf-8" http-equiv="Content-Type"><TITLE>Pionir d.o.o - Portal</TITLE>
<link rel="shortcut icon" href="http://localhost/portal/favicon.ico" />
<LINK rel="stylesheet" type="text/css" href="css/main.css">
<LINK rel="stylesheet" type="text/css" href="css/jquery.ui-1.7.2.custom.css">
<LINK rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.1.css">
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />

<SCRIPT type="text/javascript" src="js/jquery-1.4.2.min.js"></SCRIPT>

<SCRIPT type="text/javascript" src="js/jquery.fancybox-1.3.1.pack.js"></SCRIPT>

<SCRIPT type="text/javascript" src="js/jquery.li-scroller.1.0.js"></SCRIPT>

<SCRIPT type="text/javascript" src="js/init.js"></SCRIPT>

<SCRIPT type="text/javascript" src="js/ufo.js"></SCRIPT>

<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){

		g_globalObject = new JsDatePick({
			useMode:1,
			isStripped:true,
			target:"kalendar",
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"bananasplit",
			dateFormat:"%d-%m-%Y",
			imgPath:"img_kalendar/",
			weekStartDay:1
		});		
		
		g_globalObject.setOnSelectedDelegate(function(){
			var obj = g_globalObject.getSelectedDay();
			alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
			document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
		});

	};
</script>    



<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu-v.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<!--[if IE 6]>
		<script type="text/javascript" src="/js/DD_belatedPNG.js"></script>		<script type="text/javascript">DD_belatedPNG.fix('.png_bg')</script>
	<![endif]-->
<META name="GENERATOR" content="MSHTML 9.00.8112.16443">
</HEAD>