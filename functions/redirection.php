<?php
function redirection(string $url): string
{
    $displayHTML = "<script type='text/javascript'>";
    $displayHTML .= "document.location.href='$url'";
    $displayHTML .= "</script>";
    dump($displayHTML);
    return $displayHTML;
}