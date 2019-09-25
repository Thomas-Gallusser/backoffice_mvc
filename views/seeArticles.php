<?php ob_start(); ?>

<div class="h5 py-4 text-center font-weight-bold">Liste de tous les articles</div>

<table class="table table-striped border text-center">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Groupe</th>
      <th>Type</th>
      <th>Likes</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Titre test</td>
      <td>Groupe test</td>
      <td>Type test</td>
      <td>10</td>
      <td>
        <a href="index.php?backoffice=1&type=1&edit=1&id=ID_ARTICLE"><i class="fas fa-edit" title="Modifier"></i></a>
        <a href="deleteArticle.php?id=ID_ARTICLE" class="ml-2"><i class="fas fa-trash" title="Supprimer"></i></a>
      </td>
    </tr>
  </tbody>
</table>

<?php $content = ob_get_clean(); ?>
