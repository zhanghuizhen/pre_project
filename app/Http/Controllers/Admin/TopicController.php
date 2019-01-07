<?php
/**
 * 后台话题控制器
 * Date: 2019/1/7
 * Time: 18:08
 */

namespace App\Http\Controllers\Admin;

use Response;
use Request;

use App\Http\Controllers\Controller;
use App\Models\Topic as TopicModel;

class TopicController extends Controller
{
    public function index(){
        $data = TopicModel::find(1);
        //var_dump($data);


        return Response::json([
            'code' => 0,
            'data' => $data,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:motif,name',
            'type' => 'required|string|in:' . join(',', array_keys($this->type_dict)),
            'description' => 'string|min:1|max:240',
            'cover' => 'url',
        ], [
            'type.in' => ':attribute must be in ' . $this->getTypeErrorMessage()
        ]);

        $params = $request->only(['name', 'type', 'description', 'cover']);
        $type_id = $params['type'];
        $params['type'] = $this->type_dict[$params['type']];
        $params['state'] = 'published';
        $params['user_id'] = $this->uid;

        $motif = MotifModel::create($params);
        $motif->type_id = $type_id;

        // 清除前台接口缓存
        $this->clearFrontCache('motif', 0, 'entity');

        return Response::json([
            'code' => 0,
            'data' => $motif,
        ]);
    }

}