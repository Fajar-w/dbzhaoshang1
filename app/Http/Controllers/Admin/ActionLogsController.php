<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ActionLog;
use App\Services\ActionLogsService;

class ActionLogsController extends BaseController
{
    protected $actionLogsService;

    /**
     * ActionLogsController constructor.
     * @param $actionLogsService
     */
    public function __construct(ActionLogsService $actionLogsService)
    {
        $this->actionLogsService = $actionLogsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $actions = $this->actionLogsService->getActionLogs();

        return view('admin.actions.index',compact('actions'));
    }

    public function delete(ActionLog $actionLog,$id)
    {
        $actionLog->where('id',$id)->delete();

        return redirect(action('Admin\ActionLogsController@index'))->with('success', '删除日志成功');
    }
}
