<?php
declare(strict_types=1);

class ListenList {
    public array $music = [];

    public function addMusic(Music $music): void {
        $this->music[] = $music;
    }
}
?>
