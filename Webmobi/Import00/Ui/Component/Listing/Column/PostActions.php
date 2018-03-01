<?php
namespace Webmobi\Import\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class PostActions extends Column
{
    /** Url path */
    const IMPORT_URL_PATH_EDIT 		= 'import/feed/edit';
    const IMPORT_URL_PATH_DELETE 	= 'import/feed/delete';
    const IMPORT_URL_PATH_FIELD 	= 'import/field/edit';

    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;
	
	/**
     * @var string
     */
    private $fieldUrl;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     * @param string $fieldUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::IMPORT_URL_PATH_EDIT,
        $fieldUrl = self::IMPORT_URL_PATH_FIELD
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        $this->fieldUrl = $fieldUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['feed_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['feed_id' => $item['feed_id']]),
                        'label' => __('Edit')
                    ];
					$item[$name]['field'] = [
                        'href' => $this->urlBuilder->getUrl($this->fieldUrl, ['feed_id' => $item['feed_id']]),
                        'label' => __('Field')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::IMPORT_URL_PATH_DELETE, ['feed_id' => $item['feed_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.title }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
