<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SimpleThings\EntityAudit\Tests\Fixtures\Relation;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class RelationAbstractEntityBase
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_column")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
