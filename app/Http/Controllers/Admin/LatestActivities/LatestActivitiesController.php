<?php

namespace App\Http\Controllers\Admin\LatestActivities;

use App\Http\Controllers\Admin\AdminController;
use Bpocallaghan\LogActivity\Models\LogActivity;
use Bpocallaghan\LogActivity\Models\LogModelActivity;
use Illuminate\Http\Request;

class LatestActivitiesController extends AdminController
{
    public function website()
    {
        $items = LogActivity::getLatest();

        return $this->view('admin.latest_activities.website')->with('items', $items);
    }

    public function admin()
    {
        $items = LogModelActivity::getLatest();

        return $this->view('admin.latest_activities.admin')->with('items', $items);
    }
}
