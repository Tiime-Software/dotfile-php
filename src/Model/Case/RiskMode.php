<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

enum RiskMode: string
{
    case Automatic = 'automatic';
    case Manual = 'manual';
}
