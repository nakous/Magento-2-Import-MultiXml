<?php
namespace Webmobi\import\Model\Feed\Source;

class IsStatus implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var Webmobi\import\Model\feed
     */
    protected $feed;

    /**
     * Constructor 
     *
     * @param Webmobi\import\Model\Post $post
     */
    public function __construct(\Webmobi\import\Model\Feed $feed)
    {
        $this->feed = $feed;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->feed->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
