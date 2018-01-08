INSERT文 
クラスメイトのニックネームで一人ひとつぶやきのデータが作成できるようなINSERT文を作りましょう
INSERT INTO `survey` (`nickname`,`email`,`content`)
VALUES("カナちゃん","kana@gmail.com","超絶いい人、面白い！"),
("ひろくん","hiro@gmail.com","口には出さないけど、実はかなりの努力家。"),
("なおくん","nao@gmail.com","引くほど酒豪。夜のプログラマーです。"),
("まるくん","youhei@gmail.com","プログラミングのスキルは抜群。バックレって言わないで。"),
("つのさん","tuno@gmail.com","腹筋バキバキ。寝ゲロ疑惑あり。"),
("りょうさん","ryou@gmail.com","ロンドンブーツたむらりょう。"),
("げんとくん","gento@gmail.com","ミニマリストげんと"),
("ザキヤマ","zakiyama@gmail.com","黒に近いグレー、な夜のプログラマーです。"),
("べっち","abe@gmail.com","北斎と彼女をこよなく愛する。"),
("しゅんた","syunta@gmail.com","3ヶ月フィリピン滞在済み。");

SERECT文
語尾に「です」とついているコメントを書いているデータを検索できるSERECT文を作りましょう
SELECT * FROM `survey` WHERE `content` LIKE "%です。";

UPDATE文
語尾に「です」とついているコメントを書いているデータを「セブ最高たぜ」に変更するUPDATE文にを作りましょう
UPDATE `survey` SET `content` = "セブ最高たぜ" WHERE `content` LIKE "%です。";

DELETE文
コメントが「セブ最高たぜ」に変えられてしまったデータをすべて削除するDELETE文を作りましょう
DELETE FROM `survey` WHERE `content` = "セブ最高たぜ";
