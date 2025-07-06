# SysAgenda

Um sistema web robusto e intuitivo para a gestão centralizada de usuários, seus endereços e telefones. Desenvolvido com Laravel, oferece uma interface limpa e funcionalidades essenciais para manter suas informações de contato organizadas e acessíveis.

🚀 Funcionalidades
Autenticação de Usuários: Sistema de login e logout seguro para acesso restrito.

Gestão de Usuários (CRUD): Crie, visualize, edite e exclua usuários. Cada usuário possui nome, sexo e data de nascimento.

Cálculo Automático de Idade: A idade do usuário é calculada dinamicamente a partir da data de nascimento.

Gestão de Endereços: Associe múltiplos endereços a cada usuário, com campos para CEP, logradouro, número, complemento e cidade. É possível definir um endereço como principal.

Gestão de Telefones: Adicione múltiplos números de telefone a cada usuário, indicando qual é o principal.

Navegação Simplificada: Rotas bem definidas e views interligadas para uma experiência de usuário fluida.

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8.x
* **Framework:** Laravel 11.x
* **Banco de Dados:** MySQL (ou outro SGBD compatível com Laravel)
* **Frontend:** Blade Templates, HTML, CSS (Tailwind CSS com `@tailwindcss/vite`).

## ⚙️ Instalação e Configuração

Siga os passos abaixo para configurar e rodar o projeto em seu ambiente local:

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/](https://github.com/)[SeuUsuario]/[NomeDoRepositorio].git
    cd [NomeDoRepositorio]
    ```

2.  **Instale as dependências do Composer:**
    ```bash
    composer install
    ```

3.  **Copie o arquivo de ambiente e configure-o:**
    ```bash
    cp .env.example .env
    ```
    Abra o arquivo `.env` e configure suas credenciais de banco de dados:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seu_banco_de_dados
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```

4.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

5.  **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
    ```

6.  **Instale as dependências do Node.js e compile os assets (incluindo Tailwind CSS):**
    ```bash
    npm install
    npm run dev # Durante o desenvolvimento (observa mudanças)
    # ou
    npm run build # Para otimizar os assets para produção
    ```

7.  **Inicie o servidor de desenvolvimento do Laravel:**
    ```bash
    php artisan serve
    ```

8.  **Acesse a aplicação no navegador:**
    Geralmente em `http://127.0.0.1:8000`.
