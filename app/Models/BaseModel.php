<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaseModel extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Select multiple rows as an array.
     */
    public function select_array(
        $table,
        $columns = ['*'],
        $where = [],
        $groupBy = null,
        $orderBy = null,
        $offset = null,
        $limit = null
    ) {
        $query = DB::table($table)->select($columns);

        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }

        if ($groupBy) {
            $query->groupBy($groupBy);
        }

        if ($orderBy) {
            foreach ((array) $orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query->get()->toArray();
    }
    public function select_array_fl_db(
        $dbName = 'mysql',
        $table,
        $columns = ['*'],
        $where = [],
        $groupBy = null,
        $orderBy = null,
        $offset = null,
        $limit = null
    ) {
        $query = DB::connection($dbName)->table($table)->select($columns);

        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }

        if ($groupBy) {
            $query->groupBy($groupBy);
        }

        if ($orderBy) {
            foreach ((array) $orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query->get()->toArray();
    }

    /**
     * Select a single row as an array.
     */
    public function select_array_row(
        $table,
        $columns = ['*'],
        $where = [],
        $groupBy = null,
        $orderBy = null,
        $offset = null
    ) {
        $query = DB::table($table)->select($columns);

        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }

        if ($groupBy) {
            $query->groupBy($groupBy);
        }

        if ($orderBy) {
            foreach ((array) $orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        return $query->first();
    }

    public function select_array_row_fl_db(
        $dbName = 'default',
        $table,
        $columns = ['*'],
        $where = [],
        $groupBy = null,
        $orderBy = null,
        $offset = null
    ) {
        $query = DB::connection($dbName)->table($table)->select($columns);

        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }

        if ($groupBy) {
            $query->groupBy($groupBy);
        }

        if ($orderBy) {
            foreach ((array) $orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        return $query->first();
    }
    // query base
    public function QueryItemIn12Month($dbName = 'mysql', $table)
    {
        $statement = "
            SELECT months.month, COUNT($table.created_at) AS product_count
            FROM (
                SELECT 1 AS month
                UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION
                SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
            ) AS months
            LEFT JOIN $table ON MONTH(FROM_UNIXTIME($table.created_at)) = months.month
            GROUP BY months.month;
        ";

        $results = DB::connection($dbName)->select($statement);

        // Convert stdClass objects to associative arrays
        $resultsArray = json_decode(json_encode($results), true);

        return $resultsArray;
    }
}