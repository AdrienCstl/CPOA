
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="language" content="fr" />
		<link href="./style/header.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/footer.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/globalcss.css" media="all" rel="stylesheet " type="text/css" />
		<script type="text/javascript" src="./scripts/jquery-1.12.3.js"></script>

		<script type="text/javascript">

		$('document').ready(function(){

			$("#btnAffect").click(function(e)
				{
					$('#affect').slideToggle("slow");

					});

				$("#btnAjout").click(function(e)
					{
						$('#ajout').slideToggle("slow");
						});

		});

		var i = 1;
		var j = 1;

		function addFields(){







					 // créer variable avec l'id d'un div
					 var container = document.getElementById("services");


							 //créer un input avec type et nom
							 var input = document.createElement("input");
							 input.type = "text";
							 input.name = "nomService" + i;
							 container.appendChild(input);
							 container.appendChild(document.createElement("br"));

							 i = i +1;

			 }









		</script>
