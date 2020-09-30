<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

trait UploadImageHelper
{
    /**
     * Upload the banner image, create a thumb as well
     *
     * @param        $file
     * @param string $path
     * @param array  $size
     * @return string|void
     */
    protected function uploadImage(
        UploadedFile $file,
        $path = '',
        $size = ['o' => [1920, 500], 'tn' => [576, 150]]
    ) {
        $name = token();
        $extension = $file->guessClientExtension();

        $filename = $name . '.' . $extension;
        $filenameThumb = $name . '-tn.' . $extension;
        $imageTmp = Image::make($file->getRealPath());

        if (!$imageTmp) {
            return notify()->error('Oops', 'Something went wrong', 'warning shake animated');
        }

        $path = upload_path_images($path);

        // original
        $imageTmp->save($path . $name . '-o.' . $extension);

        // save the image
        $image = $imageTmp->fit($size['o'][0], $size['o'][1])->save($path . $filename);

        $image->fit($size['tn'][0], $size['tn'][1])->save($path . $filenameThumb);

        return $filename;
    }

    /**
     * Save Image in Storage, crop image and save in public/uploads/images
     * @param UploadedFile $file
     * @return string
     */
    private function uploadImageAndKeepAspectRatio(UploadedFile $file, $size = ['l' => [1000, 1000], 't' => [300, 300]]): string
    {
        $name = token();
        $extension = $file->guessClientExtension();

        $largeSize = $size['l'];
        $thumbSize = $size['t'];
        $path = upload_path_images();
        $filename = "{$name}.{$extension}";
        $filenameThumb = "{$name}-tn.{$extension}";
        $filenameOriginal = "{$name}-o.{$extension}";
        $imageTmp = Image::make($file->getRealPath());

        if (!$imageTmp) {
            return '';
        }

        // save original
        $imageTmp->save($path . $filenameOriginal);

        // if height is the biggest - resize on max height
        if ($imageTmp->width() < $imageTmp->height()) {

            // resize the image to the large height and constrain aspect ratio (auto width)
            $imageTmp->resize(null, $largeSize[1], function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . $filename);

            // resize the image to the thumb height and constrain aspect ratio (auto width)
            $imageTmp->resize(null, $thumbSize[1], function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . $filenameThumb);
        } else {
            // resize the image to the large width and constrain aspect ratio (auto height)
            $imageTmp->resize($largeSize[0], null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . $filename);

            // resize the image to the thumb width and constrain aspect ratio (auto width)
            $imageTmp->resize($thumbSize[0], null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . $filenameThumb);
        }

        return $filename;
    }

    protected function moveImage(UploadedFile $file, $path = '')
    {
        $name = token();
        $extension = $file->guessClientExtension();

        $filename = $name . '.' . $extension;
        $filenameThumb = $name . '-tn.' . $extension;
        $imageTmp = Image::make($file->getRealPath());

        if (!$imageTmp) {
            return notify()->error(
                'Oops',
                'Something went wrong',
                'warning shake animated'
            );
        }

        $path = upload_path_images($path);

        // original
        $imageTmp->save($path . $name . '-o.' . $extension);
        $imageTmp->save($path . $filename);
        $imageTmp->save($path . $filenameThumb);

        // save the image
        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        //$img->resize(300, null, function ($constraint) {
        //    $constraint->aspectRatio();
        //});

        //$image = $imageTmp->fit($size['o'][0], $size['o'][1])->save($path . $filename);
        //$image->fit($size['tn'][0], $size['tn'][1])->save($path . $filenameThumb);

        return $filename;
    }
}
