<?php
$dir = new RecursiveDirectoryIterator('d:/xampp/htdocs/School-Management-System/resources/views');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$replacements = [
    'data-bs-toggle=' => 'data-toggle=',
    'data-bs-target=' => 'data-target=',
    'data-bs-dismiss=' => 'data-dismiss=',
    'float-start' => 'float-left', // Wait, originally was float-left and pull-left. Let's just restore it to float-left.
    'float-end' => 'float-right', // Originally was float-right and pull-right. I'll restore to float-right.
    '"fa-solid fa-' => '"fa fa-',
    ' fa-solid fa-' => ' fa fa-',
    '"fa-regular fa-' => '"far fa-',
    ' fa-regular fa-' => ' far fa-',
    '"fa-brands fa-' => '"fab fa-',
    ' fa-brands fa-' => ' fab fa-',
];

foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $newContent = strtr($content, $replacements);
    if ($content !== $newContent) {
        file_put_contents($path, $newContent);
        echo "Reverted $path\n";
    }
}
echo "Done reverting views.\n";
