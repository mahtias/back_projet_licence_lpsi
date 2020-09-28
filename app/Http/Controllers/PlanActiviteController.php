<?php

namespace App\Http\Controllers;
use App\PlanActivite;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class PlanActiviteController extends Controller
{
      protected $model;

    public function __construct(PlanActivite $exemple){
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
           $plan = PlanActivite::with(['activite', 
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
         $PlanActivite = new PlanActivite;

        $creation = $PlanActivite->create($request->only($PlanActivite->fillable));

        return response()->json(PlanActivite::with(['activite', 
            'children.children.children.children.children.children.children.children.children.children.children'])->find($creation->id), 201);
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

        return response()->json(PlanActivite::with(['activite', 
            'children.children.children.children.children.children.children.children.children.children.children'])->find($id), 200);

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
