<?php
/**
 * Magento 2 Recaptcha for Contact Page, Customer Create, and Forgot Password
 * Copyright (C) 2017  Derek Marcinyshyn
 *
 * This file included in Monashee/Recaptcha is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Monashee\Recaptcha\Block;

use Magento\Framework\View\Element\Template;
use Monashee\Recaptcha\Helper\Data;

class Recaptcha extends Template
{

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    private $localeResolver;

    /**
     * Recaptcha constructor.
     *
     * @param Template\Context                            $context
     * @param Data                                        $dataHelper
     * @param \Magento\Framework\Locale\ResolverInterface $localeResolver
     * @param array                                       $data
     */
    public function __construct(
        Template\Context $context,
        Data $dataHelper,
        \Magento\Framework\Locale\ResolverInterface $localeResolver,
        array $data = []
    ) {
        $this->dataHelper = $dataHelper;
        $this->localeResolver = $localeResolver;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->dataHelper->isEnabled();
    }

    /**
     * @return string
     */
    public function getSiteKey()
    {
        return $this->dataHelper->getSiteKey();
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return current(explode("_", $this->localeResolver->getLocale()));
    }
}