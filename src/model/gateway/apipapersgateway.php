<?php

namespace src\model\gateway;

class ApiPapersGateway extends Gateway {

    public function __construct() {
        $this->setDatabase(DIS_DATABASE);
    }

    public function findAll() //group_concat and group by paper_id
    {
        $sql = "SELECT p.*, a.*, at.name FROM paper p INNER JOIN paper_author pa ON p.paper_id = pa.paper_id INNER JOIN author a ON pa.author_id=a.author_id LEFT JOIN award aw ON p.paper_id=aw.paper_id INNER JOIN award_type at ON aw.award_type_id=at.award_type_id";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM paper WHERE paper_id = :id";
        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findByAuthorId($authorid)
    {
        $sql = "SELECT * FROM paper p INNER JOIN paper_author pa ON p.paper_id = pa.paper_id WHERE pa.author_id = :id";
        $params = ["id" => $authorid];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findByAward($award)
    {
        $sql = "SELECT * FROM paper p INNER JOIN award a ON p.paper_id = a.paper_id WHERE a.award_type_id = :id";
        $params = ["id" => $award];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}