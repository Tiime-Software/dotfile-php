<?php

declare(strict_types=1);

namespace Dotfile\Model\CompanyData;

/**
 * A representation of a document order.
 *
 * @see https://docs.dotfile.com/reference/company-data-document-order-create-one
 */
class DocumentOrder
{
    public string $id;
    public string $companyId;
    public string $productRef;
    public string $name;
    public string $priceTier;
    public DocumentOrderStatus $status;
    public ?string $fileId = null;
    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
}
