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
    public function index(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'integer|min:1',
            'title' => 'string',
            'state' => 'string',
        ]);

        $query = TopicModel::get();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->get('user_id'));
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->get('title') . '%');
        }

        if ($request->has('title')) {
            $query->where('state', $request->get('title'));
        }






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