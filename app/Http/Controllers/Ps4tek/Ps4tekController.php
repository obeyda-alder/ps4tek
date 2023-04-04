<?php

namespace App\Http\Controllers\Ps4tek;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DataTables;
use App\Models\genrateData;
use Illuminate\Routing\Controller as BaseController;
use Keygen\Keygen;

class Ps4tekController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        $this->middleware('web', ['except' => ['']]);
    }
    public function home(Request $request)
    {
        return view('ps4tek.home');
    }
    public function index(Request $request)
    {
        return view('ps4tek.index');
    }
    public function data(Request $request)
    {
        //add some permations...
        $data = genrateData::orderBy('id', 'DESC');

        return Datatables::of($data)
        ->filter(function ($query) use($request) {
            $query->where(function($q) use ($request) {
                $q->where('email', 'like', "%{$request->search['value']}%")
                ->orWhere('title', 'like', "%{$request->search['value']}%")
                ->orWhere('description', 'like', "%{$request->search['value']}%");
            });
        })
        ->addIndexColumn()
        ->addColumn('title', function ($mn_data) {
            return $mn_data->title ?? '';
        })
        ->addColumn('email', function ($mn_data) {
            return $mn_data->email ?? '';
        })
        ->addColumn('description', function ($mn_data) {
            return $mn_data->description ?? '';
        })
        ->addColumn('created_at', function ($mn_data) {
            return $mn_data->created_at ?? '';
        })
        ->rawColumns([])
        ->make(true);
    }
    public function generateCode($length = 14, $column = 'title')
    {
        $code = Keygen::alphanum($length)->generate(); //->prefix('U')->suffix('G')->generate();

        if(genrateData::where($column, $code)->exists())
        {
            return $this->generateCode($length);
        }

        return strtolower($code);
    }
    public function GenrateData(Request $request)
    {
        $limit = $request->limit ?? '20000';
        for($i=0;$i<$limit;$i++){
            $data = new genrateData;
            $data->email       = $this->generateCode(14, 'email').'@gmail.com';
            $data->title       = $this->generateCode(14, 'title');
            $data->description = $this->generateCode(14, 'description');
            $data->save();
        }
        return redirect()->route('index');
    }
}
