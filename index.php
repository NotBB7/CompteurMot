<!DOCTYPE html>
<html>

<head>
    <title>Compteur de mots et de lettres</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Compteur de mots et de lettres</h1>

        <form method="POST">
            <div class="form-group">
                <label for="input">Entrez votre texte :</label>
                <input type="text" id="input" name="input" />
            </div>

            <div class="form-group">
                <button type="submit" name="countWords">Calculer le nombre de mots</button>
                <button type="submit" name="countLetters">Calculer le nombre de lettres</button>
            </div>
        </form>

        <?php

        class ToolsWorld
        {
            // Méthode pour compter le nombre de mots
            public static function countWords($input)
            {
                $inputWithoutNumbers = preg_replace('/[0-9]+/', '', $input); // Supprimer les chiffres de la chaîne d'entrée
                $wordCount = str_word_count($inputWithoutNumbers); // Compter les mots dans la chaîne
                return $wordCount;
            }

            // Méthode pour compter le nombre de lettres
            public static function countLetters($input)
            {
                $inputWithoutNumbersAndSpaces = preg_replace('/[0-9\s]+/', '', $input); // Supprimer les chiffres et les espaces de la chaîne d'entrée
                $letterCount = strlen($inputWithoutNumbersAndSpaces); // Compter le nombre de lettres dans la chaîne
                return $letterCount;
            }
        }



        if (isset($_POST['countWords'])) {
            $inputText = $_POST['input'];

            if (empty(trim($inputText))) {
                echo '<div class="result error">Veuillez entrer au moins un mot.</div>'; // Afficher un message d'erreur si aucun mot n'est saisi
            } else {
                $wordCount = ToolsWorld::countWords($inputText); // Appeler la méthode countWords pour obtenir le nombre de mots
                echo '<div class="result">Nombre de mots : ' . $wordCount . '</div>'; // Afficher le nombre de mots
            }
        }

        if (isset($_POST['countLetters'])) {
            $inputText = $_POST['input'];

            if (!preg_match('/[a-zA-Z]/', $inputText)) {
                echo '<div class="result error">Veuillez entrer uniquement des lettres.</div>'; // Afficher un message d'erreur si aucun caractère alphabétique n'est saisi
            } else {
                $letterCount = ToolsWorld::countLetters($inputText); // Appeler la méthode countLetters pour obtenir le nombre de lettres
                echo '<div class="result">Nombre de lettres : ' . $letterCount . '</div>'; // Afficher le nombre de lettres
            }
        }
        ?>
    </div>
</body>

</html>