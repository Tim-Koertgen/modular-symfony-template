<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Core\Entity;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractEntity
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers);

        return $serializer->normalize($this);
    }

    /**
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data): self
    {
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers);

        return $serializer->denormalize($data, get_class($this));
    }
}
