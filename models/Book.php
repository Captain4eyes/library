<?php

/**
 * Class Book
 */
class Book extends BaseModel
{
    /** @var string name of the linked table */
    const TABLE_NAME =  __CLASS__;

    /** @var integer id of the book author */
    private $author_id;

    /** @var string book title */
    private $title;

    /** @var string book location (row, shelf, etc) */
    private $location;

    /**
     * Book constructor.
     * @param int $author_id
     * @param string $title
     * @param string $location
     */
    public function __construct(int $author_id, string $title, string $location)
    {
        $this->author_id = $author_id;
        $this->title = $title;
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author_id
     */
    public function setAuthorId(int $author_id)
    {
        $this->author_id = $author_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    /**
     * Save book
     * @return mixed|void
     */
    public function save()
    {
        Db::getConnection()->prepare(
            'INSERT INTO ' . self::TABLE_NAME . ' (title, location, author_id) 
                      VALUES (:title, :location, :author_id)'
        )->execute([
            ':title'     => $this->title,
            ':location'  => $this->location,
            ':author_id' => $this->author_id
        ]);
    }

    /**
     * Update book
     * @param $id
     * @param $book
     * @return mixed|void
     */
    public function update($id, $book)
    {
        Db::getConnection()->prepare(
            'UPDATE ' . self::TABLE_NAME . ' SET title = :title, location = :location, author_id = :author_id 
            WHERE id = :id'
        )->execute([
            ':title'     => $book->title,
            ':location'  => $book->location,
            ':author_id' => $book->author_id,
            ':id'        => $id
        ]);
    }

    /**
     * Delete book
     * @param $id
     * @return mixed|void
     */
    public static function delete($id)
    {
        Db::getConnection()->prepare(
            'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id'
        )->execute([
            ':id' => $id
        ]);
    }

    /**
     * Get all books with authors
     * @return array
     */
    public static function getAllBooksWithAuthors()
    {
        $result = Db::getConnection()->query(
            'SELECT b.id as id, b.title as title, a.first_name as fname, a.last_name as lname 
                      FROM ' . self::TABLE_NAME . ' as b, ' . Author::TABLE_NAME . ' as a 
                      WHERE b.author_id = a.id
                      ORDER BY fname, lname'
        );
        return $result->fetchAll();
    }
}