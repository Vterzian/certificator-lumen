<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//FR"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Certificat d'Authenticité</title>
    <style type="text/css">
    	html {
    		margin: 0;
    		padding: 0;
    		font-family: Helvetica, sans-serif;
    		border: 3px solid #4e6081;
    	}

    	body {
    		margin: auto;
    		background: url({{ public_path('assets/certif-background.jpg') }}) no-repeat;
    		background-size: cover;
    		padding: 0;
    		position: relative;
    		overflow: hidden;
    	}

    	#header {
    		width: 100%;
    		height: 160px;
    		margin-top: 20px;
    		text-align: center;
    	}

    	#header h1 {
    		font-size: 70px;
    		font-weight: lighter;
    		padding: 0;
    		margin: 0;
    		margin-top: 40px;
    	}

    	#header p {
    		font-size: 16px;
    		padding: 0;
    		margin: 0;
    	}

    	#body {
    		width: 90%;
    		height: 530px;
    		margin: 0 5%;
        margin-top: 40px;
    	}

    	#left-side {
    		width: 50%;
        padding-left: 30px;
    		float: left;
    	}

    	#left-side .description {
    		width: 100%;
    		margin: 0;
    		padding: 0;
    	}

    	#left-side .description li {
    		list-style: none;
    		font-size: 20px;
    		padding: 10px 0;
    	}

    	#left-side .description li:first-child {
    		font-size: 30px;
    		font-weight: bold;
    	}

    	#left-side .description li span {
    		font-weight: bold;
    		font-size: 20px;
    	}

    	#left-side .signature {
    		width: 100%;
    		margin: 0;
    	}

    	#left-side .signature p {
    		font-size: 20px;
    		margin: 0 0 5px 0;
    		padding: 0;
    	}

    	#left-side .signature small {
    		margin: 0;
    		padding: 0;
    	}

    	#right-side {
    		width: 50%;
    		float: right;
    		text-align: center;
        padding-right: 30px;
    	}

    	#right-side img {
    		display: block;
    		margin: 10px 0;
    		max-height: 450px;
        max-width: 500px;
    	}
      .opacity-0 {
        opacity: 0;
      }
      .bold {
        font-weight: bold;
    		font-size: 20px;
      }
      .ml-4 {
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
  	<div id="header">
  		<h1>CERTIFICAT D'AUTHENTICITÉ</h1>
  		<p>Ce document certifie que l'oeuvre mentionnée ci-dessous est une oeuvre unique et originale</p>
  	</div>
  	<div id="body">
  		<div id="left-side">
  			<ul class="description">
  				<li><span>Nom de l'Artiste:</span> Jean Massimi</li>
  				<li><span>Titre de l'Oeuvre:</span> {{ $name }}</li>
  				<li><span>Dimmensions de l'Oeuvre:</span> {{ $width }}x{{ $height }}cm</li>
  				<li>
            <div class="bold">Technique et Matériaux:</div>
            <div class="ml-4">{{ $technique }}</div>
          </li>
  				<li>
            <div class="bold">Emplacement de la Signature:</div>
            <div class="ml-4">{{ $signature }}</div>
          </li>
  				<li><span>Année de création:</span> {{ $dateCreation }}</li>
  			</ul>
  			<div class="signature">
  				<p>Signature de l'Artiste</p>
  				<small>Fait le <span class="opacity-0">__________</span> à </small>
  			</div>
  		</div>
  		<div id="right-side">
        @php
          $exploded = explode('/', $image);
          $imagePath = public_path('uploads/' . end($exploded));
        @endphp
  			<img src="{{ $imagePath }}">
  			<div>
          <small>Numéros identification: LUHCF-FY9S-29UH-YSGN</small>
        </div>
  		</div>
  	</div>
  </body>
</html>