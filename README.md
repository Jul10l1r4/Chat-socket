# 🐘 Chat-socket | PHP7
<br/>   Suportado nos navegadores a partir de 2017, nativas do firefox desde as versões de 2016, [veja as relações de suportes](https://kangax.github.io/compat-table/es6/). 
<h2>Projeto original disponível em <a href="https://notabug.org/Jul10l1r4/Chat-Socket-PHP">@Jul10l1r4</a></h2>
Um chat criado com motor em php no servidor, usando o socket protocol 🤘🏿 real-time 🍃 levinho.

## Sumário 🔎

* [Estrutura do index.php](https://github.com/Jul10l1r4/Chat-socket#-indexphp)

* [Estrutura do respostas.php](https://github.com/Jul10l1r4/Chat-socket#-respostasphp)

* [Estrutura do sockets.js](https://github.com/Jul10l1r4/Chat-socket#-socketsjs)

* [Estrutura do arquivi disparar.php](https://github.com/Jul10l1r4/Chat-socket#-dispararphp)

* [Instruções para uso](https://notabug.org/Jul10l1r4/Chat-Socket-PHP#instru%C3%A7%C3%B5es-para-uso-desse-chat-)

* [Execute o chat WebSocket em PHP](https://github.com/Jul10l1r4/Chat-socket#execute-o-chat-)
 


<h1>🔧 Estrutura</h1>
<h3>🤘🏿 Index.php</h3>
   <p>
Nesse arquivo tem o necessário para a conexão em javascript e estilização em css como referencia em sí, vale lembrar para 
  permitir as caracterações no arquivo no dentro do <code>head</code>
  <br/>
  
 ```html
    <meta charset="utf-8"/>
 ```
 
<br/><blockquote>Obs.: Sinta-se livre para me mandar pull request e ajeitar esse designer 🙊</blockquote>
   
  
  <h3>🤘🏿 Respostas.php</h3>


  Esse arquivo possui 137 linhas de códigos comentadas e explicativas para ajudar a configurar conforme seja o desejo de sua aplicação
 
  <h3>🤘🏿 Disparar.php</h3>
 Seu nome bastante descritivo, precisa ser configurado conforme o servidor e  a versão do php, colocando a sua      sintaxe. <strong>infelizmente esse código de disparo é compatível apenas com Unix-Likes</strong>.
 
  <h3>🤘🏿 Sockets.js</h3>

Script moderno usando o [arrow function](https://github.com/airbnb/javascript#arrow-functions) (segundo o padrão do codestyle [airbnb](https://github.com/airbnb/javascript). Esse script faz um tratamento de funções de socket, abre conexão, precisa ser configurada a porta e o endereço de onde deseja ser aberta e todas as configurações de saídas👌🏽.

## Execute o chat 👿

*Atenção*: Não é indicado usa-la em um servidor online antes de configura-la para usar em sua aplicação.

Para rodar a aplicação você precisa navegar onde o servidor esta rodando e baixar para isso execute no seu unix-like:

```bash
    $ wget https://notabug.org/Jul10l1r4/Chat-Socket-PHP/archive/master.zip && unzip master.zip && cd chat-socket-php
```

ou

```bash
    $ git clone https://notabug.org/Jul10l1r4/Chat-Socket-PHP.git && cd Chat-Socket-PHP
```

Edite os arquivos configure-os, já que estais no terminal, executaremos a nossa aplicação

```
    $ php socket/respostas.php 
```

E agora, faça a festa, abra o browser e navegue até a aplicação e abra:

![Vüilar](https://notabug.org/Jul10l1r4/Chat-Socket-PHP/raw/master/Print-readme/screenshot.png)

Edite o arquivo `disparar.php` para não precisar executar através do terminal, para fazer isso aperte `control + c` (isso parará a execução do serviço de socket que foi executado nos códigos anteriores), você pode digitar os seguintes comandos:

```bash 
    $ pwd
```
 
 Copie a informação alí, você pode marcar o texto e apertar `control + shift + c`, agora feche o terminal e abra o arquivo `disparar.php` na pasta do servidor em `Chat-Socket-PHP/disparar.php` use o editor de sua preferência e no arquivo aberto edite a informação:
 
 ```php	

    <?php //Não use espaçamento entre o texto colado e o resto da string
      exec( "/usr/bin/php Cole aqui o a informação pega no código acima/socket/respostas.php" );
 ```
 
 Cole a informação copiada pelo terminal no lugar indicado, salve e fim, agora basta identificar o arquivo no seu browser, que provavelmente será em `http://localhost/Chat-Socket-PHP/disparar.php`. 
  
## Esse projeto é livre sob liceça GPL-3 🐏
 Use e abuse, cite-me e estará tudo certo 😸. Leia sobre a licença [GPL-3](https://www.gnu.org/licenses/gpl-3.0-standalone.html)
