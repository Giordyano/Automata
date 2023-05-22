<!DOCTYPE html>
<html>

<head>
    <title>Automata Assignment</title>
</head>

<body>
    <style>
        body {
            display: grid;
            height: 100%;
            width: 100%;
            background: #A0522D;
        }

        .judul {
            color: white;
            font-family: Helvetica;
        }
    </style>
    <div class="judul">
        <h1 style="text-align:center; margin-left: auto; margin-right: auto;">AUTOMATA - accepting language
            (a + b)a a*</h1>
    </div>

    <br>
    <form method="POST" action="">
        <div style="text-align:center; margin-left: auto; margin-right: auto;">
            <label for="word" style="color: white; font-family: Helvetica;">Please enter a word:</label>
            <input type="text" name="huruf" id="huruf" required>
            <button type="submit">Submit</button>
        </div>
    </form>

    <?php

// Define a function to check if word is accepted by NFA
function nfa($huruf)
{
    $StateAwal = ['q0']; // initial state
    $StateAkhir = ['q2']; // final state

    // NFA Transition table
    $Transisi = [
        'q0' => ['a' => ['q2'], 'b' => ['q1']], 
        'q1' => ['a' => ['q2']],
        'q2' => ['a' => ['q2']] 
    ];

    // Loop through each character in the word
    for ($i = 0; $i < strlen($huruf); $i++) {
        $input = $huruf[$i]; // Current character
        $StateSelanjutnya = []; // Next state

        // Loop through each of the current states
        foreach ($StateAwal as $state) {
            // Check if any of the transitions match the character input
            if (isset($Transisi[$state][$input])) {
                // Add the next state to the next set of states
                $StateSelanjutnya = array_merge($StateSelanjutnya, $Transisi[$state][$input]);
            }
        }

        // Update the current state with the next state
        $StateAwal = $StateSelanjutnya;
    }

    // Check if there is at least one current state that is the final state
    foreach ($StateAwal as $state) {
        if (in_array($state, $StateAkhir)) {
            return true; // word accepted
        }
    }

    return false; // Word not accepted
}

?>
    <br>
    <div style="font-family:Helvetica; color:white; text-align:center; margin-left: auto; margin-right: auto;">
        <?php
    // Check if there are input words sent from the form
    if (isset($_POST['huruf'])) {
    $inputHuruf = $_POST['huruf'];

    // Call the nfa function to check if word was received

    $isAccepted = nfa($inputHuruf);

    // Display the inspection result message

    if ($isAccepted) {
        echo "Word '$inputHuruf' Accepted";
    } else {
        echo "Word '$inputHuruf' Not Accepted";
    }
}
    ?>
    </div>
    <div style="font-family:Helvetica; color:white; text-align:center; margin-left: auto; margin-right: auto;">
        <p>
            Click Here!
        </p>
        <a href="https://github.com/Giordyano/Automata/blob/main/tugasautomata.php" target="_blank">This is my source code!</a>
    </div>
    <br>
</body>
</html>
</html>
