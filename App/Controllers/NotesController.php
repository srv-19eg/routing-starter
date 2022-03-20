<?php
namespace App\Controllers;
use App\Models\Database;
use Pecee\SimpleRouter\SimpleRouter;
use Twig\Node\Expression\Test\OddTest;

class NotesController
{

    public function index()
    {
        $sql = "SELECT * FROM notes";
        $db = new Database();
        $allNotes = $db->fetchAll($sql);
        $data = [
            "notes"=>$allNotes
        ];
        renderView('index.twig',$data);
        var_dump($data);
    }

    public function show(string $id)
    {
        echo __METHOD__ . " är inte klar ännu";
    }

    public function edit(string $id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM notes where id=?";
        $db = new Database();
        $note = $db->fetch($sql,[$id]);
        $data = [
          "note"=>$note
        ];
        renderView('edit.twig',$data);
    }

    public function update(string $id)
    {
        $id = intval($id);
        $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input(INPUT_POST,'body',FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = <<<EOD
            UPDATE notes
            SET title=?, body=?
            WHERE id=?
        EOD;
        $db = new Database();
        $db->query($sql,[$title, $body, $id]);
        SimpleRouter::response()->redirect("/$id",);
    }

    public function delete(string $id)
    {
        echo __METHOD__ . " är inte klar ännu";
    }

    public function store(string $id)
    {
        echo __METHOD__ . " är inte klar ännu";
    }

    public function new(string $id)
    {
        echo __METHOD__ . " är inte klar ännu";
    }

}