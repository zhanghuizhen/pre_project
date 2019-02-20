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

        $query = TopicModel::with('users');

        if ($request->has('user_id')) {
            $query->where('user_id', $request->get('user_id'));
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->get('title') . '%');
        }

        if ($request->has('title')) {
            $query->where('state', $request->get('title'));
        }

        $per_page = $request->get('per_page', $this->defaultRerPage());
        $data = $query->paginate($per_page);

        return Response::json([
            'code' => 0,
            'data' => $data,
        ]);
    }

    //新建
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string',
            'content' => 'string',
        ]);

        $params = $request->only(['title', 'content']);
        $params['state'] = 'published';
        $topic = TopicModel::create($params);

        return Response::json([
            'code' => 0,
            'data' => $topic,
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