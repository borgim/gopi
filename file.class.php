<?php
/* 
classe arquivo
	o que precisa para funcionar? 
        Arquivo
        tipo de abertura
	quais serao suas funcionalidades?
		ler o arquivo
			o que preciso para ler o arquivo?
                apenas a funcao nativa do PHP file_get_contents
                //$a1->setArquivo("nome_arquivo")
                //$a1->ler();
		escrever no arquivo
            o que preciso para escrever no arquivo?
                perguntar o tipo da abertura a+ ou w+
                abrir o arquivo com fopen
                depois fechar o arquivo
                //$a1->setArquivo("nome_arquivo")
                //$a1->setTipo(1)
                //$a1->escrever("conteudo")
*/
class Arquivo{
    private $arquivo;
    private $tipo;
    private $arquivo_aberto;
    //funcionalidades

    //pegar nome do arquivo
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;

    }
    private function getArquivo()
    {
        return $this->arquivo;

    }
    //settar o tipo da abertura
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    private function getTipo()
    {
        return $this->tipo;
    }
    //ler arquivo
    public function ler()
    {
        return file_get_contents($this->getArquivo());
    }

    public function escrever($conteudo)
    {
        if($this->getTipo() == 1){
            $modo = 'a+';
        }elseif ($this->getTipo() == 2) {
            $modo = 'w+';
        }else{
            die();
        }
       $this->arquivo_aberto = fopen($this->getArquivo(), $modo);
       fwrite($this->arquivo_aberto, $conteudo."\n");
       fclose($this->arquivo_aberto);
    }
}
//documentacao
    //definindo arquivo
        //->setArquivo('nome_arquivo');
    //ler arquivo
        //->ler(getArquivo());
    //editar arquivo
        //->setTipo(1 or 2)
        //->escrever('conteudo');