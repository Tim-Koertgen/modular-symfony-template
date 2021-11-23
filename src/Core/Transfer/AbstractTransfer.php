<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Core\Transfer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractTransfer
{

    /**
     * @return array
     */
    public function toArray(): array
    {
        $encoders    = [
            new XmlEncoder(),
            new JsonEncoder(),
        ];
        $normalizers = [
            new ObjectNormalizer(),
            new ArrayDenormalizer(),
        ];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->normalize($this, null);
    }

    /**
     * @param  array $data
     * @return $this
     */
    public function fromArray(array $data): self
    {
        $encoders    = [
            new XmlEncoder(),
            new JsonEncoder(),
        ];
        $normalizers = [
            new ObjectNormalizer(),
            new ArrayDenormalizer(),
        ];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->denormalize($data, get_class($this));
    }

}
