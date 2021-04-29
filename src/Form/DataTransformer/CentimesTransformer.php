<?php

namespace App\Form\DataTransformer;

use Smyfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\DataTransformerInterface as FormDataTransformerInterface;

class CentimesTransformer implements FormDataTransformerInterface
{
    public function transform($value)
    {
        if (null === $value) {
            return;
        }
        return $value / 100;
    }

    public function reverseTransform($value)
    {
        if (null === $value) {
            return;
        }
        return $value * 100;
    }
}