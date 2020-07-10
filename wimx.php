<?php

/*******************************************
Desenvolvido por Pedro Borges(ig: @_borgin)
Do Brasil, para vocês, seus lindos
*******************************************/

error_reporting(0);
set_time_limit(0);



function InitialScreen(){
	echo "\e[1;32m 
 __          ___                
 \ \        / (_)               
  \ \  /\  / / _ _ __ ___ __  __
   \ \/  \/ / | | '_ ` _ \| \/ |
    \ V1.0 /  | | | | | | |>  < 
     \/  \/   |_|_| |_| |_/_/\_|M45T3RF1L3\e[0m\n\n";
}
//funcao cria wpass
function CreateWpass(){
	$dic = mkdir("wpass", 0600);
	if ($dic == true) {
		fopen("wpass.wimx", "w+");
		rename("wpass.wimx", "wpass/"."wpass.wimx");
		echo "wpass created"."\n\n";
	}
}
//funcao criar pasta
function CreateFolder($nome){
	$criar = mkdir($nome);
	fopen($nome . ".wimx", "w+");
	rename($nome.".wimx", "$nome/"."$nome".'.wimx');
	echo $criar == true ? "[ + ] Folder\x20\e[1;36m".$nome."\e[0m Created":"Folder not created";}
//funcao salvar 
/*function SaveFile($foldername, $file, $masterpass){
	$open = fopen("$file", "a");
	$content = fgets($open);
	print_r($content);
	$method = 'aes-256-cbc';
	$key = substr(hash('sha256', $masterpass, true), 0, 32);
	$iv = "9f574008a0e0cd804c10879d41b57e98";
	$encrypted = base64_encode(openssl_encrypt($content, $method, $key, OPENSSL_RAW_DATA, $iv));
	$new_open = fopen("$foldername/$file", "a");
	$write = fwrite($new_open, $encrypted."\n");
	fclose($open); 
	//rename($file, "$foldername/"."$file");
	
	echo $write == true?"[ + ] File\x20\e[1;36m".$file."\e[0m\x20encrypted to\x20\e[1;36m".$encrypted."\e[0m\x20saved\e[0m ":"[ - ]\e[1;31m File doesnt saved\e[0m\n"; 
	unlink($file);}*/

//funcao salvar senha
function SavePass($foldername, $pass, $masterpass){
	$open = fopen("$foldername/$foldername.wimx", "a");
	$method = 'aes-256-cbc';
	$key = substr(hash('sha256', $masterpass, true), 0, 32);
	$iv = "9f574008a0e0cd804c10879d41b57e98";
	$encrypted = base64_encode(openssl_encrypt($pass, $method, $key, OPENSSL_RAW_DATA, $iv));
	$write = fwrite($open, $encrypted."\n");
	fclose($open); 
	echo $write == true?"[ + ] File\x20\e[1;36m".$pass."\e[0m\x20encrypted to\x20\e[1;36m".$encrypted."\e[0m\x20saved\e[0m ":"[ - ]\e[1;31m File doesnt saved\e[0m\n";}
//funcao ver 
function SeePass($foldername, $masterpass){
	$method = 'aes-256-cbc';
	$key = substr(hash('sha256', $masterpass, true), 0, 32);
	$iv = "9f574008a0e0cd804c10879d41b57e98";
	$open   = fopen("$foldername/$foldername.wimx", "r");
	$result = [];
	while (!feof($open)) {
		$result[] = fgets($open);
	}
	fclose($open);
	echo "\n\e[0;32mListing your passwords\e[0m\n";
	foreach($result as $results){
		if ($results == "") {
			continue;
		}
		$decrypted = openssl_decrypt(base64_decode($results), $method, $key, OPENSSL_RAW_DATA, $iv);
		echo "\e[1;35m[ + ]\e[0m \e[1;33mHash: $results\e[0m";
		echo "\e[1;35m[ + ]\e[0m \e[0;36mPass: $decrypted\e[0m\n-----------------------------\n";
		}

	}
//cria pasta wpass caso ela não exista
if (!file_exists('wpass')) {
	CreateWpass();
}

$help = array('Help', 'help', '-h', 'h');
//definindo argumentos
$param1 = $argv[1]; 
$param2 = $argv[2]; 
$param3 = $argv[3]; 
$param4 = $argv[4]; 

switch ($param1) {
 	case in_array($param1, $help):
 	case '':
 		InitialScreen();
		$text   = "\e[0;36mUsage:\e[0m" ."\n";
		$text  .= "Your files will be stored in a folder. The Wimx comes with it pre-defined <wpass>"."\n"." but you can create another whatever name you want. When encrypting files, I recommend that you place the file to\n be encrypted in the wimx directory"                                . "\n\n";
		$text  .= "\e[1;35m[+]\e[0mTo create a folder"                                             .   "\n";
		$text  .= "php wimx.php create <folder name> "                                             .   "\n";
		$text  .= "-----------------"                                                              .   "\n";
		$text  .= "\e[1;35m[+]\e[0mTo save FILES:"                                                 .   "\n";
		$text  .= "php wimx.php file <folder> <file> <masterpassword>" 							   .   "\n";
		$text  .= "-----------------"                                                              .   "\n";
		$text  .= "\e[1;35m[+]\e[0mTo save PASSWORDS:"                                             .   "\n";
		$text  .= "php wimx.php pass <folder> <password> <masterpassword>"                         .   "\n";
		$text  .= "-----------------"                                                              .   "\n";
		$text  .= "\e[1;35m[+]\e[0mTo see yours saved:"                                            .   "\n";
		$text  .= "php wimx.php see <folder> <masterpassword>" ;
		print($text);
 		break;
 	case 'create':
 		if ($param2 != '') {CreateFolder($param2);}else{echo "Type foldername";}
 		break;

 	case 'file':
 		if ($param2 != '' && $param3 != '' && $param4 != '') {SaveFile($param2, $param3, $param4);}else{echo "Fill correctly";}
 		break;

 	case 'pass':
 		if ($param2 != '' && $param3 != '' && $param4 != '') {SavePass($param2, $param3, $param4);}else{echo "Fill correctly";}
 		break;

 	case 'see':
 		if ($param2 != '' && $param3 != '') {SeePass($param2, $param3);}else{echo "Fill correctly";}
 		break;
 	
 	default:
 		echo "Invalid Command";
 		break;
 } 
?>



