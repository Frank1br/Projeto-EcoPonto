🌱 Sistema de Solicitação de Coleta – Ecoponto Praia Grande
📌 Descrição
Este projeto tem como objetivo desenvolver uma solução web para que os cidadãos de Praia Grande possam solicitar a coleta de resíduos online. A plataforma permitirá:
✅ Agendamento de coletas de resíduos.
✅ Consulta de informações sobre os tipos de resíduos aceitos.
✅ Integração com a gestão dos Ecopontos da cidade.

🚀 Tecnologias Utilizadas
Front-end:
HTML5
Bootstrap
JavaScript
Back-end:
PHP
Banco de Dados:
phpMyAdmin (MySQL)
Controle de Versão:
Git/GitHub
📂 Estrutura do Projeto
pgsql
Copiar
Editar
📂 sistema-coleta-ecoponto  
 ┣ 📂 frontend               # Código do front-end (HTML, CSS, JS)  
 ┣ 📂 backend                # Código do back-end (PHP)  
 ┣ 📂 database               # Scripts do banco de dados (MySQL)  
 ┣ 📂 docs                   # Documentação do projeto  
 ┣ 📜 .gitignore  
 ┣ 📜 README.md  
 ┗ 📜 LICENSE  
📌 Funcionalidades Previstas
 Cadastro de usuários
 Solicitação de coleta online
 Notificações sobre o status do pedido
 Integração com Ecopontos de Praia Grande
 Painel administrativo para gestão de solicitações
📌 Instalação e Configuração
Pré-requisitos:
Antes de rodar o projeto, você precisará ter instalado:
✅ XAMPP (ou outro servidor local com Apache, PHP e MySQL)
✅ Git

Passo a Passo para Rodar Localmente
Clone este repositório:

bash
Copiar
Editar
git clone https://github.com/seu-usuario/sistema-coleta-ecoponto.git
cd sistema-coleta-ecoponto
Coloque os arquivos na pasta do servidor local:

Se estiver usando XAMPP, mova os arquivos para htdocs/
Se estiver usando outro servidor, configure o diretório público corretamente
Configure o Banco de Dados:

Importe o arquivo SQL (database/coleta_ecoponto.sql) no phpMyAdmin
Configure as credenciais do banco no arquivo config.php
Inicie o servidor:

Se estiver no XAMPP, inicie Apache e MySQL
Acesse no navegador:

arduino
Copiar
Editar
http://localhost/sistema-coleta-ecoponto
🛠 Contribuição
Contribuições são bem-vindas! Para contribuir:

Fork este repositório
Crie uma branch (git checkout -b minha-feature)
Faça commit das mudanças (git commit -m 'Adiciona nova feature')
Faça push (git push origin minha-feature)
Abra um Pull Request
📄 Licença
Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais informações.

