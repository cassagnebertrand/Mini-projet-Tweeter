<?php

namespace iutnc\tweeterapp\model;

class Follow extends \Illuminate\Database\Eloquent\Model
{
    protected $table      = 'follow';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $follower = 'follower';
    protected $followee = 'followee';


    /*
    public function __get(string $nom_att) : mixed
    {
        if (property_exists($this, "{$nom_att}")) {
            return $this->$nom_att;


        } else {
            throw new Exception("invalid property : {$nom_att}");
        }
    }

    public function get() {
        $req = "SELECT * FROM {$this->table}";
        $stmt = $db->query($req);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    */


}