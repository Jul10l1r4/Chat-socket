# 🐘 Chat-socket | PHP7
<br/>   Suportado nos navegadores a partir de 2017, nativas do firefox desde as versões de 2016, [veja as relações de suportes](https://kangax.github.io/compat-table/es6/). 
<h2>Projeto original disponível em <a href="https://notabug.org/Jul10l1r4/Chat-Socket-PHP">@Jul10l1r4</a></h2>
Um chat criado com motor em php no servidor, usando o socket protocol 🤘🏿 real-time 🍃 levinho.

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

<h1>🎖 Instruções para uso desse chat</h1>
<p>
Antes de usa-lo preste atenção para alguns detalhes vitais para ele.
</p>
<h2>🙇🏾‍ Antes de fazer qualquer coisa em um servidor, <strong>teste em sua maquina local</strong></h2>
   É ideal que faça o teste para que não venha por seu serviço web em riscos, ou vunerabilidade, verifique a porta, notifique o firewall evite alterar ele no próprio servidor, isso é perigoso.
 <h2>🤓 Abra e estude todos os códigos</h2>
 <br/>
 Estude os códigos, pois será usado por você, <a href="https://github.com/Jul10l1r4/Chat-socket/#-esse-projeto-%C3%A9-livre-sob-lice%C3%A7a-gpl-3">personalize conforme sua vontade</a>, pode vender o seu alterado, pode mudar e usar pra você (Lembrando de citar de onde o tirou).<br/>

 <p>
 Não esqueça de dar uma boa estudada no código disparar.php, ele tem uma função chamada <a href="http://php.net/manual/pt_BR/function.exec.php">exec()</a>, que executa códigos bash, lembre-se de executar uma vez, se for no servidor apenas uma para sempre, mude o arquivo de lugar, é perigoso que alguma pessoa execute mais vezes, isso causará problemas com os processos, caso isso aconteça você deve re-iniciar o servidor.<br/>
 </p>
 Caso tenha esperiencia com o unix-like, você pode ver todos os processos usando o programa <code>top</code>:

```bash
    Hostname@Server:~$ top
```
 Onde você verá o processo que provavelmente chame-se php e ele estará repetido, então você finalizará usando seu pid:
 
 ```bash
    Hostname@Server:~# kill <<Se numero do processo pid>>
 ```
 <p>
 No arquivo <code>respostas.php</code> edite a variável responsável por dar o local de onde será o socket, e o numero da porta será aberta.
 </p>
 
 <h2>🐏 Esse projeto é livre sob liceça GPL-3</h2>
 Use e abuse, cite-me e estará tudo certo 😸. Leia sobre a licença <a href="https://www.gnu.org/licenses/gpl-3.0-standalone.html">GPL-3</a>.
