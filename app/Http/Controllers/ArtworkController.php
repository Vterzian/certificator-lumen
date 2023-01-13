<?php

namespace App\Http\Controllers;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ArtworkController extends Controller
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
     * Get all artworks.
     *
     * @return Response
     */
    public function getAll(Request $request)
    {
      $page = $request->page ? $request->page : 1;
      $perPage = $request->perPage ? $request->perPage : 15;

      $artworks = Artwork::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);
      return response()->json($artworks);
    }

    /**
     * Get Artwork for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function get($id)
    {
      $artwork = Artwork::find($id);

      return response()->json($artwork);
    }

    /**
     * Add new Artwork.
     *
     * @return Response
     */
    public function add(Request $request)
    {
      $artwork = new Artwork();

      $artwork->name = $request->name;
      $artwork->height = $request->height;
      $artwork->width = $request->width;
      $artwork->signature = $request->signature;
      $artwork->technique = $request->technique;
      $artwork->date_creation = $request->date_creation;

      if ($request->hasFile('image')) {
        $newImageName = $artwork->name . date('dmyhis') . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads'), $newImageName);
        $artwork->image = asset('uploads/' . $newImageName);
      }

      $artwork->save();

      return response()->json($artwork);
    }

    /**
     * Update existing Artwork.
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $artwork = Artwork::find($id);

      $artwork->name = $request->name;
      $artwork->height = $request->height;
      $artwork->width = $request->width;
      $artwork->signature = $request->signature;
      $artwork->technique = $request->technique;
      $artwork->date_creation = $request->date_creation;

      $artwork->save();

      return response()->json($artwork);
    }

    /**
     * Delete an Artwork.
     *
     * @return Response
     */
    public function delete($id)
    {
      $artwork = Artwork::find($id);
      $explodedUrl = explode('/', $artwork->image);
      $imagePath = public_path('uploads/' . end($explodedUrl));
      if (file_exists($imagePath)) {
        unlink($imagePath);
      }

      $artwork->delete();


      return response()->json('Artwork successfully deleted !');
    }

    /**
     * Generate pdf of an Artwork.
     *
     * @return Response
     */
    public function downloadPdf($id)
    {
      $artwork = Artwork::find($id);
      $data = [
        'name' => $artwork->name,
        'width' => $artwork->width,
        'height' => $artwork->height,
        'signature' => $artwork->signature,
        'technique' => $artwork->technique,
        'dateCreation' => $artwork->date_creation,
        'image' => $artwork->image,
      ];
      $pdf = Pdf::setOption(['defaultFont' => 'sans-serif'])
        ->LoadView('pdf.certification', $data)
        ->setPaper('a4', 'landscape');
      $pdf->setBasePath(public_path());

      return $pdf->download('certification.pdf');
    }
}
