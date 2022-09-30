<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PS5_Games_To_platinum</title>
</head>

<body>
    <h1>
        <?php
        echo 'Welcome To Your List Of PS5 Games'
        ?>
    </h1>
    <h2>
        <?php
        echo 'Enjoy Completing These Amazing Games!'
        ?>
    </h2>
    <p>
        <?php
        $gameslibrary = json_decode(file_get_contents('games.json'), true);

        $completedGames = array_filter($gameslibrary, function ($game) {
            return $game["completion_percentage"] === "100%";
        });

        $uncompletedGames = array_filter($gameslibrary, function ($game) {
            return $game["completion_percentage"] !== "100%";
        });
        ?>
    <table>
        <thead>
            <th>
                Game Name
            </th>
            <th>
                Completion Status
            </th>
        </thead>
        <tbody>
            <?php
            foreach ($uncompletedGames as $game) {
            ?>
                <tr>
                    <td>
                        <?= $game["name"]; ?>
                    </td>
                    <td>
                        <?= $game["completion_percentage"]; ?>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    </p>
    <h3>
        <?php
        echo 'Completed Games:'
        ?>
    </h3>
    <p>
    <ul>
        <?php
        foreach ($completedGames as $game) { ?>
            <li> <?php echo $game["name"]; ?> </li>
        <?php } ?>
    </ul>

    </p>
</body>

</html>