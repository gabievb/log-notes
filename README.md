# 📝 Log Notes

O **Log Notes** é uma aplicação web para gerenciamento de tarefas e notas, desenvolvida com o framework **Laravel 12**. A plataforma permite que os usuários criem contas, façam login de forma segura e organizem sua rotina semanal através de um sistema interativo de anotações (Tasks e Task Items).

## ✨ Funcionalidades

- **Autenticação de Usuários:** Sistema completo com registro, login, logout e recuperação de senha.
- **Dashboard Personalizado:** Área restrita para usuários logados visualizarem suas notas.
- **Gerenciamento de Tarefas:** Criação, edição e exclusão de anotações principais.
- **Sub-tarefas (Task Items):** Inserção de itens dentro de cada anotação, permitindo marcação de conclusão (check/uncheck).
- **Interface Responsiva:** Design limpo e moderno utilizando Tailwind CSS e componentes Blade.

## 🚀 Tecnologias Utilizadas

- **Linguagem:** [PHP 8.2+](https://www.php.net/)
- **Framework Back-end:** [Laravel 12.x](https://laravel.com/)
- **Front-end:** [Blade](https://laravel.com/docs/blade), [Tailwind CSS](https://tailwindcss.com/) e Vanilla JS.
- **Bundler:** [Vite](https://vitejs.dev/)
- **Banco de Dados:** MySQL.
- **Ícones:** Pacote `blade-ui-kit` (Feather Icons, Google Material, etc.).

---

## 🛠️ Passo a Passo para Instalação e Execução Local

Siga os passos abaixo para rodar o projeto localmente em sua máquina. 

### Pré-requisitos
Certifique-se de ter instalado em sua máquina:
- PHP >= 8.2
- Composer
- Node.js e NPM
- Git

### 1. Clone o repositório

```
git clone https://github.com/gabievblog/log-notes.git
cd log-notes
cd notes-app
```

### 2. Instale as dependências do PHP (Back-end)

```
composer install
```

### 3. Instale as dependências do Node (Front-end)

```
npm install
```

### 4. Configuração do Ambiente (.env)
Crie o arquivo de variáveis de ambiente baseando-se no arquivo de exemplo:

```
cp .env.example .env
```

Gere a chave de segurança da aplicação:

```
php artisan key:generate
```

### 5. Banco de Dados e Migrations
Crie e popule o banco de dados com as tabelas e usuários iniciais:

```
php artisan migrate
php artisan db:seed
```

### 6. Cache dos Ícones (Muito Importante)
O projeto utiliza uma biblioteca extensa de ícones. Para garantir uma boa performance da aplicação, é extremamente importante gerar o cache dos ícones:

```
php artisan icons:cache
```

Obs: Se você adicionar novos ícones no futuro, precisará limpar e refazer o cache com php artisan `icons:clear` e depois `php artisan icons:cache`.

### 7. Inicie os Servidores
Para rodar a aplicação, você precisará de dois terminais abertos.

No Terminal 1 (inicia o servidor PHP do Laravel):

```
php artisan serve
```

No Terminal 2 (inicia o Vite para compilar o CSS/JS em tempo real):

```
npm run dev
```

Acesse a aplicação em seu navegador através do endereço: `http://localhost:8000`

---

## 🔐 Credenciais de Acesso Padrão
Caso tenha rodado o comando de `db:seed`, você pode acessar a aplicação com o usuário de testes:

E-mail: gabe@gmail.com

Senha: g12345

---

## 📁 Estrutura Principal do Projeto

`app/Http/Controllers/`: Contém a lógica de negócio (AuthController, TaskController, UserController).

`app/Models/`: Modelos do Eloquent (User, Task, TaskItem).

`database/migrations/`: Arquivos de criação das tabelas do banco de dados.

`resources/views/`: Interfaces da aplicação (Login, Dashboard, Componentes Modais e de Tarefas).

`routes/web.php`: Definição de todas as rotas web da aplicação.

