<h2>
    <?php
        switch($viewData['eredmeny']) {
            case "OK":
                echo "<p>Felhasználók listája:<p>";
                ?>
                <table>
                <tr>
                    <th></th><th>Családi név</th><th>Utónév</th><th>Belépési név</th><th>Jogosultság</th><th></th>
                </tr>
                <?php
                foreach($viewData['rows'] as $row) {
                    echo "<tr>";
                    foreach($row as $column) {
                        echo "<td>".$column."</td>";
                    }
                    ?>
                    <td>
                    <form action="<?= SITE_ROOT ?>torol" method="post">
                        <input type="hidden" name="rowid" value="<?= $row["id"] ?>">
                        <input type="submit" value="Törlés">
                    </form>
                    </td>
                    </tr>
                    <?php
                }
                echo "</table>";
                break;
            case "ERROR":
                echo "<p>".$viewData['uzenet']."</p>";
                break;
        }
    ?>
</h2>
