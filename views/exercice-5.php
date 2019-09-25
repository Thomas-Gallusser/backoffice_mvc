<?php

$conn = getBdd();
$stmt = $conn->prepare("SELECT country_code, count(country_code) AS qty
                        FROM table_2
                        GROUP BY country_code
                        ORDER BY qty ASC;");
$stmt->execute();

// Content to add
ob_start();

echo '<div class="h1 pt-5 pb-2 text-center">Affichage de la répartition par état et le nombre d\'enregistrement par état croissant</div>';

echo '<table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Country Code</th>
            <th scope="col">Quantity</th>

          </tr>
        </thead>
        <tbody>';

while ($row = $stmt->fetch()) {
    echo '<tr>
            <td>'.$row['country_code'].'</td>
            <td>'.$row['qty'].'</td>
          </tr>';
}

echo '</tbody></table>';

$content = ob_get_clean();

// Page creator
require('gabarit.php');
