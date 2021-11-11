<?php

namespace App\File;

class Upload
{
    private string $name;

    private string $extension;

    private string $type;

    private string $tmpName;

    private int $error;

    private int $size;

    private int $duplicates = 0;
    
    public function __construct(array $file)
    {
        $this->type = $file['type'];
        $this->size = $file['size'];
        $this->error = $file['error'];
        $this->tmpName = $file['tmp_name'];

        $info = pathinfo($file['name']);
        $this->name = $info['filename'];
        $this->extension = $info['extension'];
        
    }

    public function getBasename()
    {
        $extension = strlen($this->extension) ? '.'.$this->extension : '';

        $duplicates = $this->duplicates > 0 ? '-'.$this->duplicates : '';

        return $this->name.$duplicates.$extension;

    }

    private function getPossibleBasename(string $dir, bool $overwrite)
    {
        if ($overwrite) return $this->getBasename();

        $basename = $this->getBasename();

        if (!file_exists($dir.'/'.$basename)) {
            return $basename;
        }

        $this->duplicates++;

        return $this->getPossibleBasename($dir,$overwrite);
    }

    public function upload(string $dir, bool $overwrite = true)
    {   
        if ($this->error != 0) return false;

        $path = $dir.'/'.$this->getPossibleBasename($dir,$overwrite);

        
        return move_uploaded_file($this->tmpName,$path);
    }

    
}

// echo "<pre>";
        // print_r($path);
        // echo "</pre>"; exit;