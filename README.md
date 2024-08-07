# アプリケーション名

・お問い合せ管理システム:ユーザーからのお問い合せ内容を管理するシステム
・ユーザー管理システム → ユーザー情報を管理するシステム

## 環境構築

1. リモートリポジトリを作成
2. ローカルリポジトリの作成
3. リモートリポジトリをローカルリポジトリに追加
4. (docker-compose.yml) の作成
5. Nginx の設定
6. PHP の設定
7. MySQL の設定
8. phpMyAdmin の設定
9. (docker-compose up -d --build)
10. (docker-compose exec php bash)
11. (composer create-project "laravel/laravel=8.\*" . --prefer-dist)
12. app.php の timezone を修正
13. .env ファイルの環境変数を変更
14. (php artisan migrate)
15. (php artisan db:seed)

## 使用技術 (実行環境)

・nginx:1.21.1
・php:7.4.9-fpm
・ mysql:8.0.26
・Laravel:8

## ER 図
src/public/img/ER.png

## URL

・開発環境: (http://localhost/)
・phpMyAdmin:(http://localhost:8080/)
