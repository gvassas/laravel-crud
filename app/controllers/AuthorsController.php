<?php

class AuthorsController extends BaseController{

    public $restful = true;
    public function get_index(){
        return
            View::make('authors.index')
            // Store data in title variable
            ->with('title', 'Authors and Books')
            // Store ordered rows in authors array
            ->with('authors', Author::orderBy('name')->get());

    }

    public function home()
    {
        return View::make('authors.home');
    }

    public function get_view($id) {
        return
        View::make('authors.view')
            ->with('title', 'Author View Page')
            // Get single author. Find it by id.
            ->with('author', Author::find($id));
    }

    public function  get_new() {
        return View::make('authors.new')
            ->with('title', 'Add New Author');
    }
    public function post_create() {
        $validation = Author::validate(Input::all());
        if($validation->fails()) {
            return Redirect::to('authors/new')->withErrors($validation)->withInput();
        }
        else {
            Author::create(array(
                'name'=>Input::get('name'),
                'bio'=>Input::get('bio')
            ));

            return Redirect::to('authors')
                // Create flash message that is only available for one new request
                ->with('message', 'The author was created successfully');
        }
    }

    public function get_edit($id){
        return View::make('authors.edit')
            ->with('title', 'Edit Author')
            ->with('author', Author::find($id)); // return form with data.
    }
    public function put_update() {
        $id = Input::get('id');
        $validation = Author::validate(Input::all());
        if($validation->fails()) {
            return Redirect::route('edit_author', $id)->withErrors($validation)->withInput();
        }
        else {
            $author = Author::find($id);
            $author->bio  = Input::get('bio');
            $author->name = Input::get('name');
            $author->save();

            return Redirect::route('author', $id)
                ->with('message', 'The author was updated successfully.');
        };
    }

    public  function delete_destroy() {
        $id = Input::get('id');
        Author::find($id )->delete();
        return Redirect::to('authors')->with('message', 'The author has been deleted');
    }






}
