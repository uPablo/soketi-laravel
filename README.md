![image](https://github.com/user-attachments/assets/0b1a733d-ab02-4474-ab6c-ec893441e6fb)


# Sistema de Chat em Tempo Real

Este projeto é um sistema de chat em tempo real entre usuários e lojas para resolver possívels problemas com pedidos.

## Requisitos

-   PHP 8.0+
-   Composer
-   Laravel 10
-   Laravel Sail
-   Node.js e npm

## Instalação

### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/uPablo/soketi-laravel.git
cd soketi-laravel
```

### Passo 2: Instalar Dependências do PHP

```bash
composer install
```

### Passo 3: Configurar o Ambiente

Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente necessárias:

```bash
cp .env.example .env
php artisan key:generate
```

### Passo 4: Iniciar o Ambiente de Desenvolvimento

Inicie o ambiente de desenvolvimento do Sail:

```bash
./vendor/bin/sail up -d
```

### Passo 5: Executar as Migrations e Seeders

```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

### Passo 6: Instalar Dependências do Node.js

```bash
npm install
npm run build
```

## Funcionalidade de Chat

### Testar no Postman

Para efetuar os testes, é necessário estar logado e adicionar o token de autenticação nas requisições no Postman.

1. **Obter Token**:

    - Faça uma requisição POST para `http://localhost/api/login` com as seguintes credenciais e obtenha o token de autenticação:
        ```json
        {
            "email": "user@example.com",
            "password": "password"
        }
        ```

2. **Adicionar Token**:

    - Adicione o token de autenticação nas requisições GET e POST para `conversations` como um cabeçalho:
        ```http
        Authorization: Bearer {YourToken}
        ```

3. **Listar Conversas**:

    - **Método**: GET
    - **URL**: `http://localhost/api/conversations/{orderId}`
    - **Headers**: Authorization: Bearer {YourToken}

4. **Enviar Mensagem**:

    - **Método**: POST
    - **URL**: `http://localhost/api/conversations/{conversationId}/messages`
    - **Headers**: Content-Type: application/json, Authorization: Bearer {YourToken}
    - **Body** (JSON):
        ```json
        {
            "message": "Olá, como posso ajudar?"
        }
        ```

5. **Conectar ao WebSocket no Postman**:
    - Abra o Postman e vá para a aba de **WebSocket Request**.
    - Insira a URL do servidor WebSocket:
        ```
        ws://localhost:6001/app/app-key?protocol=7&client=js&version=4.4.0&flash=false
        ```
    - Clique em **Connect**.
    - Após a conexão, envie uma mensagem de assinatura para se inscrever no canal da conversa:
        ```json
        {
            "event": "pusher:subscribe",
            "data": {
                "channel": "conversation.{conversationId}"
            }
        }
        ```
    - **Substitua** `{conversationId}` pelo ID da conversa que você deseja monitorar.
    - Com a inscrição no canal ativa, qualquer mensagem enviada para essa conversa será exibida no painel de WebSocket do Postman.

## Licença

Este projeto está licenciado sob os termos da licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
