<?php

namespace App\Http\Controllers\example1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Model\RouterInfo;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RouterInfo::where('status', 1);
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0);" onclick="openRouterInfo('.$row->id.')" class="edit btn btn-primary btn-sm">Edit</a> 
                                <a href="javascript:void(0);" onclick="deleteRouterInfo('.$row->id.')" class="delete btn btn-primary btn-sm">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('pages.list');
    }
}
