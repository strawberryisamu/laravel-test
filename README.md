### 以下を実行

dockercompose build 

docker compose up -d

### コンテナに入るため、以下のコマンドを実行

docker-compose exec app bash

### コンテナに入ったら、test配下に移動し以下を実行

composer install 

php artisan migrate

http://localhost/todolists にアクセス
