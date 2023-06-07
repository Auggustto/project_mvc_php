<?php

require_once 'app/models/lib/database/models.php';

class TableDinamic
{
    public static function SelectAll()
    {
        $ret = new user_all();
        $data = $ret->search_values();

        if (count($data) > 0) {
            for ($i = 0; $i < count($data); $i++) {
                //echo "<tr>";
                foreach ($data[$i] as $key => $value) {
                    if ($key != "id") {
                        //echo "<td>" . $value . "</td>";
                        return $value;
                    }
                }
            }
        }
    }
}
