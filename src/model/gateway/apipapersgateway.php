<?php

namespace src\model\gateway;

class ApiPapersGateway extends Gateway {

    public function __construct() {
        $this->setDatabase(DIS_DATABASE);
    }

    public function findAll()
    {
        $sql = <<<EOT
        SELECT p.paper_id, p.title, p.abstract, GROUP_CONCAT(a.first_name || ' ' || a.last_name) as authors, GROUP_CONCAT(distinct at.name) as awards
        FROM paper p
        INNER JOIN paper_author pa ON p.paper_id = pa.paper_id
        INNER JOIN author a ON pa.author_id=a.author_id
        INNER JOIN award aw ON p.paper_id=aw.paper_id 
        INNER JOIN award_type at ON aw.award_type_id=at.award_type_id
        GROUP BY p.paper_id
EOT;

        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findRandom()
    {
        $sql = <<<EOT
        SELECT p.paper_id, p.title, p.abstract, GROUP_CONCAT(a.first_name || ' ' || a.last_name) as authors, GROUP_CONCAT(distinct at.name) as awards
        FROM paper p
        INNER JOIN paper_author pa ON p.paper_id = pa.paper_id
        INNER JOIN author a ON pa.author_id=a.author_id
        LEFT JOIN award aw ON p.paper_id=aw.paper_id 
        LEFT JOIN award_type at ON aw.award_type_id=at.award_type_id
        GROUP BY p.paper_id
        ORDER BY random()
        LIMIT 1
EOT;

        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findById($id)
    {
        $sql = <<<EOT
        SELECT p.paper_id, p.title, p.abstract, GROUP_CONCAT(a.first_name || ' ' || a.last_name) as authors, GROUP_CONCAT(distinct at.name) as awards
        FROM paper p
        INNER JOIN paper_author pa ON p.paper_id = pa.paper_id
        INNER JOIN author a ON pa.author_id=a.author_id
        LEFT JOIN award aw ON p.paper_id=aw.paper_id 
        LEFT JOIN award_type at ON aw.award_type_id=at.award_type_id
        WHERE p.paper_id = :id
        GROUP BY p.paper_id
EOT;

        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findByAuthorId($authorid)
    {
        $sql = <<<EOT
        SELECT p.paper_id, p.title, p.abstract, GROUP_CONCAT(a.first_name || ' ' || a.last_name) as authors, GROUP_CONCAT(distinct at.name) as awards
        FROM paper p
        INNER JOIN paper_author pa ON p.paper_id = pa.paper_id
        INNER JOIN author a ON pa.author_id=a.author_id
        LEFT JOIN award aw ON p.paper_id=aw.paper_id 
        LEFT JOIN award_type at ON aw.award_type_id=at.award_type_id
        WHERE pa.author_id = :id
        GROUP BY p.paper_id
EOT;

        $params = ["id" => $authorid];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findByAward($award)
    {
        $sql = <<<EOT
        SELECT p.paper_id, p.title, p.abstract, GROUP_CONCAT(a.first_name || ' ' || a.last_name) as authors, GROUP_CONCAT(distinct at.name) as awards
        FROM paper p
        INNER JOIN paper_author pa ON p.paper_id = pa.paper_id
        INNER JOIN author a ON pa.author_id=a.author_id
        LEFT JOIN award aw ON p.paper_id=aw.paper_id 
        LEFT JOIN award_type at ON aw.award_type_id=at.award_type_id
        WHERE aw.award_type_id = :id
        GROUP BY p.paper_id
EOT;

        $sql = "SELECT * FROM paper p INNER JOIN award a ON p.paper_id = a.paper_id WHERE a.award_type_id = :id";
        $params = ["id" => $award];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}