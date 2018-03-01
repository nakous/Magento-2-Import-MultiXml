<?php
/**
 * file location:
 * app/code/Webmobi\Import/Service/ImportImageService.php
 */

namespace Webmobi\Import\Service;

use Magento\Catalog\Model\Product;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File;

/**
 * Class ImportImageService
 * assign images to products by image URL
 */
class ImportImageService
{
    /**
     * Directory List
     *
     * @var DirectoryList
     */
    protected $directoryList;

    /**
     * File interface
     *
     * @var File
     */
    protected $file;

    /**
     * ImportImageService constructor
     *
     * @param DirectoryList $directoryList
     * @param File $file
     */
    public function __construct(
        // DirectoryList $directoryList,
        // File $file
    ) {
		$om = \Magento\Framework\App\ObjectManager::getInstance();
	 
	// $filesystem = $om->get('Magento\Framework\Filesystem\Io\File')
        $this->directoryList = $om->get('Magento\Framework\App\Filesystem\DirectoryList');
        $this->file = $om->get('Magento\Framework\Filesystem\Io\File');
    }

    /**
     * Main service executor
     *
     * @param Product $product
     * @param string $imageUrl
     * @param array $imageType
     * @param bool $visible
     *
     * @return bool
     */
    public function execute( $imageUrl )
    {
        /** @var string $tmpDir */
        $tmpDir = $this->getMediaDirTmpDir();
        /** create folder if it is not exists */
        $this->file->checkAndCreateFolder($tmpDir);
        /** @var string $newFileName */
        $newFileName = $tmpDir .uniqid(). baseName($imageUrl);
        /** read file from URL and copy it to the new destination */
        $result = $this->file->read($imageUrl, $newFileName);
        if ($result) {
			return $newFileName;
            /** add saved file to the $product gallery */
            // $product->addImageToMediaGallery($newFileName, $imageType, true, $visible);
        }

        return $result;
    }

    /**
     * Media directory name for the temporary file storage
     * pub/media/tmp
     *
     * @return string
     */
    protected function getMediaDirTmpDir()
    {

        return $this->directoryList->getPath(DirectoryList::MEDIA) . DIRECTORY_SEPARATOR . 'tmp';
    }
}