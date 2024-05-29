<?php
$mode = "input";
if (isset($_POST["back"]) && $_POST["back"]) {
    // 何もしない
} else if (isset($_POST["confirm"]) && $_POST["confirm"]) {
    $mode = "confirm";
} else if (isset($_POST["send"]) && $_POST["send"]) {
    $mode = "send";
}
