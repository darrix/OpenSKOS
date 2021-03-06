<?php

/**
 * OpenSKOS
 *
 * LICENSE
 *
 * This source file is subject to the GPLv3 license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @category   OpenSKOS
 * @package    OpenSKOS
 * @copyright  Copyright (c) 2015 Picturae (http://www.picturae.com)
 * @author     Picturae
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 */

namespace OpenSkos2\Validator\Concept;

use OpenSkos2\Concept;
use OpenSkos2\Namespaces\Skos;
use OpenSkos2\Validator\AbstractConceptValidator;
use OpenSkos2\Validator\DependencyAware\ResourceManagerAware;
use OpenSkos2\Validator\DependencyAware\ResourceManagerAwareTrait;
use OpenSkos2\Validator\DependencyAware\TenantAware;
use OpenSkos2\Validator\DependencyAware\TenantAwareTrait;

class UniqueNotation extends AbstractConceptValidator implements ResourceManagerAware, TenantAware
{
    use ResourceManagerAwareTrait;
    use TenantAwareTrait;

    /**
     * @param Concept $concept
     * @return bool
     */
    protected function validateConcept(Concept $concept)
    {
        if ($concept->isPropertyEmpty(Skos::NOTATION)) {
            return true;
        }

        $params = [];
        $params[] = [
            'operator' => \OpenSkos2\Sparql\Operator::EQUAL,
            'predicate' => Skos::NOTATION,
            'value' => $concept->getProperty(Skos::NOTATION)
        ];

        if ($this->isUniquePerScheme() && !$concept->isPropertyEmpty(Skos::INSCHEME)) {
            $params[] = [
                'operator' => \OpenSkos2\Sparql\Operator::EQUAL,
                'predicate' => Skos::INSCHEME,
                'value' => $concept->getProperty(Skos::INSCHEME)
            ];
        }

        $hasOther = $this->getResourceManager()->askForMatch(
            $params,
            $concept->getUri()
        );

        if (!$hasOther) {
            return true;
        }

        if ($this->isUniquePerScheme()) {
            $this->errorMessages[] = 'The concept notation must be unique per concept scheme. '
                . 'There is another concept with same notation in one of the concept schemes.';
        } else {
            $this->errorMessages[] = 'The concept notation must be unique per tenant. '
                . 'There is another concept with same notation in the same tenant.';
        }

        return false;
    }

    /**
     * By default validate per scheme unless the tenant requires it unique per tenant.
     * @return bool
     */
    protected function isUniquePerScheme()
    {
        return !$this->getTenant()->isNotationUniquePerTenant();
    }
}
