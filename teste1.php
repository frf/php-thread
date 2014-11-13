<?php
// Classe que aguarda um tempo aleatorio e depois imprime algo na tela
class AguardaRand extends Thread {

    // ID da thread (usado para identificar a ordem que as threads terminaram)
    protected $id;

    // Construtor que apenas atribui um ID para identificar a thread
    public function __construct($id) { 
        $this->id = $id;
    }

    // Metodo principal da thread, que sera acionado quando chamarmos "start"
    public function run() {

        $fileLog = "log.txt";
	$str = "";
        $str += "Inciando thread " . $this->id . " - " .  "\n";
        #$result = file_get_contents("http://localhost:8080/teste/");
	#$str += "Resultado thread (" . $result .")". $this->id . " - " ."\n";
	echo $str;	
	file_put_contents($fileLog,$str,FILE_APPEND);

        
    }
}

/// Execucao do codigo

// Criar um vetor com 10 threads do mesmo tipo
$vetor = array();
for ($id = 0; $id < 10; $id++) {
    $vetor[] = new AguardaRand($id);
}

// Iniciar a execucao das threads
foreach ($vetor as $thread) {
    $thread->start();
}

// Encerrar o script
exit(0);
