<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<style>
		table form { margin-bottom: 0;}
		form ul { margin-left: 0; list-style: none;}
		.error { color: red; font-style: italic;}
		body { padding-top: 0px; height:100%;}

		html {
  			position: relative;
  			min-height: 100%;
		}
		#content {
  			padding-bottom: 50px;
		}
		#footer .navbar{
  			position: absolute;
  			
  			background-color: #ccc;
  			border-top: solid;
  			border-width: 3px;
  			border-color: grey;
		}
	</style>
</head>

  <body>
    <div id="content">

    	<!-- header -->
		<div class="row-fluid">
			<div class="span12 well">
				<span class="span5">
					{{HTML::image('/assets/images/logo.png')}}
				</span>
				<span class="span5">
					<h2>Laravel Blog Test</h2>
				</span>
				<span class="span2">
					@include('partials.cart')
				</span>
			</div>
		</div>

		<!-- middle -->
		<div class="row-fluid">
			<div class="span12" style="padding:0 20px;">

				<!-- left side -->
				<span class="span3">
					@include('partials.sidenav')
				</span>

				<!-- main content -->
				<span class="span6 well">
					@yield('content')
				</span>

				<!-- right side -->
				<span class="span3">
					@include('partials.modules')
				</span>

			</div>
		</div>

    </div>


    <div id="footer">
      <div class="navbar navbar-fixed-bottom">
        <div >
          <div class="container">
            <ul class="nav">
              <li><a href="#">Menu 1</a></li>
              <li><a href="#">Menu 2</a></li>
            </ul>
            <span>
				@include('partials.footer')
			</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>