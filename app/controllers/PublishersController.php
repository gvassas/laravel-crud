<?php
class PublishersController extends BaseController{

    public $restful = true;

    public function get_publishers(){
        
        return
            View::make('publishers.list')
                // Store data in title variable
                ->with('title', 'Publishers')
                // Store ordered rows in authors array
                ->with('publishers', Publisher::orderBy('name')->get());

    }

    public function delete_destroy() {
        $name = Input::get('name');
        try {
        Publisher::find($name)->delete();
        return Redirect::to('publishers')->with('message', 'The publisher has been deleted');
    }
    catch(Exception $e) {
        return Redirect::to('publishers')->with('message', 'The publisher has not been deleted due to the following exception:'.'</br></br>'.$e);
    }
    }

    public function  get_new() {
        return View::make('publishers.new')
            ->with('title', 'Add New Publisher');
    }

    public function post_create() {
        $validation = Publisher::validate(Input::all());
        if($validation->fails()) {
            return Redirect::to('publishers/new')->withErrors($validation)->withInput();
        }
        else {
            Publisher::create(array(
                'name'=>Input::get('name'),

            ));

            return Redirect::to('publishers')
                // Create flash message that is only available for one new request
                ->with('message', 'The publisher was created successfully');
        }
    }
}