<h1 align="center">API - Ler Json</h1>

   <p>
   
   - [Sobre](#sobre)
   - [Preview](#preview)
   - [Funções](#funções)
   - [Colections](#colections)
   - [Desafios e Aprendizados no Caminho](#desafios-e-aprendizados-no-caminho)
   - [Como Usar](#como-usar)
   - [Como Contribuir](#como-contribuir)
   - [Licença](#licença)

   </p>

---

<h2 align="center">Sobre</h2>

Esse projeto foi desenvolvido com o objetivo de ler tabelas Json de benefiarios de um plano e retornar propostas para o mesmo;

---

<h2 align="center">Preview</h2>

<a href="https://ibb.co/Y8Ffws2">
   <h2 align="center">
      <img src="https://i.ibb.co/TRxPd3c/Whats-App-Image-2021-11-13-at-3-18-09-PM.jpg" alt="imagem preview" border="0">
   </h2>
</a>

---

<h2 align="center">Funções</h2>

   <p>
   
- Leitura de Json
- Exibição em tabela de propostas
- Criação de uma nova tabela apenas acrescentando novos beneficiarios
  
   </p>

---

<h2 align="center">Desafios e Aprendizados no Caminho</h2>

   <p>

   Durante a criação do projeto houve diversos desafios, como:
- Criação da logica para leitura do Json;
- Implementação de testes automatizados para aprimorar o projeto;
- Paginação de tabela de proposta, em caso de muitos beneficiarios;
    <br>
    <br>
   </p>

   ---
   <h2 align="center">Colections</h2>

   Tambem disponibilizei as [colections](https://github.com/AndreSnow/apiReadJson/tree/master/colections) para serem testadas as rotas no postman.

   <h2 align="center">Como Usar</h2>
   Aqui é possivel encontrar o passo a passo, desde configurações de ambiente até os passos da criação do projeto que foram seguidos.

   ---

   Antes, certifique-se de ter instalado a versão mais recente do Laravel, PHP, Composer e Vue em sua maquina:
   - Para isso, abra seu terminal e digite:
   
   ```
   $ php --version
   $ laravel
   $ composer
   $ npm v vue
   ```
   
   - Clone esse repositorio:
   ```
   $ git clone https://github.com/AndreSnow/apiReadJson.git
   ```

---

# BackEnd

> Laravel


> Vamos começar instalando as dependencias:
``` 
rm composer.lock
composer install
``` 
> Para acessar o servidor localhost
``` 
php artisan serve
``` 
Também pode ser necessario
``` 
php artisan migrate:fresh
ṕhp artisan passport:install
php artisan db:seed
``` 
Lembrando que para os comando acima é necessario criar estar com o banco de dados configurado, as informações do mesmo se encontram no arquivo .env


Para mais detalhes, consulte [guia](http://vuejs-templates.github.io/webpack/) e [documentação - vue-loader](http://vuejs.github.io/vue-loader).

---


# FrontEnd
> Vue.js


> Para iniciar o projeto, vamos começar instalando as dependencias
``` 
npm install
``` 
> Para acessar o servidor localhost:8080
``` 
npm run dev
``` 
> Caso queira fazer um build para produção
``` 
npm run build
``` 

Para mais detalhes, consulte [guia](http://vuejs-templates.github.io/webpack/) e [documentação - vue-loader](http://vuejs.github.io/vue-loader).

---

<h2 align="center">Como Contribuir</h2>

   - De um Fork no projeto. 

   - Crie uma nova branch com sua modificações:
   ```
   $ git checkout -b my-feature
   ```
   - Salve suas configurações e crie um commit dizendo com o que você contribuiu:
   ```
   $ git commit -m "feature: My new feature"
   ```

   - Nos envie:
   ```
   $ git push origin my-feature
   ```

---

<h2 align="center">Licença</h2>

<p align="center">
   Este repositório está sob licença MIT. Você pode acessar o arquivo <a href="https://github.com/AndreSnow/apiReadJson/blob/main/LICENSE">LICENSE</a> para mais detalhes. 😉
</p>

   ---

   Esse projeto foi desenvolvido por **[@André Neves](https://www.linkedin.com/in/andré-n-922181a6/)**
   
   Se isso te ajudou, dê uma ⭐, isso vai me ajudar também!
    😉

---

   <div align="center">

   [![Linkedin Badge](https://img.shields.io/badge/-Andre%20Neves-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/andr%C3%A9-n-922181a6/)](https://www.linkedin.com/in/andré-n-922181a6/)

   </div>
