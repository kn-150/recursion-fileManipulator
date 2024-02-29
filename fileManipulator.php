<?php

// 引数の入力が正しいかどうかをチェックするバリデータ
if($argv < 4) {
  echo "入力が正しくありません。正しい入力方法は、" . "\n";
  echo "php fileManipulator.php <command> <arguments...> " . "\n";
  exit(1);
}

// 入力されたコマンドを取得する
$command = $argv[1];

// コマンドに応じて条件分岐する
switch($command) {
  case "reverse":
    if($argc !== 4) {
      echo "入力が正しくありません。正しい入力方法は、" . "\n";
      echo "php fileManipulator.php reverse <inputPath> <outputPath>" . "\n";
      exit(1);
    }
    reverseFile($argv[2], $argv[3]);
    break;
  case "copy":
    if($argc !== 4) {
      echo "入力が正しくありません。正しい入力方法は、" . "\n";
      echo "php fileManipulator.php copy <inputPath> <outputPath>" . "\n";
      exit(1);
    }
    copyFile($argv[2], $argv[3]);
    break;
  case "duplicate-contents":
    if($argc !== 4) {
      echo "入力が正しくありません。正しい入力方法は、" . "\n";
      echo "php fileManipulator.php duplicate-contents <inputPath> <intNumber>" . "\n";
      exit(1);
    }
    duplicateContents($argv[2], $argv[3]);
    break;
  case "replace-string":
    if($argc !== 5) {
      echo "入力が正しくありません。正しい入力方法は、" . "\n";
      echo "php fileManipulator.php replace-string <inputPath> <needle> <newString>" . "\n";
      exit(1);
    }
    replaceString($argv[2], $argv[3], $argv[4]);
    break;
  default:
    echo "入力が正しくありません。正しい入力方法は、" . "\n";
    echo "php fileManipulator.php <command> <arguments...> " . "\n";
    exit(1);
}


function reverseFile($inputPath, $outputPath) {
  $contents = file_get_contents($inputPath);
  $revContents = strrev($contents);
  file_put_contents($outputPath, $revContents);
  echo "文字を逆順にして別ファイルに出力しました！.\n";
}

function copyFile($inputPath, $outputPath) {
  $contents = file_get_contents($inputPath);
  file_put_contents($outputPath, $contents);
  echo "文字のコピーに成功しました！.\n";
}

function duplicateContents($inputPath, $n) {
  $contents = file_get_contents($inputPath);
  $newContents = $contents;
  for($i = 0; $i < $n; $i++) {
    $newContents .= $contents;
  }
  file_put_contents($inputPath, $newContents);
  echo "文字の複製に成功しました！.\n";
}

function replaceString($inputPath, $stringPos, $stringReplace) {
  $contents = file_get_contents($inputPath);
  $newContents = str_replace($stringPos, $stringReplace, $contents);
  file_put_contents($inputPath, $newContents);
  echo "文字の置換に成功しました！.\n";
}