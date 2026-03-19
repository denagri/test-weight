# laravel-docker-template
# 環境構築
Dockerビルド
```
git@github.com:denagri/test-weight.git
docker-compose up -d --build
```
laravel環境構築(上から順に構築していく)
```
docker-compose exec php bash
composer install
cp .env.example .env
```
.envの環境変数を変更
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```
# 使用技術(実行環境)
* php 8.1.34
* laravel 8.83.8
* mysql 11.8.3

# ER図
![alt text](<スクリーンショット 2026-03-19 202609.png>)

# URL
*管理画面
http://localhost/weight_logs
*体重登録
http://localhost/weight_logs/create
*体重検索
http://localhost/weight_logs/search
*体重詳細
http://localhost/weight_logs/{:weightLogId}
*体重更新
http://localhost/weight_logs/{:weightLogId}/update
*体重削除
http://localhost/weight_logs/{:weightLogId}/delete
*目標設定
http://localhost/weight_logs/goal_setting
*会員登録
http://localhost/register/step1
*初期目標体重登録
http://localhost/register/step2
*ログイン
http://localhost/login
*ログアウト
http://localhost/logout