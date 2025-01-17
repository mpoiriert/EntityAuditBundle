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

namespace SimpleThings\EntityAudit\Tests\Issue;

use SimpleThings\EntityAudit\Tests\BaseTest;
use SimpleThings\EntityAudit\Tests\Fixtures\Issue\Issue156Client;
use SimpleThings\EntityAudit\Tests\Fixtures\Issue\Issue156Contact;
use SimpleThings\EntityAudit\Tests\Fixtures\Issue\Issue156ContactTelephoneNumber;

final class Issue156Test extends BaseTest
{
    protected $schemaEntities = [
        Issue156Contact::class,
        Issue156ContactTelephoneNumber::class,
        Issue156Client::class,
    ];

    protected $auditedEntities = [
        Issue156Contact::class,
        Issue156ContactTelephoneNumber::class,
        Issue156Client::class,
    ];

    /**
     * @doesNotPerformAssertions
     */
    public function testIssue156(): void
    {
        $client = new Issue156Client();

        $number = new Issue156ContactTelephoneNumber();
        $number->setNumber('0123567890');
        $client->addTelephoneNumber($number);

        $this->em->persist($client);
        $this->em->persist($number);
        $this->em->flush();

        $auditReader = $this->auditManager->createAuditReader($this->em);
        $auditReader->find(\get_class($number), $number->getId(), 1);
    }
}
