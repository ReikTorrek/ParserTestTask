<?php

class helper
{
    /**
     * @param SimpleXMLElement $offers
     * @return array
     */
    public static function getAttributes(SimpleXMLElement $offers)
    {
        return [
            'id' => (int)$offers->id,
            'mark' => (string) $offers->mark,
            'model' => (string) $offers->model,
            'generation' => (string) $offers->generation,
            'year' => (int) $offers->year,
            'run' => (int) $offers->run,
            'color' =>  (string) $offers->color,
            'bodyType' =>  (string) $offers->{'body-type'},
            'engineType' => (string) $offers->{'engine-type'},
            'transmission' => (string) $offers->transmission,
            'gearType' => (string) $offers->{'gear-type'},
            'genId' => (int) $offers->generation_id,
        ];
    }
}