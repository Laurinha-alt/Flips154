//Passo a passo para a captura do Flip 154
//1-login: assinatura@fabricadeideias.com
// senha: F@brica159753
//2-URL base: https://www.pressreader.com/brazil/folha-de-londrina/20240826/page/1
//3-Mudar a data e a pagina
//4-criar uma diretorio pra colocar os flips 
//5-Fazer download das paginas e paginar no formato '1.jpg...'

<?php
    $baseUrl='https://www.pressreader.com/brazil/folha-de-londrina/20240826/page/1';
    $newDate='20240827';
    $diretorio='flips154';

if(!is_dir($diretorio)) {
    mkdir($diretorio, 0777, true);}

for ($page = 1; $page <= 30; $page++) {
        echo "O número é: $page <br>";//depois tentar com do...while 


    $url= preg_replace("/\d{8}/", $newDate, $baseUrl);
    $url= preg_replace("/page\/\d+/", "page/" . $page, $url);
    //até aqui serveria no php 0
    $filename= $diretorio . '/' . $page . '.jpg';
    $image= file_get_contents($url);

if ($image !== false) {
    file_put_contents($filename, $image);
    echo "Flip $page baixado e salvao como $filename\n";
} else {
    echo "Erro ao baixar o Flip $page\n";
}
}
?>