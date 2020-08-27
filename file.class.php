<?php

class File
{
    const EXTENSION = ['.jpg', '.png', '.jpeg', '.txt', '.pdf']; //constante contendo as extensoes validas
    const NCORRECT = "Error. File does not exists or is empty";
    public $file; //atributo que salva o arquivo aberto
    public $filecontent; //atributo para salvar o conteudo do arquivo
   
    //abrir
    public function open($file)//recebe um argumento com o nome do arquivo
    {
        if(file_exists($file)){//verifica se o arquivo existe no diretorio
            if(in_array(strstr($file, "."), self::EXTENSION)){//verifica se a extensao desse arquivo é valida na constante EXTENSION
                $this->file = fopen($file, "a+");//caso seja verdadeiro abre o arquivo salvando ele no atributo $file
            }
        }else{
            return self::NCORRECT;
            die();
        }
    }
    
    //ler
    public function read($file)//recebe um argumento com o nome do arquivo a ser lido
    {  
        if(file_exists($file)){
            if(!file_get_contents($file)){//verifica se o conteudo do arquivo for vazio
                return self::NCORRECT;//se for vazio, retorna erro
                die();
            }else{
                $this->filecontent = file_get_contents($file);//se não for vazio, pega o conteudo e coloca dentro do atributo $filecontent
                return $this->filecontent;//retorna o que foi salvo em $filecontent
            }
        }else{
            return self::NCORRECT;
        }
    }
  
    //escrever
    public function write($cryptcontent)//recebe um argumento contendo o conteudo a ser encriptado
    {
           ftruncate($this->file, 0);//apaga o conteudo do arquivo aberto
           $this->filecontent = null;//filecontent passa a receber null
           if(fwrite($this->file, $cryptcontent)){//verifica se foi possivel escrever o conteudo dentro do arquivo
               return true;//retorna verdadeiro se foi possivel salvar o conteudo
           }else{
               return false;//retorna falso se não foi possível salvar o conteudo
           }
    }
    public function close(){//metedo para fechar o arquivo aberto
        fclose($this->file);
    }
}