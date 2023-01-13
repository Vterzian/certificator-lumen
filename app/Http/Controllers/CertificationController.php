<?php

namespace App\Http\Controllers;

class CertificationController extends Controller
{
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
     * Get all certifications.
     *
     * @return Response
     */
    public function getAll()
    {
      return 'get all certification route';
    }

    /**
     * Get Artwork for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function get($id)
    {
      return 'get certification route';
    }

    /**
     * Retrieve the user for the given ID.
     *
     * @return Response
     */
    public function add()
    {
      return 'add certification route';
    }

    /**
     * Retrieve the user for the given ID.
     *
     * @return Response
     */
    public function update($id)
    {
      return 'update certification route';
    }

    /**
     * Retrieve the user for the given ID.
     *
     * @return Response
     */
    public function delete($id)
    {
      return 'delete certification route';
    }
}
