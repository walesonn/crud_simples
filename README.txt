Como configurar este mini-projeto para rodar no linux Ubuntu

REQUISITOS:
   Obviamente estar em um sistema Linux
   Servidor apache2 ou nginx (Porém mostrarei como configurar apenas no apache caso saiba ou queira usa-lo com nginx fique a vontade)
   php7.x
   MySQL
   Composer

1. No terminal de comando atualize seus pacotes com o comando:
   --  sudo apt update && sudo apt upgrade -y

2. Agora vamos instalar o servidor apache2, apenas digite o comando:
   --  sudo apt install apache2 -y

3. Abra seu browser copie o ip da maquina que você acabou de instalar o apache e cole no browser. Você verá uma página ser renderizada na tela como se fosse um site, nela é possivel ver algumas configurações e caminhos de pastas do servidor apache.Esta página que você esta vendo é um arquivo index.html que está na pasta /var/www/html/ dentro do seu sistema Linux Ubuntu.

4. Também é possível verificar se o apache2 está devidamente instalado digitando o sequinte comando no seu terminal:
   --  sudo service apache2 status

5. Agora vamos instalar o php7.4 mais antes vamos rodar o seguinte comando antes:
   -- sudo add-apt-repository ppa:ondrej/php
   este comando ira adicionar o repositório onde ficará simples instalar o php na versão 7.4.

6. Apos ter rodado o comando anterior atualize os pacotes novamente com o comando:
   -- sudo apt update && sudo apt upgrade -y

7. Agora podemos instalar o php7.4 com o seguinte comando:
   -- sudo apt install php7.4 -y

8. Agora vamos instalar o mysql com o comando:
   -- sudo apt install mysql-server -y

9. Agora verifique se o git está instalado no seu sistema com o comando git , caso não rode o comando:
   -- sudo apt install git -y

10. Agora entre na pasta onde você irá clonar o nosso mini-projetinho com o comando:
    -- cd /var/www/ && sudo git clone https://github.com/walesonn/crud_simples.git

11. Bem parece que esquecemos de instalar o composer mas não tem problema, uma vez que o php ja esteje instalado basta apenas digitar o comando no seu terminal:
    -- sudo apt install composer -y

12. Agora podemos usar o composer para instalar as dependências do nosso projetinho, apesar de não termos dependência nenhuma após rodar o comando você notará que a pasta vendor será adicionada na raiz do projeto, esta pasta e extremamente necessária pois sem ela nossas classes não seriam carregadas gerando um erro ao tentar visualizar nosso projeto no browser. Então vamos rode o comando :
    -- composer install


13. Agora rode o seguinte comando no seu terminal para mudar a permissão de acesso as pastas do projeto de root para www-data com o comando:
    -- sudo chown -R www-data:www-data /var/www/crud_simples/  se este comando não for executado o apache não conseguirá acessar as pastas do projeto gerando um error de log ok então rode meu filho vai.

14. Pronto agora rode o comando para criar o nosso banco e tabela dentro do mysql senão onde é que vamos salvar nossos contatos não é mesmo, entao rode:
    -- mysql -u root < /var/www/crud_simples/App/Database/script.sql

15 . Nossa ainda falta configurarmos mais uma coisa e dessa vez é no nosso servidor apache. Digite o seguinte comando:
    -- sudo nano /etc/apache2/sites-available/000-default.conf
    Apos digitar este comando abrirá o arquivo, apage tudo dentro dele depois copie as diretivas abaixo e cole dentro deste arquivo depois dê um ctrl + x e y para salvar.

<VirtualHost *:80>

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/crud_simples/

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>

16. Agora reinicie o servidor apache2 para a configuração pasar a valer:
    -- sudo service apache2 restart

17. Esquecemos de configurar nosso usuário que se conecta ao banco de dados então digite o comando para acessar a pasta e dentro dela coloque seu usuario e senha do banco de dados. No seu caso pode ser que este usuário seje root e a senha seje null ou seja sem senha, para fins de teste vamos usar este mesmo.
    -- sudo nano /var/www/crud_simples/Conf/database.php     -> este comando abrirá o arquivo de configuração so lê-lo que encontrará onde colocar o seu usuário e senha. Por via das dúvidas já deixarei esta configuração por padrão mas nae se esqueça caso possua um usuário diferente adicione as modificações neste arquivo.

Agora vai la no browser e cole o ip do seu servidor e veja o projeto funcionando.

Obrigado por tudo sucesso e até logo.

