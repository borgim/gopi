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
   ╚═════╝  ╚═════╝ ╚═╝     ╚═╝\e[0m \e[1;34mCrypt 1.0\e[0m". PHP_EOL."  Usage:".PHP_EOL. "  -> php gopi.php crypt".PHP_EOL."  -> php gopi.php decrypt";
}else{
	switch ($argv[1]) {
		case 'crypt':
			do{
				echo "\e[1;35;42mType password you want hide\e[0m".PHP_EOL;
				$cryptcontent = readline("> ");
			}while(empty($cryptcontent));
			echo $cryptcontent . PHP_EOL;
			echo "\e[1;35mDefine a key for encryption\e[0m". PHP_EOL;
			$cryptkey = readline("> ");
			echo $cryptkey;
			break;
		case 'decrypt':
			do{
				echo "\e[1;35;42mType key for decryption\e[0m".PHP_EOL;
				$cryptkey = readline("> ");
			}while(empty($cryptkey));
			echo $cryptkey;
			break;
		default:
			echo "  Usage:".PHP_EOL."  -> php gopi.php crypt".PHP_EOL."  -> php gopi.php decrypt";
			break;
	};
}

?>



