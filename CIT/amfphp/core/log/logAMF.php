<?php
class logAMF
{
    var $nErro;
    var $msgErro;
    var $nomeArquivo;
    var $numLinha;
    var $vars;

    function logAMF($nErro, $msgErro, $nomeArquivo, $numLinha, $vars)
    {
        $this->nErro          = $nErro;
        $this->msgErro        = $msgErro;
        $this->nomeArquivo    = $nomeArquivo;
        $this->numLinha       = $numLinha;
        $this->vars           = $vars;
        $this->logErro();
    }

    function getDescricaoErro($nErro)
    {
        // Define uma matriz associativa com as strings dos erros
        $desErro = array(
                1    => "Error",
                2    => "Warning",
                4    => "Parsing Error",
                8    => "Notice",
                16   => "Core Error",
                32   => "Core Warning",
                64   => "Compile Error",
                128  => "Compile Warning",
                256  => "User Error",
                512  => "User Warning",
                1024 => "User Notice",
                2048 => "Runtime Notice",
                4096 => "Catchable Fatal Error",
                8191 => "ALL");

        if( isset( $desErro[$nErro] ) )
        {
            return $desErro[$nErro];
        }
        return null;
    }

    function logErro()
    {
        $dt       = date("d-m-Y H:i:s");
        $mensagem = str_replace("
", "", $this->msgErro);
        $msgLog   = "[" . $dt . "][" . $this->nErro . " - " .
                    $this->getDescricaoErro($this->nErro) . "][" .
                    $this->nomeArquivo . " linha: " .
                    $this->numLinha . "] - " .
                    $mensagem;

        // nome do arquivo
        $diretorioLog = AMFPHP_BASE  . "log/";

        $NomeComCaminho = $diretorioLog . date("Ymd") . ".txt";
        clearstatcache();

        // gravando no arquivo de log
        $this->grava($NomeComCaminho,$msgLog);
    }

    function grava($NomeComCaminho,$msgLog)
    {
        $nomeArquivo = str_replace("//", "/", $NomeComCaminho);
        if ($setaArquivo = @fopen($nomeArquivo, "a"))
        {
            @fwrite($setaArquivo, $msgLog);
        }
    }
}
?>