<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Catalogue;
use App\Model\CataloguePages;

class FrontCatalogueController extends Controller
{
   
    public function catalogues($id)
    {  
        $catalogue = Catalogue::select('*')->where('id',$id)->first();
        $cataloguePageCount =  CataloguePages::where('catalogue_id',$catalogue->id)->count()+1;// 
        $cataloguePages = CataloguePages::where('catalogue_id',$catalogue->id)->get(); 
        return view('frontend.catalogue.catalogue', compact('catalogue','cataloguePageCount','cataloguePages'));
    }
    public function index()
    {  
        $Catalogues = Catalogue::all(); 
        return view('frontend.catalogue.index')->with([ 'Catalogues'=>$Catalogues]);
    }
	 //download pdf
     public function pdfdownload($id)
     {
         $advert = Catalogue::find($id);
         //dd($advert);
         $full_image_path = public_path(). '/uploads/catalogue/cataloguepdf/'. $advert->catalogue_pdf;
         //dd($full_image_path);
         // filename and look at the extension of the file being requested
         $extension = pathinfo($advert->catalogue_pdf, PATHINFO_EXTENSION); 
        //  dd($advert->catalogue_title.$extension);
         //create an array of items to reject being downloaded
         $blocked = ['php', 'htaccess'];
         //if the requested file is not in the blocked array
         if (! in_array($extension, $blocked)) {
             //download the file
             return response()->download($full_image_path,$advert->catalogue_title.'.'.$extension); // full url of file
         }
     }
}
