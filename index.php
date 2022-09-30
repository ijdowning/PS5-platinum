<?php
$gameslibrary = json_decode(file_get_contents('games.json'), true);

$completedGames = array_filter($gameslibrary, function ($game) {
    return $game["completion_percentage"] === "100%";
});

$uncompletedGames = array_filter($gameslibrary, function ($game) {
    return $game["completion_percentage"] !== "100%";
});
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PS5_Games_To_platinum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="max-w-7xl mx-auto">
<h1 class="text-3xl w-full text-center font-bold my-8">
    Welcome To Your List Of PS5 Games
</h1>
<h2 class="text-xl w-full text-center">
    Enjoy Completing These Amazing Games!
</h2>
<div>
    <table class="mt-6 min-w-full divide-y divide-gray-300 rounded-lg shadow overflow-hidden">
        <thead class="bg-gray-50">
        <th class="py-2">
            Game Name
        </th>
        <th class="py-2">
            Completion Status
        </th>
        </thead>
        <tbody>
        <?php
        foreach ($uncompletedGames as $key => $game) {
            ?>
            <tr>
                <td class="text-center py-1 <?= $key % 2 === 0 ? 'bg-gray-50' : 'bg-white'; ?>">
                    <?= $game["name"]; ?>
                </td>
                <td class="text-center py-1 <?= $key % 2 === 0 ? 'bg-gray-50' : 'bg-white'; ?>">
                    <?= $game["completion_percentage"]; ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<div class="mt-8">
    <h2 class="text-xl w-full text-center">
        Completed Games
    </h2>
    <ul class="mt-6 divide-y divide-gray-200">
        <?php
        foreach ($completedGames as $game) { ?>
            <li class="flex py-4 text-sm font-medium text-gray-900">
                <p class="w-full text-center"><?php echo $game["name"]; ?></p>
            </li>
        <?php } ?>
    </ul>
</div>
</body>

</html>