<?php

namespace App\Http\Controllers;
use App\AnneeMission;
use Illuminate\Http\Request;
use App\Repositories\Repository;
class AnneeMissionController extends Controller
{
     protected $model;

     public function __construct(AnneeMission $exemple){
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
        return $this->model->all();
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

  $exemple = new AnneeMission;
        $creation = $exemple->create($request->only($exemple->fillable));
        return response()->json(AnneeMission::find($creation->id),201);
       // return $request->all() ;
       /* return response()->json($this->create($request->only($this->model->getModel()->fillable)),201);*/
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
        return $this->model->show($id);
    }


    public function activeAnnee(Request $request){

        $actif=AnneeMission::find($request->input("id"));
        $actif->encours=1;
        $actif->save();

        $exe=AnneeMission::where('id',"!=",$actif->id)->get();
        foreach ($exe as $value) {
            $useraffectation=AnneeMission::find($value->id);
                $useraffectation->encours = 0;
                 $useraffectation->save();
        }
        return response()->json(AnneeMission::all());

        //    if($request->id)
        // {
        //     foreach($request->id as $id)
        //     {
        //         $vardemo = User::find($id);
        //         $vardemo->encours = !$vardemo->encours;
        //         $vardemo->save();
               
        //     }
        //     return $vardemo;
        // }

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
