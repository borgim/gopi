<?php

/*******************************************
Desenvolvido por Pedro Borges
-> github.com/BorgesPedro
-> twitter.com/DeliciosoPedrin
-> instagram.com/_borgin
Do Brasil, para vocês, seus lindos
*******************************************/

error_reporting(0);
set_time_limit(0);

if (count($argv) < 2) {
    echo "\e[1;32m
   ██████╗  ██████╗ ██████╗ ██╗
  ██╔════╝ ██╔═══██╗██╔══██╗██║
  ██║  ███╗██║   ██║██████╔╝██║
  ██║   ██║██║   ██║██╔═══╝ ██║
  ╚██████╔╝╚██████╔╝██║     ██║
   ╚═════╝  ╚═════╝ ╚═╝     ╚═╝\e[0m \e[1;34mCrypt 1.0\e[0m\n  Usage:\n  -> php gopi.php crypt\n  -> php gopi.php decrypt";
}else{
	switch ($argv[1]) {
		case 'crypt':
			echo "\e[1;35mType what you want to encrypt\e[0m\n";
			$cryptcontent = readline("> ");
			echo $cryptcontent . "\n";
			echo "\e[1;35mType key for encryption\e[0m\n";
			$cryptkey = readline("> ");
			echo $cryptkey;
			break;
		case 'decrypt':
			echo "\e[1;35mType file you want to dencrypt\e[0m\n";
			$cryptcontent = readline("> ");
			echo $cryptcontent . "\n";
			echo "\e[1;35mType key for decryption\e[0m\n";
			$cryptkey = readline("> ");
			echo $cryptkey;
			break;
		default:
			echo "  Usage:\n  -> php gopi.php crypt\n  -> php gopi.php decrypt";
			break;
	};
}

?>



