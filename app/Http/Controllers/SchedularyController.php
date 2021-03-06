<?php

namespace App\Http\Controllers;

use App\Schedulary;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchedularyController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Returns a list of Schedulary$Schedulary
     *
     * @return void
     */
    public function index()
    {
        $Schedularies = Schedulary::all();
        return $this->showAll($Schedularies);
    }
    /**
     * Creates an instance of Schedulary$Schedulary
     *
     * @return void
     */
    public function store(Request $request)
    {
        $rules =[
            'dateStart' => 'date_format:Y-m-d H:i',
            'dateEnd' => 'date_format:Y-m-d H:i|after:dateStart',
            'report_id' => 'required|integer|min:1',
            'item_id' => 'required|integer|min:1',
        ];
        $this->validate($request,$rules);

        $Schedulary = Schedulary::create($request->all());

        return $this->successResponse($Schedulary,Response::HTTP_CREATED);
    }
    /**
     * Returns an specific Schedulary$Schedulary
     *
     * @return void
     */
    public function show($schedulary)
    {
        $Schedulary = Schedulary::findOrFail($schedulary);

        return $this->successResponse($Schedulary);
    }

    public function itemSchedulary($item)
    {
        $Schedulary = Schedulary::where('item_id',$item)->get();

        return $this->showAll($Schedulary);
    }

    /**
     * Updates an specific Schedulary$Schedulary
     *
     * @return void
     */
    public function update(Request $request,$schedulary)
    {
        $rules =[
            'dateStart' => 'date_format:Y-m-d H:i',
            'dateEnd' => 'date_format:Y-m-d H:i|after:dateStart',
            'report_id' => 'required|integer|min:1',
            'item_id' => 'required|integer|min:1',
        ];
        $this->validate($request,$rules);

        $Schedulary = Schedulary::findOrFail($schedulary);

        $Schedulary->fill($request->all());

        if($Schedulary->isClean()){
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $Schedulary->save();

        return $this->successResponse($Schedulary);
    }
    /**
     * Returns an specific Schedulary$Schedulary
     *
     * @return void
     */
    public function destroy($schedulary)
    {
        $Schedulary = Schedulary::findOrFail($schedulary);

        $Schedulary->delete();

        return $this->successResponse($Schedulary);
    }
}
