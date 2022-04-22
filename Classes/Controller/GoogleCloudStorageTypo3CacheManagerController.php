<?php

namespace Visol\GoogleCloudStorage\Controller;

/*
 * This file is part of the Fab/Mailing project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */
use TYPO3\CMS\Core\Resource\StorageRepository;
use Visol\GoogleCloudStorage\Cache\GoogleCloudStorageTypo3Cache;
use Visol\GoogleCloudStorage\Driver\GoogleCloudStorageDriver;
use TYPO3\CMS\Core\Resource\ResourceStorage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class GoogleCloudStorageTypo3CacheManagerController
 */
class GoogleCloudStorageTypo3CacheManagerController extends ActionController
{

    /**
     * @var StorageRepository
     */
    protected $storageRepository;

    /**
     * @return int
     */
    public function flushAction(): string
    {
        /** @var ResourceStorage $storage */

        foreach ($this->storageRepository->findAll() as $storage) {
            if ($storage->getDriverType() === GoogleCloudStorageDriver::DRIVER_TYPE) {
                $this->getCache($storage->getUid())->flushAll();
            }
        }
        return 'success';
    }

    /**
     * @param int $storageUid
     * @return GoogleCloudStorageTypo3Cache|object
     */
    protected function getCache(int $storageUid)
    {
        return GeneralUtility::makeInstance(GoogleCloudStorageTypo3Cache::class, $storageUid);
    }

    public function injectStorageRepository(StorageRepository $storageRepository): void
    {
        $this->storageRepository = $storageRepository;
    }
}
