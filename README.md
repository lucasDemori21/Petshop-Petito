<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Petito - Sistema de Gestão para Pet Shop</title>
</head>

<body>

    <h1>Projeto Petito - Sistema de Gestão para Pet Shop</h1>

    <p><strong>Descrição do Projeto:</strong> O projeto Petito é um sistema de gestão web e móvel desenvolvido para atender às necessidades específicas de um Pet Shop chamado "Petito". Este sistema oferece funcionalidades como vendas online, agendamento de serviços, gerenciamento de estoque e um painel de controle personalizado para os funcionários. Ele é construído utilizando tecnologias modernas como PHP 8 com o framework Laravel, HTML5, CSS3, JavaScript, Bootstrap e MySQL para o banco de dados.</p>

    <p><strong>Motivação para Aprimorar Conhecimentos no Laravel:</strong> A escolha do framework Laravel para este projeto visa aprimorar os conhecimentos em desenvolvimento web, especialmente no contexto de PHP. Laravel é conhecido por sua elegância, simplicidade e eficiência, proporcionando uma experiência de desenvolvimento ágil e estruturada. Ao trabalhar com o Laravel, você terá a oportunidade de explorar práticas modernas de desenvolvimento, arquitetura MVC e a vasta gama de ferramentas que o framework oferece.</p>

    <p><strong>Tecnologias Utilizadas:</strong></p>
    <ul>
        <li>PHP 8: Linguagem de programação principal.</li>
        <li>Laravel: Framework PHP para o desenvolvimento web.</li>
        <li>HTML5, CSS3, JavaScript: Tecnologias fundamentais para a construção da interface do usuário.</li>
        <li>Bootstrap: Framework CSS para design responsivo e amigável.</li>
        <li>MySQL: Sistema de gerenciamento de banco de dados relacional.</li>
    </ul>

    <p><strong>Como Iniciar o Projeto:</strong> Siga os passos abaixo para instalar e inicializar o projeto localmente:</p>

    <p><strong>Pré-requisitos:</strong></p>
    <ul>
        <li>Certifique-se de ter o PHP 8 instalado em sua máquina.</li>
        <li>Instale o Composer, uma ferramenta para gerenciar as dependências do PHP.</li>
    </ul>

    <p><strong>Passo a Passo:</strong></p>
    <ol>
        <li><strong>Clone o Repositório:</strong></li>
        <pre><code>git clone https://github.com/seu-usuario/petito.git</code></pre>

        <li><strong>Instale as Dependências:</strong></li>
        <pre><code>cd petito
composer install</code></pre>

        <li><strong>Configure o Ambiente:</strong></li>
        <ul>
            <li>Copie o arquivo <code>.env.example</code> para um novo arquivo chamado <code>.env</code>.</li>
            <li>Configure seu banco de dados no arquivo <code>.env</code>.</li>
        </ul>

        <li><strong>Gere a Chave de Aplicação:</strong></li>
        <pre><code>php artisan key:generate</code></pre>

        <li><strong>Execute as Migrações do Banco de Dados:</strong></li>
        <pre><code>php artisan migrate</code></pre>

        <li><strong>Inicie o Servidor Local:</strong></li>
        <pre><code>php artisan serve</code></pre>

        <li><strong>Acesse o Sistema:</strong></li>
        <p>Abra seu navegador e visite <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>.</p>
    </ol>

    <p><strong>Observação:</strong> Este é um guia básico. Certifique-se de consultar a documentação oficial do Laravel para obter informações mais detalhadas sobre configurações e recursos avançados.</p>

</body>

</html>
