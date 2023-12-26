<?php

declare(strict_types=1);

namespace Dotfile\Model\Check;

enum CheckType: string
{
    case IdVerification = 'id_verification';
    case IdDocument = 'id_document';
    case Aml = 'aml';
    case Document = 'document';
}
