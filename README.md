## 💻 Sobre o projeto

---

## ⚙️ Funcionalidades

- [x] Inclusão de receitas;
- [x] Exclusão de receitas;
- [x] Alteração de receitas;
- [x] Inclusão de ingrediente;
- [x] Exclusão de ingrediente;
- [x] Alteração de ingrediente;

---

## 🛠 Tecnologias

As seguintes tecnologias foram utilizadas no desenvolvimento da API Rest do projeto:

- **[PHP](https://www.php.net)**
- **[Laravel](https://laravel.com)**
- **[Composer](https://getcomposer.org)**
- **[Mysql](https://www.mysql.com)**
- **[Vue.js](https://vuejs.org)**
- **[Bootstrap](https://getbootstrap.com)**
- **[Node.js](https://nodejs.org/en)**

---

## ⏳ Inicialização

A preparação do ambiente consiste em instalar as tecnologias citadas anteriormente de acordo com seu sistema operacional.

Para obter os arquivos e executar o programa, podem ser executados os seguintes passos:
<br/>
- Crie uma pasta com o nome desejado;

- User um prompt compativel com git;

- Digite os comandos:

    ```bash
    git init

    git clone https://github.com/KauanCalheiro/Prova_Tecnica_STW.git
    ```

<br/>

## - Configurando API

- Com todos os pre requisitos devidamente instalados;

- Abra a pasta "API";

- Abra algum prompt com o local da pasta;

- Digite o comando no prompt da pasta;

    ```bash
    composer install
    ```

- Faça ajustes das configurações;
- Crie um arquivo .env e configure o banco de dados;

      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE={nome do seu banco de dados para a api}
      DB_USERNAME=root
      DB_PASSWORD=

- Após instalar as dependências necessárias e configurar o banco de dados execute no prompt da pasta;

    ```bash
    php artisan migrate
    
    php artisan db:seed
    ```

- Com isso feito ja temos um valor exemplo no nosso banco de dados para consumirmos na página;

    ```bash
    php artisan serve
    ```

- O servidor da api deve começar a rodar no seu computador agora;

<br/>

## - Configurando Página Web

- Com todos os pre requisitos devidamente instalados;

- Abra a pasta "web-application";

- Abra algum prompt com o local da pasta;

- Digite o comando no prompt da pasta;

    ```bash
    npm install
    ```

- Verifique no arquivo config.js se a url esta igual a do servidor da api;

    ```bash
    web-application\src\services\config.js
    ```

- Após isso execute com um prompt dentro da pasta;

    ```bash
    npm start
    ```
    
- Abra a aplicação pelo navegador;

## 🎨 Imagens

Algumas imagens da aplicação: <a href="https://drive.google.com/drive/folders/1JYL6MQ36Z93as9prPcrGqQxeVepB60c7?usp=drive_link">Google Drive</a>

---

## 📝 Licença

Projeto desenvolvido por [Kauan](https://kauancalheiro.github.io/Curriculo/index.html).

---
