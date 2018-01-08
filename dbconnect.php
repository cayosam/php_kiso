<?php
//開発環境用
//確認する際使用するので、消さずに置いておくこと。

//■step1 データベースに接続する
//データベース接続文字列
//mysql:接続するデータベースの種類
//dbname データベース名
//host パソコンのアドレス localhost このプログラムが存在している場所と同じサーバー
//注意！空欄入れないように記述するルール
//$dsn = 'mysql:dbname=phpkiso;host=localhost';

// $user データベース接続用のユーザー名
// $password データベース接続用ユーザーのパスワード(最初は空っぽに設定されている)
//$user = 'root';
//$password='';

//データベース接続オブジェクト
$dsn = 'mysql:dbname=phpkiso;host=localhost';

// $user データベース接続用のユーザー名
// $password データベース接続用ユーザーのパスワード(最初は空っぽに設定されている)
$user = 'root';
$password='';

//データベース接続オブジェクト
$dbh = new PDO($dsn, $user, $password);

//今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
$dbh->query('SET NAMES utf8');




//本番環境用
//■step1 データベースに接続する
//データベース接続文字列
//mysql:接続するデータベースの種類
//dbname データベース名
//host パソコンのアドレス localhost このプログラムが存在している場所と同じサーバー
//注意！空欄入れないように記述するルール
//$dsn = 'mysql:dbname=phpkiso;host=localhost';


// $user データベース接続用のユーザー名
// $password データベース接続用ユーザーのパスワード(最初は空っぽに設定されている)
//$user = 'root';
//$password='';

//データベース接続オブジェクト
//$dbh = new PDO($dsn, $user, $password);

//今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
//$dbh->query('SET NAMES utf8');




//lolipop
//$dsn = 'mysql:dbname=LAA0918711-phpkiso;host=mysql103.phy.lolipop.lan';

// $user データベース接続用のユーザー名
// $password データベース接続用ユーザーのパスワード(最初は空っぽに設定されている)
//下記はロリポップのユーザー名とパスワード
//$user = 'LAA0918711';
//$password='sunnyday0078';

//データベース接続オブジェクト
//$dbh = new PDO($dsn, $user, $password);

//今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
//$dbh->query('SET NAMES utf8');

?>