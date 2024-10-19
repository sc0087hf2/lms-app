### <a href="https://kateikyoshi-lms.com/">家庭教師 LMS (Learning Management System)</a>

## 概要

生徒の目標管理や学習進捗の管理、さらに授業や宿題として使えそうな教材を提供するアプリケーションです。

## 作成背景

「生徒の学習効果を高め、授業を円滑に進めるため」と「私自身のスキルのアウトプットのため」に作成しました。

**<details><summary>生徒のやるべきことを明確化し、見える化することで学習意欲を向上させる</summary>**
<br />
私が担当している生徒は、「勉強をする」という手段が目的化してしまい、本来の目標を見失うことがよくあります。このアプリケーションでは、生徒がやるべきことを明確にし、学習の目標を可視化することで、学習意欲を高めることを目指しています。

</details>

**<details><summary>Laravel の基礎理解を深める</summary>**
<br />
MVC モデルや CRUD 操作、リレーション、Eloquent ORM を用いたデータベース操作など、学習したことをアウトプットすることで知識やスキルの定着につながると考え作成しました。今後はこれらの技術を実務で活用していきたいと考えています。

</details>

## 各ユーザーの機能

各ユーザーの主な機能を下記に記しています。取り組みとは目標に対しての取り組みを指します。

#### 【生徒ユーザー】

-   振り返りコメントの投稿、編集
-   現在の取り組みの閲覧
-   過去の取り組みの閲覧
-   過去の授業の閲覧
-   教材の閲覧
    -   英単語の閲覧（検索のみ実装）
    -   英文法の閲覧（未実装）
    -   英文法のテスト（未実装）
    -   英長文の問題閲覧（未実装）
-   成績の閲覧

#### 【指導者ユーザー】

-   目標の作成、一覧、編集、削除
-   ToDo の作成、一覧、編集、削除
-   授業の作成、一覧、編集、削除
-   宿題の作成、一覧、編集、削除
-   成績の作成、一覧、編集、削除（未実装）
-   各生徒の現在の取り組みの閲覧
-   各生徒の過去の取り組みの閲覧
-   各生徒の過去の授業の閲覧

#### 【管理者ユーザーのみ】

-   ユーザーの作成
-   生徒ユーザーの一覧、編集、削除
-   指導者ユーザーの一覧、編集、削除
-   英単語の一覧、編集、削除（未実装）
-   英文法の一覧、編集、削除（未実装）
-   英文法クイズの一覧、編集、削除（未実装）
-   目標の一覧、削除（未実装）
-   ToDo の一覧、削除（未実装）
-   授業の一覧、削除（未実装）
-   宿題の一覧、削除（未実装）
-   成績の一覧、削除（未実装）

## バージョン情報

-   PHP 8.3.11
-   Laravel 11.25.0

## サイトアクセス

-   URL は<a href="https://kateikyoshi-lms.com/">こちら</a>
-   指導者ユーザーのログイン情報
    -   メールアドレス：teacher1@example.com　　パスワード : password123
    -   メールアドレス：teacher2@example.com　　パスワード : password123
-   生徒ユーザーのログイン情報
    -   メールアドレス：student1@example.com　　パスワード : password123
    -   メールアドレス：student2@example.com　　パスワード : password123
    -   メールアドレス：student3@example.com　　パスワード : password123
    -   メールアドレス：student4@example.com　　パスワード : password123
        <br />
        <br />
        サイト内で目標の作成やその他の書き込みは自由に行ってください。
