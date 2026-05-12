<?php
$dir = new RecursiveDirectoryIterator('d:/xampp/htdocs/School-Management-System/resources/views');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$replacements = [
    'data-toggle=' => 'data-bs-toggle=',
    'data-target=' => 'data-bs-target=',
    'data-dismiss=' => 'data-bs-dismiss=',
    'float-left' => 'float-start',
    'float-right' => 'float-end',
    'pull-right' => 'float-end',
    'pull-left' => 'float-start',
    '"fa fa-' => '"fa-solid fa-',
    ' fa fa-' => ' fa-solid fa-',
    '"fas fa-' => '"fa-solid fa-',
    ' fas fa-' => ' fa-solid fa-',
    '"far fa-' => '"fa-regular fa-',
    ' far fa-' => ' fa-regular fa-',
];

foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $newContent = strtr($content, $replacements);
    if ($content !== $newContent) {
        file_put_contents($path, $newContent);
        echo "Updated $path\n";
    }
}
echo "Done views.\n";
