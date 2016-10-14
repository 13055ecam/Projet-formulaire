<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <p>
        <H1> Reservation </H1>
        <p> Le prix de la place est de 10 € jusqu'à 12 ans et ensuite de 15 ans.</p>
        <p> Le prix d'assurance annulation est de 20 ans quels que soit le nombre de voyageurs. </p>
        	<form method ="post">
        	<p>Destination : 
				<input type="text" name="destination" /> </p>
				<p>Nombre de places : 
				<input type="text" name="place" /> </p>
				<p> Assurance annulation
				<input type="checkbox" name="annulation" id="case" /><label for ="case"> </label></p>
				<input type="submit" value= "next" />
				<input type="submit" value= "cancel" />
				</form>
        	</p>
		</form>
    </body>
</html>

