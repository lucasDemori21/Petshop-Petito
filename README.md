## Projeto Petito - Sistema de Gestão para Pet Shop

<h3>Descrição do Projeto:</h3>
    <p>
        O projeto Petito é um sistema de gestão web e móvel desenvolvido para atender às necessidades específicas de um Pet Shop chamado "Petito". Este sistema oferece funcionalidades como vendas online, agendamento de serviços e um painel de controle personalizado para os funcionários. Ele é construído utilizando tecnologias modernas como PHP 8 com o framework Laravel, HTML5, CSS3, JavaScript, Bootstrap e MySQL para o banco de dados.
    </p>

<h3>Motivação para Aprimorar Conhecimentos no Laravel:</h3>
    <p>
        A escolha do framework Laravel para este projeto visa aprimorar os conhecimentos em desenvolvimento web, especialmente no contexto de PHP. Laravel é conhecido por sua elegância, simplicidade e eficiência, proporcionando uma experiência de desenvolvimento ágil e estruturada. Ao trabalhar com o Laravel, você terá a oportunidade de explorar práticas modernas de desenvolvimento, arquitetura MVC e a vasta gama de ferramentas que o framework oferece.
    </p>

<h3>Tecnologias Utilizadas:</h3>
    <ul>
        <li>PHP 8: Linguagem de programação principal.</li>
        <li>Laravel: Framework PHP para o desenvolvimento web.</li>
        <li>HTML5, CSS3, JavaScript: Tecnologias fundamentais para a construção da interface do usuário.</li>
        <li>Bootstrap: Framework CSS para design responsivo e amigável.</li>
        <li>MySQL: Sistema de gerenciamento de banco de dados relacional.</li>
    </ul>

<h3>Como Iniciar o Projeto:</h3>

<h4>Pré-requisitos:</h4>
    <p>
        Certifique-se de ter o PHP 8 instalado em sua máquina. Instale o Composer, uma ferramenta para gerenciar as dependências do PHP.
    </p>

<h4>Passo a Passo:</h4>

<h4>Clone o Repositório:</h4>
    <pre><code>git clone https://github.com/seu-usuario/petito.git</code></pre>

<h4>Instale as Dependências:</h4>
<pre><code>cd petito<br></code></pre>
<pre><code>composer install<br></code></pre>

<h4>Configure o Ambiente:</h4>
<p>
    Copie o arquivo .env.example para um novo arquivo chamado .env. Configure seu banco de dados no arquivo .env.
</p>

<h4>Gere a Chave de Aplicação:</h4>
    <pre><code>php artisan key:generate</code></pre>

<h4>Execute as Migrações do Banco de Dados e ativar os links:</h4>
    <pre><code>php artisan migrate</code></pre>
    <pre><code>php artisan db:seed</code></pre>
    <pre><code>php artisan storage:link</code></pre>
    
<h4>Inicie o Servidor Local:</h4>
<pre><code>php artisan serve</code></pre>

<h4>Acesse o Sistema:</h4>
<p>
    Abra seu navegador e visite "http://localhost:8000".
</p>

<p>
    Agora, você deverá ter o projeto Petito rodando localmente em seu ambiente de desenvolvimento.
</p>
