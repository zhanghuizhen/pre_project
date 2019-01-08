<?php
/**
 * 后台话题控制器（社区广场）
 * Date: 2019/1/7
 * Time: 18:08
 */

namespace App\Http\Controllers\Admin;

use Response;
//use Request;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic as TopicModel;

class TopicController extends Controller
{
    //列表
    public function index()
    {
        $data = TopicModel::find(1);
        //var_dump($data);


        return Response::json([
            'code' => 0,
            'data' => $data,
        ]);
    }

    //新建
    public function store()
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cover' => '',
        ];

        $model = new TopicModel();
        $params = $model->getParams($rules);

        $data = $model->create($params);

        return Response::json([
            'code' => 0,
            'data' => $data,
        ]);
    }

    //更新
    public function update($id)
    {
        echo 111;
    }

    //删除
    public function delete($id)
    {
        echo 111;
    }


}