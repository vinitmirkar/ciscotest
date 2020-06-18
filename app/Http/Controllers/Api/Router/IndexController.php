<?php

namespace App\Http\Controllers\APi\Router;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RouterInfo;
use Validator;
use DB;

class IndexController extends Controller
{
    public function index(Request $request, $id)
    {
        $router = RouterInfo::findOrFail($id);
        return response()->json($router, 200);
    }

    public function create(Request $request)
    {
        $rules = [
            'sapid' => 'required|unique:router_info',
            'hostname' => 'required|unique:router_info',
            'loopback' => 'required|unique:router_info|ip',
            'mac_address' => 'required|unique:router_info',
            'type' => 'required',
        ];
        
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) :
            $resData['error'] = $validator->messages();
            return response()->json($resData, 202);
        endif;

        $requestData = $request->all();
        $requestData['inet_aton'] = ip2long($request->input('loopback'));

        $router = RouterInfo::create($requestData);
        return response()->json($router, 200);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'sapid' => 'required',
            'hostname' => 'required',
            'loopback' => 'required|ip',
            'mac_address' => 'required',
            'type' => 'required',
        ];

        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) :
            $resData['error'] = $validator->messages();
            return response()->json($resData, 202);
        endif;

        $router = RouterInfo::findOrFail($id);

        $requestData = $request->all();
        $requestData['inet_aton'] = ip2long($request->input('loopback'));

        $router->update($requestData);
        return response()->json($router, 200);
    }

    public function delete(Request $request, $id)
    {
        $router = RouterInfo::findOrFail($id);
        $router->update(['status' => 0]);

        return response()->json(null, 200);
    }

    public function getByIPRange(Request $request)
    {
        $results = DB::table('router_info')
                    ->whereBetween('inet_aton', array(ip2long($request->input('startIP')), ip2long($request->input('endIP'))))
                    ->get();


        return response()->json($results, 200);
    }

    public function getBySAPID(Request $request)
    {
        $results = DB::table('router_info')
                    ->where('sapid', '=', $request->input('sapid'))
                    ->get();


        return response()->json($results, 200);
    }

    
}
