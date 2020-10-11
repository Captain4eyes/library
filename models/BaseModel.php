<?php


/**
 * Class BaseModel
 */
abstract class BaseModel
{
    /**
     * Save table row
     * @return mixed
     */
    public abstract function save();

    /**
     * Update table row by id with data
     * @param $id
     * @param $object
     * @return mixed
     */
    public abstract function update($id, $object);

    /**
     * Delete table row by id
     * @param $id
     * @return mixed
     */
    public abstract static function delete($id);

    /**
     * Get table row data by id
     * @param $table
     * @param $id
     * @return array
     */
    public static function getRowDataById($table, $id)
    {
        $result = Db::getConnection()->query('SELECT * FROM ' . $table . ' WHERE id = ' . $id);
        $result->setFetchMode( PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    /**
     * Delete table row data by id
     * @param $table
     * @param $id
     * @return void
     */
    public static function deleteRowDataById($table, $id)
    {
        $result = Db::getConnection()->query('DELETE FROM ' . $table . ' WHERE id = ' . $id);
        $result->fetch();
    }
}