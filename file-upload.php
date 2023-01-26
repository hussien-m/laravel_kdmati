<?php

use Intervention\Image\ImageManagerStatic as Image;

// Check if the request is for deleting or uploading
$delete_file = 0;
if(isset($_POST['delete_file'])){
    $delete_file = $_POST['delete_file'];
}

$targetPath = asset('uploads');

// Check if it's an upload or delete and if there is a file in the form
if ( !empty($_FILES) && $delete_file == 0 ) {

    // Check if the upload folder is exists
    if ( file_exists($targetPath) && is_dir($targetPath) ) {

        // Check if we can write in the target directory
        if ( is_writable($targetPath) ) {

            /**
             * Start dancing
             */


            $tempFile = $_FILES['file']['tmp_name'];

            $target_path = 'uploads/';

            $rand = rand();
            $temp = explode('.', $_FILES['file']['name']);
            $newfilename = $rand . round(microtime(true)) . '.' . end($temp);

            $target_path = $target_path . $newfilename;

            $targetFile = $targetPath . $newfilename;


            $ex =  end($temp);

            $allowed = array( 'png', 'jpg','jpeg','PNG','JPG');

                            if (in_array($ex, $allowed) && $ex != '' && !empty($ex)) {

            // Check if there is any file with the same name
            if ( !file_exists($targetFile) ) {

            $height = Image::make($tempFile)->height();

            $width = Image::make($tempFile)->width();
                if($width >= 800 && $height >= 470){
                // Upload the file
                move_uploaded_file($tempFile, $targetFile);

                // Be sure that the file has been uploaded
                if ( file_exists($targetFile) ) {
                    $response = array (
                        'status'    => 'success',
                        'info'      => 'Your file has been uploaded successfully.',
                        'file_link' => $target_path
                    );



                        $setting = item("config", "id", 1);

                        $thumbnail = Image::make(__DIR__.'/admin/'.$target_path);
                        $imageWidth = $thumbnail->width();
                        $watermarkSource =  Image::make(__DIR__.'/admin/'.$setting['watermark_image']);

                        $watermarkSize = round(20 * $imageWidth / $setting['watermark_size']);
                        $watermarkSource->resize($watermarkSize, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $thumbnail->insert($watermarkSource, $setting['watermark_position'], 10, 10);
                        $thumbnail->save(__DIR__.'/admin/'.$target_path);


                           $new = str_replace("uploads","services",$target_path);
                            $img = Image::make(__DIR__.'/admin/'.$target_path);
                            $img->resize(350, 190, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save(__DIR__.'/admin/'.$new);






                                //$img = Image::make(__DIR__.'/admin/'.$target_path)->encode('png')->insert(__DIR__.'/admin/uploads/1646910037.png', 'bottom-right', 10, 10)->save(__DIR__.'/admin/'.$target_path);




                } else {
                    $response = array (
                        'status' => 'error',
                        'info'   => 'Couldn\'t upload the requested file :(, a mysterious error happend.'
                    );
                }
                }else{
                    $response = array (
                        'status' => 'error',
                        'info'   => 'يرجى رفع صورة بالابعاد المطلوبة'
                    );

                }



            } else {
                // A file with the same name is already here
                $response = array (
                    'status'    => 'error',
                    'info'      => 'A file with the same name is exists.',
                    'file_link' => $targetFile
                );
            }
                            }else {
            $response = array (
                'status' => 'error',
                'info'   => 'صيغة الملف غير مدعومة'
            );
        }
        } else {
            $response = array (
                'status' => 'error',
                'info'   => 'The specified folder for upload isn\'t writeable.'
            );
        }
    } else {
        $response = array (
            'status' => 'error',
            'info'   => 'No folder to upload to :(, Please create one.'
        );
    }

    // Return the response
    echo json_encode($response);
    exit;
}


// Remove file
if( $delete_file == 2 ){
    $file_path = ADMINPATH.$_POST['target_file'];

    // Check if file is exists
    if ( file_exists($file_path) ) {

        // Delete the file
            //unlink($file_path);

        // Be sure we deleted the file
        if ( !file_exists($file_path) ) {
            $response = array (
                'status' => 'success',
                'info'   => 'Successfully Deleted.'
            );
        } else {
            // Check the directory's permissions
            $response = array (
                'status' => 'error',
                'info'   => 'We screwed up, the file can\'t be deleted.'
            );
        }
    } else {
        // Something weird happend and we lost the file
        $response = array (
            'status' => 'error',
            'info'   => 'Couldn\'t find the requested file :('
        );
    }

    // Return the response
    echo json_encode($response);
    exit;
}
if( $delete_file == 1 ){

  $response = array (
                'status' => 'success',
                'info'   => 'Successfully Deleted.'
            );
    // Return the response
    echo json_encode($response);
    exit;
}
