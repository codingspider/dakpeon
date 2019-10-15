<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
class ManageCourierController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
        
            $data = DB::table('currier_infos')
            ->join('branches', 'branches.id', '=', 'currier_infos.sender_branch_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('currier_infos.*', 'branches.name as bname')
            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="view/'.$row->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a> <a href="delete/'.$row->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


        return view ('admin.all_courier_info');
    }

    public function view($id){

        $data = DB::table('currier_product_infos')
        ->join('currier_infos', 'currier_infos.id', '=', 'currier_product_infos.currier_info_id')
        ->join('courier_types', 'courier_types.id', '=', 'currier_product_infos.currier_type')
     
        ->select('currier_infos.*', 'currier_product_infos.*', 'courier_types.name as cname', 'currier_infos.id as cid')
        ->where('currier_infos.id', $id)->first();

        return view('admin.details_view_courier', compact('data'));
    }


    public function pending($cid){


       DB::table('currier_infos')->where('id', $cid)->update([
            'status' => 'Pending'
        ]);
        return back()->with('message', 'Status has been updated successfuly. ');
    }
    public function cancelled($cid){


       DB::table('currier_infos')->where('id', $cid)->update([
            'status' => 'Cancelled'
        ]);
        return back()->with('message', 'Status has been updated successfuly. ');
    }
    public function return($cid){


       DB::table('currier_infos')->where('id', $cid)->update([
            'status' => 'Returned'
        ]);
        return back()->with('message', 'Status has been updated successfuly. ');
    }
    public function ontheway($cid){


       DB::table('currier_infos')->where('id', $cid)->update([
            'status' => 'On the way'
        ]);
        return back()->with('message', 'Status has been updated successfuly. ');
    }
    public function deliver($cid){


       DB::table('currier_infos')->where('id', $cid)->update([
            'status' => 'Delivered'
        ]);
        return back()->with('message', 'Status has been updated successfuly. ');
    }
}
