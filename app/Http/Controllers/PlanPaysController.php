<?php

namespace App\Http\Controllers;
use App\PlanPays;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class PlanPaysController extends Controller
{
     protected $model;

    public function __construct(PlanPays $exemple){
        $this->model = new Repository($exemple);
       // $this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $plan = PlanPays::with(['pays', 
        'children.children.children.children.children.children.children.children.children.children.children'])->get();
        //return $this->model->all();

        return response()->json($plan);
     //return $this->model->with(['pays'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $planpays = new PlanPays;

        $creation = $planpays->create($request->only($planpays->fillable));

        return response()->json(PlanPays::with(['pays', 
            'children.children.children.children.children.children.children.children.children.children.children'])->find($creation->id), 201); 
        // $exemple = new PlanPays;
        //$creation = $exemple->create($request->only($exemple->fillable));
        //return response()->json(PlanPays::with(['pays'])->find($creation->id));
        //return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $this->model->update($request->only($this->model->getModel()->fillable), $id);

        return response()->json(PlanPays::with(['pays', 
            'children.children.children.children.children.children.children.children.children.children.children'])->find($id), 200);

        // $this->model->update($request->only($this->model->getModel()->fillable), $id);

        //return response()->json(PlanPays::with(['pays'])->find($id));
        // $this->model->update($request->only($this->model->getModel()->fillable), $id);
        //return $this->model->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
