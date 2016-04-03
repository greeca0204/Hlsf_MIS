<?php
namespace Cms\Module;

Class NewsModule
{
    public function count($table_name)
    {
        $M = M($table_name);
        $res = $M->field("count(*) as co")->select();
        return $res[0]['co'];
    }

    public function get($table_name, $page, $limit)
    {
        $M = M($table_name);
        $res = $M->limit($limit)->page($page)->order('id desc')->select();
        return $res;
    }

    public function get_by_id($table_name, $id)
    {
        $M = M($table_name);
        $res = $M->where('id='.$id)->select();
        return $res[0];
    }

    public function add($table_name, $data)
    {
        $M = M($table_name);
        $data['time'] = time();
        $res = $M->data($data)->add();
        return $res;
    }

    public function delete($table_name, $id)
    {
        $M = M($table_name);
        $res = $M->where('id='.$id)->delete();
        return $res;
    }

    public function update($table_name, $id, $data)
    {
        $M = M($table_name);
        $res = $M->data($data)->where('id='.$id)->save(false);
        return $res;
    }
}