<?php

namespace Admin\Support\Thumbnails;

use Intervention\Image\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Thumbnail {

	/**
	 * @var \Symfony\Component\HttpFoundation\File\UploadedFile
	 */
	public $image;

	/**
	 * @var string
	 */
	public $path;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var array
	 */
	public $upload_permitted_types = [
		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png'
	];

	/**
	 * Create the image object and save original size.
	 *
	 * @param  UploadedFile $file
	 * @param  string  $path
	 * @param  string  $name
	 *
	 * @throws NotValidImageException
	 * @return Object
	 */
	public function make($file, $path, $name)
	{
		if ( ! $this->isValid( $file->getMimeType() ) )
			throw new NotValidImageException;

		$this->path = $path;
		$this->name = $name;

		$this->image = Image::make( $file->getRealPath() );

		// Save the original image (full size).
		$file->move($path, $name.'.jpg');

		return $this;
	}

	/**
	 * Cortar los tamaños indicados en el parametro sizes.
	 *
	 * @param  array $sizes
	 * @return array
	 */
	public function create($sizes)
	{
		return array_map([$this, 'crop'], $sizes);
	}

	/**
	 * Corta una imagen y la guarda en el path especificado.
	 *
	 * @param  array  $size  array(string nombre, int width, int height)
	 * @return \Intervention\Image\Image
	 */
	public function crop($size)
	{
		list($suffix, $width, $height) = $size;
			
		if ( $this->image->width >= $this->image->height )
		{
			return  $this->image->resize(null, $height, function($constraint){
				$constraint->aspectRatio();
			}, true)
                ->crop($width, $height)
                ->save($this->path . $this->name."-{$suffix}.jpg" );
		}

		else
		{
			return  $this->image->resize($width, null, function($constraint){
					$constraint->aspectRatio();
				}, true)
	                ->crop($width, $height)
	                ->save($this->path . $this->name."-{$suffix}.jpg" );
		}

	}

	/**
	 * Validate the image mimeType.
	 *
	 * @param string $mimeType
	 * @return bool
	 */
	public function isValid( $mimeType )
	{
		return in_array($mimeType, $this->upload_permitted_types);
	}

}