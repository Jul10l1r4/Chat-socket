<?php
$host = 'localhost';// Endereço de sua aplicação
$port = '9000'; // Configure uma porta, lembre-se que ela tem que ser deixada aberta! Então cuidado para não ter erros
$null = NULL; // E uma variável com valor nulo para ser enviado quando os buffers forem vazios
// Criando socket TCP/IP confugurado stream. Ler: rfc645
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// Configurando opções para aplicação socket
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
// configurando a porta, sintaxe: socket_bind(socket criada, endereço[Quando zero ou nulo é o localhost], e porta.. valor inteiro)
socket_bind($socket,0, $port);
// Como o nome já descritivo falam ouve tal conexão
socket_listen($socket);
// Cria e lista os sockets, afinal ... vamos receber mais de uma pessoa, possui forma de array:[]
$clients = array($socket);
// Iniciamos loop onde não parará, o servidor agora que precisa de um rasoável desempenho e não o aparelho do client side
while (true) {
	// Usando dados da variável que é um array já declarada na linha 14
	$changed = $clients;
	// Seleciona destino e executa chamada sintaxe: socket_select($ArrayDeSocket, $EspaçoParaGravar[forma de array], $ExcessoesParaNãoDeletar[forma de array], $valorInteiroDoFim[Em Segundos], $valorInteiroDofim[Em Milesegundos]);
	// Essa operação não traz informações detalhadas no manual do php, essa sintáxe se assimila ao padrão da linguagem C disponível:
	// http://man7.org/linux/man-pages/man2/select_tut.2.html [Ingles]
	socket_select($changed, $null, $null, 0, 10);

	// Verifica se o changed esta na array da conexão
	if (in_array($socket, $changed)) {
		$socket_new = socket_accept($socket); // Informações de aparelho conectado

		$clients[] = $socket_new; // Adiciona o socket ao cliente

		// socket_read($socketAcept, $valorNuméricoDosDados) | A no firefox antes do Gecko 11.0 eram 16MB o máximo mas atualmente 
		// o limite máximo é 2GB!!! Mas se você não quer nada pesado no lado do cliente é bom você não exceder essa quantidade
		$header = socket_read($socket_new, 1024); // Ler dados enviados, ler até 1024 bytes(1kb), aah não vai dar isso tudo a gente sabe

		perform_handshaking($header, $socket_new, $host, $port); // Essa não é uma função nativa do php (ainda) ela irá levar os dados
		// para estabelecer uma conexão
	
		// Sintaxe: socket_getpeername($SocketAceito, $VariávelCriadaAgoraParaSerUsada);
		socket_getpeername($socket_new, $ip); // Captura o endereço de ip do socket aceito

		// A variável $response receberar um json que será transformado para que o protocolo funcione, ele fará um pack logo a baixo
		$response = embaralhar(json_encode(array('name'=>'system', 'message'=>$ip." connected    ̿̿ ̿̿ ̿'̿'\̵͇̿̿\з= ( ▀ ͜͞ʖ▀) =ε/̵͇̿̿/’̿’̿ ̿ ̿̿ ̿̿ ̿̿ Ok, ele fez todo o processo do handshake"))); //prepare json data

		// Envia resposta com cabeçalho em hexadecimal e chave, para que funcione (Isso até o php7.2 não existe suporte, ainda
		send_message($response); // Nome bastante descritivo hehe
		
		// Destrói valor de usuário para não ter problemas com dados
		$found_socket = array_search($socket, $changed);
		//Unset, nativa do php desde a versão 4 <3
		unset($changed[$found_socket]);
	}
	
	// Navegação para processar os dados 
	foreach ($changed as $changed_socket) {	
		
		// Verifica se os dados foram de fato recebidos #### sintaxe: socket_recv($socketAceito, $valoresRecebidos,$tamanhoDeDados, flags[São os valores pre-definidos])
		// disponível: http://php.net/manual/fa/function.socket-recv.php [Ingles]
		while(socket_recv($changed_socket, $buf, 1024, 0) >= 1)	{
			send_message($buf); // Envia a string 😎 [Não é nativa]
		}
		
		//Verifica a leitura dos dados e se não houver nada remove da memória o client
		$buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);/// O "@" utilizado afim de economizar memória.
		if ($buf === false) { // ler comentário da linha 61
			$found_socket = array_search($changed_socket, $clients);
			socket_getpeername($changed_socket, $ip);
			unset($clients[$found_socket]);
		}
	}
}
// Finaliza o socket, uma vez que cai fora do escopo
socket_close($socket);//Essa é a variável da linha 6 Sintaxe: socket_close($primeiraConexãoDeclaradaGeral)

function send_message($msg){//Declarada essa função na linha 59 
	global $clients;// globa, para pegar variável fora do escopo da função e dentro de outro escopo
	foreach($clients as $changed_socket)	{
		@socket_write($changed_socket,$msg,strlen($msg));// Sintaxe: socket_write($SocketAceita,$Conteúdo,$NumeroDebyte), parece com o sock_recev
	}
	return true; // Se enviado, ok
}
// Padrão de envio da rfc645 deleta os dados que antecedem a mensagem(Os valores hexadecimais), creio que será nativa logo logo
function desembaralhar($texto) {
	$length = ord($texto[1]) & 127;
	if($length == 126) {
		$masks = substr($texto, 4, 4);
		$data = substr($texto, 8);
	}
	elseif($length == 127) {
		$masks = substr($texto, 10, 4);
		$data = substr($texto, 14);
	}
	else {
		$masks = substr($texto, 2, 4);
		$data = substr($texto, 6);
	}
	$text = "";
	for ($i = 0; $i < strlen($data); ++$i) {
		$texto .= $data[$i] ^ $masks[$i%4];
	}
	return $texto;
}
// O inverso do que o da linha 80 faz, ele põe valores hexadecimais de uma o que será
function embaralhar($texto){
	$b1 = 0x80 | (0x1 & 0x0f);// Esse código se corresponde a diferentes valores que transformam os resultados
	$length = strlen($texto);
	// De acordo com o tamanho do texto ele fará a sua entrada	

	if($length <= 125)
		$header = pack('CC', $b1, $length);// Sitaxe: pack($comoDesejaSaída, $ValorQueASaída, $tamanho), repetindo, creio que essa função
	// apartir de um certo tempo será uma função nativa, pack disponível no manual do php:
	// http://php.net/manual/pt_BR/function.pack.php [Portugues em progressão]
	elseif($length > 125 && $length < 65536)
		$header = pack('CCn', $b1, 126, $length);
	elseif($length >= 65536)
		$header = pack('CCNN', $b1, 127, $length);
	return $header.$texto;// Dessa forma os dados do cabelhado vem antes do texto
}
// Cria um novo cliente handshaking com o padrão rfc645, Essa função também é bastante provavel que seja nativa do php
function perform_handshaking($receved_header,$client_conn, $host, $port){
	$headers = array();
	$lines = preg_split("/\r\n/", $receved_header);
	foreach($lines as $line)	{
		$line = chop($line);
		if(preg_match('/\A(\S+): (.*)\z/', $line, $matches)){
			$headers[$matches[1]] = $matches[2];
		}
	}
	$secKey = $headers['Sec-WebSocket-Key'];// Key padrão de valor ↓
	$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
	// Segudo o padrão se deve mandar a hash sha1 em hexadecimal para base64, esse é o processo
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .// cabeçalho tradicional
	"Upgrade: websocket\r\n" .
	"Connection: Upgrade\r\n" .
	"WebSocket-Origin: $host\r\n" .
	"WebSocket-Location: ws://$host:$port/demo/shout.php\r\n".
	"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
	socket_write($client_conn,$upgrade,strlen($upgrade));// Envia, para sintaxe ver comentário da linha 76
}
