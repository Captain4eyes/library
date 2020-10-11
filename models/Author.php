<?php

/**
 * Class Authors
 */
class Author extends BaseModel
{
    /** @var string name of the linked table */
    const tableName =  __CLASS__ . 's';

    /** @var string author first name */
    private $first_name;

    /** @var string author last name */
    private $last_name;

    /**
     * Authors constructor.
     * @param string $first_name
     * @param string $last_name
     */
    public function __construct(string $first_name, string $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * Save author
     * @return mixed|void
     */
    public function save()
    {
        Db::getConnection()->prepare(
            'INSERT INTO ' . self::tableName . ' (first_name, last_name) 
                      VALUES (:first_name, :last_name)'
        )->execute([
            ':first_name' => $this->first_name,
            ':last_name'  => $this->last_name,
        ]);
    }

    /**
     * Update author
     * @param $id
     * @param $author
     * @return mixed|void
     */
    public function update($id, $author)
    {
        Db::getConnection()->prepare(
            'UPDATE ' . self::tableName . ' SET first_name = :first_name, last_name = :last_name 
            WHERE id = ' . $id
        )->execute([
            ':first_name' => $author->first_name,
            ':last_name'  => $author->last_name,
        ]);
    }

    /**
     * Delete author
     * @param $id
     * @return mixed|void
     */
    public static function delete($id)
    {
        Db::getConnection()->query(
            'DELETE FROM ' . Book::tableName . ' WHERE author_id = ' . $id
        );
        Db::getConnection()->query(
            'DELETE FROM ' . self::tableName . ' WHERE id = ' . $id
        );
    }

    /**
     * Get the sorted list of authors
     * @return array
     */
    public static function getAuthorsList()
    {
        $result = Db::getConnection()->query(
            'SELECT id, first_name as fname, last_name as lname
                      FROM ' . self::tableName . ' ORDER BY fname ASC, lname ASC'
        );
        return $result->fetchAll();
    }

    /**
     * Get a list of authors and the number of their books
     * @return mixed
     */
    public static function getAuthorsWithBookCount()
    {
        $result = Db::getConnection()->query(
            'SELECT a.id as id, a.first_name as fname, a.last_name as lname, IFNULL(COUNT(b.id), 0) as bookCount
                       FROM ' . self::tableName . ' as a 
                       LEFT JOIN ' . Book::tableName . ' as b ON b.author_id = a.id
                       GROUP BY id, fname, lname
                       ORDER BY fname, lname'
        );
        return $result->fetchAll();
    }
}