

# Sistema de Solicitação de Coleta - Ecoponto

## 📌 Sobre o Projeto
O **Sistema de Solicitação de Coleta - Ecoponto** é uma solução web desenvolvida para que os cidadãos de Praia Grande possam solicitar a coleta de resíduos online. A plataforma permite o agendamento de coletas, consulta de resíduos aceitos e integração com a gestão dos Ecopontos da cidade.

## 🎯 Funcionalidades
- **Solicitação de coleta**: Agendamento de coleta de resíduos pelos usuários.
- **Consulta de resíduos aceitos**: Exibição da lista de materiais permitidos.
- **Integração com Ecopontos**: Conexão com a gestão dos pontos de coleta.
- **Interface responsiva**: Design adaptado para dispositivos móveis e desktops.

## 🛠 Tecnologias Utilizadas
- **Front-end**: HTML, Bootstrap, JavaScript
- **Back-end**: PHP
- **Banco de Dados**: phpMyAdmin (MySQL)

## 🚀 Como Executar o Projeto
1. **Clone este repositório**:
   ```sh
   git clone https://github.com/Frank1br/Projeto-EcoPonto.git
   ```
2. **Mova os arquivos para o diretório do servidor web** (ex: `htdocs` no XAMPP).
3. **Configure o banco de dados**:
   - Acesse phpMyAdmin.
   - Crie um banco de dados (ex: `ecoponto_db`).
   - Importe o arquivo `database.sql` localizado na raiz do projeto.
4. **Configure a conexão com o banco de dados no arquivo `config.php`**:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'ecoponto_db');
   ```
5. **Acesse no navegador**:
   ```sh
   http://localhost/sistema-solicitacao-coleta/
   ```

## 📂 Estrutura do Projeto
```
📁 sistema-solicitacao-coleta
│
├── 📁 assets/
│   ├── 📁 css/                  # Estilos personalizados
│   └── 📁 js/                   # Scripts JS, se necessário
│
├── 📁 config/
│   └── db_config.php           # Arquivo de conexão com o banco
│
├── 📁 views/
│   ├── layout.php              # Layout base com Bootstrap
│   ├── request_form.php        # Formulário de solicitação de coleta
│   └── request_list.php        # Lista de solicitações
│
├── 📄 index.php                # Página principal (formulário + layout)
├── 📄 submit_request.php       # Lógica de inserção de solicitação
├── 📄 get_requests.php         # Listagem de solicitações existentes
├── 📄 database.sql             # Script para criação do banco de dados
├── 📄 README.md                # Documentação do projeto

```
🔥 Melhorias Futuras

- Implementar autenticação de usuários.
- Adicionar histórico de solicitações.
- Permitir o cancelamento de coletas agendadas.
- Criar uma API para integração com aplicativos móveis.

Melhorar o painel administrativo.

## 📜 Licença
Este projeto está sob a licença **MIT**. Fique à vontade para usá-lo e modificá-lo! 🚀

---

💡 **Dúvidas ou sugestões?** Contribua ou entre em contato! 🌱

