<?php
declare(strict_types = 1);
namespace TYPO3\CMS\Core\Configuration\MetaModel;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

class MultiplicityConstraint implements PropertyDefinitionConstraint
{
    /**
     * @var PropertyDefinition
     */
    protected $propertyDefinition;

    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $maximum;

    public function __construct(PropertyDefinition $propertyDefinition, int $minimum, ?int $maximum)
    {
        if ($maximum !== null && $maximum < $minimum) {
            throw new \InvalidArgumentException('Maximum must be greater or equal minimum');
        }
        $this->propertyDefinition = $propertyDefinition;
        $this->minimum = $minimum;
        $this->maximum = $maximum;
    }

    public function __toString(): string
    {
        $maximum = $this->maximum ?? '*';
        $range = $this->minimum === $maximum ? $maximum : $this->minimum . '..' . $maximum;
        return '[' . $range . ']';
    }

    public function getPropertyDefinition(): PropertyDefinition
    {
        return $this->propertyDefinition;
    }

    public function getMinimum(): int
    {
        return $this->minimum;
    }

    public function getMaximum(): ?int
    {
        return $this->maximum;
    }
}
