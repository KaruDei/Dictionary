<h1 class="page_title">Английский словарь</h1>

<form action="controllers/add.php" method="POST" class="add_block">
    <label for="word" class="add_block_label"><p>Слово:</p>
        <input id="word" type="text" name="english_word" class="add_block_input">
    </label>
    <label for="tranlate" class="add_block_label"><p>Перевод:</p>
        <input id="tranlate" type="text" name="english_tranlate" class="add_block_input" placeholder="перевод1, перевод2">
    </label>
    <input type="submit" name="add_english_word" class="add_block_sub" value="Добавить">
    
</form>

<?php
    echo $_SESSION['succsess'];
    echo $_SESSION['error'];
    unset($_SESSION['succsess']);
    unset($_SESSION['error']);
?>

<div class="words_block">

    <?php
        $str_out_words = "SELECT * FROM `english_words`";
        $run_out_words = mysqli_query($connect, $str_out_words);
        $num_out_words = mysqli_num_rows($run_out_words);

        echo "
            <div class='words_block_title'>
                <p>Слова:</p>
                <p>Всего: $num_out_words</p>
            </div>
            <div class='words_block_items'>
        ";
        
        while ($out_words = mysqli_fetch_array($run_out_words)) {
            echo "
                <div class='words_block_item'>
                    <p class='word'>$out_words[word]</p>
                    <div class='translate'>
                        <ul class='translate_list'>
            ";

            $words = explode(",", $out_words["translate"]);
            foreach ($words as $word) {
                // $word = trim(str_replace([" ", ",", "."], "", $word));
                echo "<li class='translate_item'>$word</li>";
            }

            echo "
                        </ul>
                    </div>
                </div>
            ";
        }
                

        echo "
            </div>
        ";
    ?>
    
</div>