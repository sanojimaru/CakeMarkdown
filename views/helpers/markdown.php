<?php
include_once APP.'plugins'.DS.'markdown'.DS.'vendors'.DS.'markdown.php';
class MarkdownHelper extends AppHelper {

  public function transform($text) {
    return Markdown($text);
  }

  public function transform_mobile($text) {
    // 必要になったものから追加していく
    $text = preg_replace("/\[(.+)\]\((.+)\)/", "<a href=\"$2\">$1</a>", $text);
    $text = preg_replace("/(\n|^)-\s*/", "", $text);
    $text = preg_replace("/(\n|^)(?!\s*:)(.+)(?=\n\s*:)/", "\n<font color=\"#FF9900\">【$2】</font><br/>\n", $text);
    $text = preg_replace("/(\n|^)\s*:\s*(.+)(?=\n|$)/", "$2<br/>\n", $text);
    $text = preg_replace("/\n\s{2,}/", "<br/>", $text);
    return $text;
  }
}
