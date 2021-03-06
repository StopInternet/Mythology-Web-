<?php
$fp = fopen('data.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fputcsv($fp, [$_POST['name'], $_POST['comment']]);
    rewind($fp);
}
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Mytology HomePage</title>
        <link href="css/keiziban.css" rel="stylesheet" type="text/css" media="all">    
      </head>
<body>
  <header>
      <h1>
          <a href="index.html"><img src="images/mythology.png" alt="Mythology"></a>
      </h1>
      <div id="header_contact">
          <a href="contact.html">
              <img src="images/gold_skull.png" alt="バグ報告先">不具合報告
          </a>
      </div>
      <nav id="global">
          <ul>
              <li class="current"><a href="index.html"><img src="images/icon.png">メインページ</a></li>
              <li><a href="more.html"><img src="images/icon.png">詳細</a></li>
              <li><a href="clear.html"><img src="images/icon.png">クリア者</a></li>
              <li><a href="update.html"><img src="images/icon.png">更新内容</a></li>
              <li><a href="keiziban.html"><img src="images/icon.png">掲示板</a></li>
          </ul>
      </nav>
  </header>

  <h1>掲示板</h1>
  <section>
      <h2>新規投稿</h2>
      <form action="" method="post">
          <div class="name"><span class="label">お名前:</span><input type="text" name="name" value=""></div>
          <div class="honbun"><span class="label">本文:</span><textarea name="comment" cols="30" rows="3" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea></div>
          <input type="submit" value="投稿">
      </form>
  </section>
  <section class="toukou">
      <h2>投稿一覧</h2>
      <?php if (!empty($rows)): ?>
      <ul>
  <?php foreach ($rows as $row): ?>
          <li><?=$row[1]?> (<?=$row[0]?>)</li>
  <?php endforeach; ?>
      </ul>
  <?php else: ?>
      <p>投稿はまだありません</p>
      <?php endif; ?>
  </section>

  <div id="wrapper">
      <div id="main">
          <ol>
              <li><a href="index.html">メインページ</a>
                <li>概要</li>
          </ol>
          </div>
        <aside id="sidebar">
            <section id="side_banner">
                <h2>
                    関連リンク
                </h2>
                <ul>
                    <li><a href="https://www.curseforge.com/minecraft/modpacks/mythology/files/3310246" target="_blank">
                        <img src="images/banner01.jpg" alt="Mythology Modpack"></a></li>
                </ul>
            </section>
            <section id="side_contact">
            </section>
        </aside>
      </div>
    <footer>
        <div id="footer">
            <ul>
                <li class="current"><a href="index.html"><img src="images/icon.png">メインページ</a></li>
                <li><a href="more.html"><img src="images/icon.png">詳細</a></li>
                <li><a href="clear.html"><img src="images/icon.png">クリア者</a></li>
                <li><a href="update.html"><img src="images/icon.png">更新内容</a></li>
                <li><a href="keiziban.html"><img src="images/icon.png">掲示板</a></li>
            </ul>
        </div>
        <small>&copy; 2021 Mythology</small>
    </footer>
</body>

</html>