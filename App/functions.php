<?php
// hjälpfunktioner helt enkelt

function renderView(string $view, array $data=[]){
    $loader = new \Twig\Loader\FilesystemLoader(ROOT.'/App/views');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load($view);
    echo $template->render($data);
}