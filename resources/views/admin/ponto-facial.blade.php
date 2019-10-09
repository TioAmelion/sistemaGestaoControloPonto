
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!--Título-->
		<title>Camera Test</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Apenas um teste"/>
			
		<!--OpenType-->
		<meta property="og:locale" content="pt_BR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="" />
		
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href='{{asset("assests/$tema/face/style.css")}}' />
	</head>
	<body>
		<div class="area">
			<video autoplay="true" id="webCamera">
			</video>
			<form target="POST">
				<textarea  type="text" id="base_img" name="base_img"></textarea>
				<button type="button" onclick="takeSnapShot()">Marcar o ponto</button>
			</form>
			<img id="imagemConvertida"/>
			<p id="caminhoImagem" class="caminho-imagem"><a href="" target="_blank"></a></p>
			<!--Scripts-->
			<script src='{{asset("assests/$tema/face/script.js")}}'></script>
		</div>
	</body>
</html>