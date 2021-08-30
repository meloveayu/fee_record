<?php


class MysqliApi extends mysqli
{
    //增删改查操作，表名，还有参数,第一个group放参数兼放筛选条件，第二个group放筛选条件
    public function createQuery($option,$tbname,$group,$group2 = array())
    {
        switch ($option)
        {
            case "INSERT":
                $keygroup = array_keys($group);
                $valgroup = array_values($group);
                $keystr = "";
                $valstr = "";
                for ($i = 0;$i < count($group) - 1;$i++)
                {
                    $keystr = $keystr . $keygroup[$i] . ",";
                    $valstr = $valstr . "'" . $valgroup[$i]. "',";
                }
                $keystr = $keystr . $keygroup[count($group) - 1];
                $valstr = $valstr . "'" . $valgroup[count($group) - 1] . "'";
                $sql = "INSERT INTO $tbname ($keystr) VALUES ($valstr)";
                $this->query($sql);
                break;
            case "SELECT":
                $columngroup = $group;
                $wkeygroup = array_keys($group2);
                $wvalgroup = array_values($group2);
                $columnstr = "";
                $wstr = "";
                for ($i = 0;$i < count($group) - 1;$i++)
                {
                    $columnstr = $columnstr . $columngroup[$i] . ",";
                }
                $columnstr = $columnstr . $columngroup[count($group) - 1];
                for ($j = 0;$j < count($group2) - 1;$j++)
                {
                    $wstr = $wstr . $wkeygroup[$i] . "='" . $wvalgroup[$i] . "' AND ";
                }
                $wstr = $wstr . $wkeygroup[count($group2) - 1] . "='" . $wvalgroup[count($group2) - 1] . "'";
                $sql = "SELECT $columnstr FROM $tbname WHERE $wstr";
                $this->query($sql);
                break;
            case "UPDATE":
                $ckeygroup = array_keys($group);
                $cvalgroup = array_values($group);
                $wkeygroup = array_keys($group2);
                $wvalgroup = array_values($group2);
                $columnstr = "";
                $wstr = "";
                for($i = 0;$i < count($group) - 1;$i++)
                {
                    $columnstr = $columnstr . $ckeygroup[$i] . "='" . $cvalgroup[$i] . "',";
                }
                $columnstr = $columnstr . $ckeygroup[count($group) - 1] . "='" . $cvalgroup[count($group2) - 1] . "'";
                for ($j = 0;$j < count($group2) - 1;$j++)
                {
                    $wstr = $wstr . $wkeygroup[$j] . "='" . $wvalgroup[$j] . "' AND ";
                }
                $wstr = $wstr . $wkeygroup[count($group2) - 1] . "='" . $wvalgroup[count($group2) - 1] . "'";
                $sql = "UPDATE $tbname SET $columnstr WHERE $wstr";
                $this->query($sql);
                break;
            case "DELETE":
                $wkeygroup = array_keys(group);
                $wvalgroup = array_values($group);
                $wstr = "";
                for ($i = 0;$i < count($group) - 1;$i++)
                {
                    $wstr = $wstr . $wkeygroup[$i] . "='" . $wvalgroup[$i] . "' AND ";
                }
                $wstr = $wstr . $wkeygroup[count($group2) - 1] . "='" .$wvalgroup[count($group2) - 1] . "'";
                $sql = "DELETE FROM $tbname WHERE $wstr";
                $this->query($sql);
                break;
        }
    }

}