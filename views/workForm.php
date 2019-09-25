<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Article</title>
    <link rel="stylesheet" href="../css/workForm.css">
  </head>
  <body>
    <form action="../controllers/addWork.php" method="post" class="workForm">
      <input class="title" type="text" name="title" value="" placeholder="titre*" required><br>
      <textarea class="commentary" name="commentary" value="" placeholder="commentaire*" required></textarea><br>
      <input class="file" type="file" name="img" value=""><br>
      <input class="articleBtn"  name="articleBtn" type="submit" value="Ajouter l'article">
    </form>
  </body>
</html>
