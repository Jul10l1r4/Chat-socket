# 🐘 Chat-socket 
<h2> Visite o projeto original <a href="https://notabug.org/Jul10l1r4/Chat-Socket-PHP">@jul10l1r4/Chat-Socket-PHP</a></h2>
Um chat criado com motor em php no servidor, usando o socket protocol 🤘🏿 real-time 🍃 levinho.

<h1>🔧 Estrutura</h1>
<h3>🤘🏿 Index.php</h3>
<p> Nesse arquivo tem o necessário para a conexão em javascript e estilização em css como referencia em sí, vale lembrar para 
  permitir as caracterações no arquivo no dentro do <code> head</code>.
  
  ``` 
        ...
    <meta charset="utf-8"/>
        ...
  ```
  <p> 
     obs.: Sinta-se livre para me mandar pull request e ajeitar esse designer 🙊
  </p>
  <h3>🤘🏿 Respostas.php</h3>
  <p>
    Esse arquivo possui 137 linhas de códigos comentadas e explicativas para ajudar a configurar conforme seja o desejo de sua aplicação
  </p>
  <h3>🤘🏿 Disparar.php</h3>
  <p> 
    Seu nome bastante descritivo, precisa ser configurado conforme o servidor e  a versão do php, colocando a sua sintaxe
  <strong>Infelizmente esse código de disparo é compatível apenas com Unix-Likes</strong>
  </p>
  <h3>🤘🏿 Sockets.js</h3>
  <p>
    Script moderno usando o <a href="https://github.com/airbnb/javascript#arrow-functions">arrow function</a> (segundo o padrão do codestyle <a href="https://github.com/airbnb/javascript">airbnb</a>. Esse script faz um tratamento de funções de socket, abre conexão, precisa ser configurada a porta e o endereço de onde deseja ser aberta e todas as configurações de saídas👌🏽.
  </p>
<h1>🎖 Instruções para uso desse chat</h1>
<h2>🙇🏾‍ Antes de fazer qualquer coisa em um servidor, <strong>teste em sua maquina local</strong></h2>
<p>
   É ideal que faça o teste para que não venha por seu serviço web em riscos, ou vunerabilidade, verifique a porta, notifique o firewall evite alterar ele no próprio servidor, isso é perigoso.
 </p>
