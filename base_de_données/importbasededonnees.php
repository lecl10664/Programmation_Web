<?php
	echo "Votre base est en cours de restauration.......
		<br>";
		system("cat appg9b.sql | mysql --host=localhost --user=appg9b --password=1234");
	echo "C'est fini. Votre base de donn�e est en place sur cet h�bergement.";
?>