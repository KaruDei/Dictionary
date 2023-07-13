<?php
    require 'bd.php';

    $english_word = mysqli_real_escape_string($connect, htmlspecialchars($_POST['english_word']));
    $english_tranlate = mysqli_real_escape_string($connect, htmlspecialchars($_POST['english_tranlate']));
    $add_english_word = $_POST['add_english_word'];

    $japan_word = mysqli_real_escape_string($connect, htmlspecialchars($_POST['japan_word']));
    $japan_tranlate = mysqli_real_escape_string($connect, htmlspecialchars($_POST['japan_tranlate']));
    $add_japan_word = $_POST['add_japan_word'];


    if ($add_english_word) {
        if (!empty($english_word) && !empty($english_tranlate)) {
            $str_out_word = "SELECT * FROM `english_words` WHERE word = '$english_word'";
            $run_out_word = mysqli_query($connect, $str_out_word);
            $num_out_word = mysqli_num_rows($run_out_word);
            if ($num_out_word == 0) {
                $str_add_english_word = "INSERT INTO `english_words`(`word`, `translate`, `updated_at`, `created_at`) VALUES ('$english_word','$english_tranlate',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
                $run_add_english_word = mysqli_query($connect, $str_add_english_word);
                $_SESSION['succsess'] = "<p class='succsess'>Добавленно!</p>";
                header("Location: ../index.php");
            } else {
                $_SESSION['error'] = "<p class='error'>Такое слово уже есть!</p>";
                header("Location: ../index.php");
            }
        } else {
            $_SESSION['error'] = "<p class='error'>Заполните все поля!</p>";
            header("Location: ../index.php");
        }
    }

    if ($add_japan_word) {
        if (!empty($japan_word) && !empty($japan_tranlate)) {
            $str_out_word = "SELECT * FROM `japan_words` WHERE word = '$japan_word'";
            $run_out_word = mysqli_query($connect, $str_out_word);
            $num_out_word = mysqli_num_rows($run_out_word);
            if ($num_out_word == 0) {
                $str_add_japan_word = "INSERT INTO `japan_words`(`word`, `translate`, `updated_at`, `created_at`) VALUES ('$japan_word','$japan_tranlate',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
                $run_add_japan_word = mysqli_query($connect, $str_add_japan_word);
                $_SESSION['succsess'] = "<p class='succsess'>Добавленно!</p>";
                header("Location: ../japan_page.php");
            } else {
                $_SESSION['error'] = "<p class='error'>Такое слово уже есть!</p>";
                header("Location: ../japan_page.php");
            }
            
        } else {
            $_SESSION['error'] = "<p class='error'>Заполните все поля!</p>";
            header("Location: ../japan_page.php");
        }
    }


?>