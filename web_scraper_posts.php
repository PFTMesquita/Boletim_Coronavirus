<?php 


include('simple_html_dom.php');

$htmlPosts = file_get_html('http://www.mesquita.rj.gov.br/pmm/noticias');

foreach($posts = $htmlPosts->find('div[class="panel-grid-cell"]') as $article) {
    $item['titulo'] = $article->find('h2[class="entry-title"]',0)->plaintext;
    $item['img'] = $article->find('img[class="img-responsive"]',0)->plaintext;
    $item['texto'] = $article->find('div[class="post-content"]', 0)->plaintext;
    $articles[] = $item;
}

print_r($articles);

?>












    




