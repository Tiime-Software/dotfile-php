<?php

declare(strict_types=1);

namespace Dotfile\Model\CompanyData;

/**
 * @see https://docs.dotfile.com/reference/company-data-document-order-create-one
 */
enum DocumentOrderStatus: string
{
    case Created = 'created';
    case Processing = 'processing';
    case Completed = 'completed';
    case Failed = 'failed';
}
