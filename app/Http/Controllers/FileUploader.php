<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploader extends Controller
{
    public function uploadImage(Request $request)
    {
        $delete_file = 0;
        if ($request->has('delete_file')) {
            $delete_file = $request->input('delete_file');
        }

        $targetPath = public_path('upload/images');

        // Check if it's an upload or delete and if there is a file in the form
        if ($request->hasFile('file') && $delete_file == 0) {

            // Check if the upload folder is exists
            if (is_dir($targetPath)) {

                // Check if we can write in the target directory
                if (is_writable($targetPath)) {

                    $tempFile = $request->file('file');

                    $rand = rand();
                    $newfilename = $rand . round(microtime(true)) . '.' . $tempFile->getClientOriginalExtension();

                    $targetFile = $targetPath . '/' . $newfilename;

                    $ex = $tempFile->getClientOriginalExtension();

                    $allowed = array('png', 'jpg', 'jpeg', 'pdf');

                    if (in_array($ex, $allowed) && $ex != '' && !empty($ex)) {

                        // Check if there is any file with the same name
                        if (!file_exists($targetFile)) {

                            $height = Image::make($tempFile)->height();

                            $width = Image::make($tempFile)->width();
                            if ($width >= 800 && $height >= 470) {
                                // Upload the file
                                $tempFile->move($targetPath, $newfilename);

                                // Be sure that the file has been uploaded
                                if (file_exists($targetFile)) {
                                    $response = array(
                                        'status'    => 'success',
                                        'info'      => 'Your file has been uploaded successfully.',
                                        'file_link' =>  $newfilename,
                                    );
                                } else {
                                    $response = array(
                                        'status' => 'error',
                                        'info'   => 'Couldn\'t upload the requested file :(, a mysterious error happend.',
                                    );
                                }
                            } else {
                                $response = array(
                                    'status' => 'error',
                                    'info'   => 'يرجى رفع صورة بالابعاد المطلوبة',
                                );
                            }
                        } else {
                            // A file with the same name is already here
                            $response = array(
                                'status'    => 'error',
                                'info'      => 'A file with the same name is exists.',
                                'file_link' => $targetFile,
                            );
                        }
                    } else {
                        $response = array(
                            'status' => 'error',
                            'info'   => 'صيغة الملف غير مدعومة',
                        );
                    }
                } else {
                    $response = array(
                        'status' => 'error',
                        'info'   => 'The specified folder for upload isn\'t writeable.',
                    );
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'info'   => 'No folder to upload to :(, Please create one.',
                );
            }

            // Return the response
            return json_encode($response);
        }

        $file_path = $request->input('target_file');
        if ($delete_file == 2) {
            // Check if file is exists
            if (file_exists($file_path)) {

                // Delete the file
                //unlink($file_path);

                // Be sure we deleted the file
                if (!file_exists($file_path)) {
                    $response = array(
                        'status' => 'success',
                        'info'   => 'Successfully Deleted.'
                    );
                } else {
                    // Check the directory's permissions
                    $response = array(
                        'status' => 'error',
                        'info'   => 'We screwed up, the file can\'t be deleted.'
                    );
                }
            } else {
                // Something weird happend and we lost the file
                $response = array(
                    'status' => 'error',
                    'info'   => 'Couldn\'t find the requested file :('
                );
            }

            // Return the response
            return json_encode($response);
        }
        if ($delete_file == 1) {
            $del_file = public_path("upload" . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file_path);
            if (File::exists($del_file)) {

                File::delete($del_file);

                echo "Founded" . $file_path . "<br>";
            } else {
                echo "no file <br>";
            }

            $response = array(
                'status' => 'success',
                'info'   => 'Successfully Deleted.',
                'filePath' => $file_path,
            );
            // Return the response
            return json_encode($response);
        }
    }

    public function uploadRecord(Request $request)
    {

        $allowed = array('php', 'exe', 'jpg', 'zip', 'mp4', 'jpeg', 'PNG', 'JPG', 'mp3', 'pdf', 'doc', 'docs', 'excel', 'xlsx', 'wav', 'webp', 'WEBP', 'jfif', 'gif', 'GIF');

        $validatedData = $request->validate([
            'audio_data' => 'required|file|mimetypes:audio/*|max:10240',
        ]);

        $audioFile = $validatedData['audio_data'];

        $extension = $audioFile->extension();

        if (!in_array($extension, $allowed)) {
            return response()->json(['error' => 'Invalid file extension'], 400);
        }

        $rand = rand();

        $newfilename = $rand . round(microtime(true)) . '.wav';

        Storage::putFileAs('public/records', $audioFile, $newfilename);

        return $newfilename;
    }
}
