<?php

//receber: Metodo, chave, iv, conteudo
error_reporting('0');

class Grypt
{
    private static $method = 'aes-256-cbc';
    private $key;
    private $iv = null;
    private $data = "texto.txt";
    private $encrypted_data;


    //Getters
    public function getKey()
    {
      return $this->key;
    }
    public function getIV()
    {
      return $this->iv;
    }
    public function getData()
    {
      return $this->data;
    }
    public function getEncrypted_data()
    {
        return $this->encrypted_data;
    }

    //Setters
    public function setKey($key)
    {
     // $this->key = $key;
       $this->key = substr(hash('sha256', $key, true), 0, 32);
    }
    public function setIV()
    {
     $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$method)); 
    }
    public function setData($data)
    {
      $mime = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
      //$ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array(pathinfo($this->getData(), PATHINFO_EXTENSION), $mime)) {
          echo "Está no array\n";
      }else {
        echo "Não está no array";
      }

      $this->data = $data;
    }
    public function encrypt($key ){
        if (!$this->getKey() == null && !$this->getData() == null) {
          $this->setIV();
          $this->encrypted_data = base64_encode(openssl_encrypt($this->getData(), self::$method, $this->getKey(), OPENSSL_RAW_DATA, $this->getIV()));
          
          if ($this->getEncrypted_data()) {
            return true;
          }          

        }else{
          return false;
        }
    }
}

/**Debuggers */
//instancia da classe
$crypt = new Grypt();

//settar chave de criptografia
$crypt->setKey('eusoufoda') . "\n";
echo "Chave encriptada: " . $crypt->getKey() . "\n"; //debug key

$crypt->setData($argv[1]);
echo "Conteudo: " . $crypt->getData() . "\n"; //debug conteudo

//mandar encriptar gerando um iv
$crypt->encrypt();
echo "IV gerado no metodo encrypt: " . $crypt->getIV() . "\n"; // debug iv

//captura o conteudo encriptado pelo metodo encrypt
echo "Conteudo encriptado: " . $crypt->getEncrypted_data() . "\n"; //debug conteudo encriptado

if ($crypt->encrypt() == true) {
  echo "Criptografado com sucesso\n";

}else{
  echo 'Erro ao criptografar';
}


 ?>



