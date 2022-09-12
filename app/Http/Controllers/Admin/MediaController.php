<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MediaUploads;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function media_upload_view()
    {
        return view('admin.media.media-upload-view');
    }

    public function media_upload_drag_drop_view()
    {
        return view('admin.media.media-upload-drag-drop-view');
    }

    public function media_upload_listing()
    {
        $data = MediaUploads::simplePaginate(50);

        return view('admin.media.media-upload-listing')->with("data", $data);
    }

    public function media_upload_listing_v2()
    {
        $data = MediaUploads::all();
        return view('admin.media.media-upload-listing_v2')->with("data", $data);
    }

    public function media_upload_submit(Request $request)
    {

        if ($request->hasFile('file')) {
            // Get filename with extension
            $fileNameToStore = $request->file('file')->getClientOriginalName();
            $document_alias = date('dmyhis') . '_' . $request->file('file')->getClientOriginalName();
            // Upload Image
            //$path = $request->file('file')-> storeAs('public/website_images',$document_alias);

            //file
            $file_content = $request->file('file');
            //Storage::disk('public_uploads')->put($document_alias, $file_content);

            $destinationPath = public_path('/kb_images'); //public path folder dir
            $file_content->move($destinationPath,  $document_alias);

            $user_id = Auth::User()->id ?? null;
            $category = $request['category'] ?? null;

            $update = new MediaUploads();
            $update->document_name = $fileNameToStore;
            $update->user_id = $user_id;
            $update->category = $category;
            $update->document_alias = $document_alias;
            $update->save();
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        return redirect()->route('admin.media-upload-listing')->with('alert-success', 'Image has been uploaded');
    }

    public function media_upload_delete(request $request)
    {
        $id = $request['id'];
        $del = MediaUploads::destroy($id);
        return redirect()->route('admin.media-upload-listing')->with('alert-success', 'Image has been deleted');
    }
}
