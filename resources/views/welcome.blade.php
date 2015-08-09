<!DOCTYPE html>
<html>
    <head>
        <title>Retail One</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/wow.js') }}"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 70px;
                position: absolute;
                top: 20%;
                left: 10%;
                text-align: center;
                opacity: .9;
				box-shadow: 0px 0px 20px 20px #DD572D;
            }
            .subtitle {
	            font-size: 50px;
                position: absolute;
                top: 100%;
                left: 10%;
                text-align: center;
                opacity: .8;
                background: #fff;
            }
            .carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			    width: 100%;
			    margin: auto;
			}
        </style>
    </head>
    <body>	    
		<div class="container-fluid">
			<div class="row">
	            <div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>
				
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="{{ asset('images/head3.jpg') }}" alt="">
				    </div>
				
				    <div class="item">
				      <img src="images/head4.jpg" alt="">
				    </div>
				
				    <div class="item">
				      <img src="images/head6.jpg" alt="">
				    </div>
				  </div>
				
				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			   
		</div>        
	    <div class="container-fluid">
			<div class="row">           
                <div class="title wow slideInLeft"><img src="images/logo2.jpg" alt=""></div>
                <div class="subtitle wow slideInRight">Retail store analytics & platform solutions</div>
            </div>
        </div>
        <script>
	        ;(function($){
				new WOW().init();
			})(jQuery);	
		</script>
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
